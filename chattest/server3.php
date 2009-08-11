<?php 

Error_Reporting(E_ALL & ~E_NOTICE); 

set_time_limit(0); 

ob_implicit_flush(); 

do{
$address = 'localhost'; 
$port = 10001;

//---- ф-ии для отправки сообщений всем подключенным ---------------------------------------- 

function send_Message($allclient, $buf) { 
  global $client_list; 
  foreach($allclient as $client) { 
    if($client_list[$client]['state'] && $client_list[$client]['nick'] != ""){ 
      socket_write($client, trim($buf).chr(0)); 
    } 
  } 
}
function send_index($nick_name,$allclient){
global $client_list;

foreach($allclient as $client) {
    $counter++; 
    if($client_list[$client]['nick']==$nick_name){
	  return $counter-1;
	}
	
  }
}
function who($allclient, $socket) { 
  global $client_list; 
  $buf = "";
  foreach($allclient as $client) { 
    $buf.=$client_list[$client]['nick']."&";
	
  } 
   socket_write($socket, "send_all_client $buf".chr(0));
}   

function send_Single($socket, $buf) { 
  socket_write($socket, $buf.chr(0)); 
} 

function shutDown($allclients, $master){ 
  global $abort; 
  $abort = false; 
  foreach($allclients as $client){ 
    echo "$client connection closed\n"; 
    socket_close($client); 
  } 
  echo "$master connection closed\n"; 
  socket_close($master); 
  echo "Server shutdown complete\n"; 
} 

//----Создаем сокеты на сокет сервере------------------------------------- 

if (($master = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) < 0) { 
  echo "socket_create() failed, reason: " . socket_strerror($master) . "\n"; 
}else{ 
  echo " socket created\n"; 
} 

socket_set_option($master, SOL_SOCKET,SO_REUSEADDR, 1); 


if (($ret = socket_bind($master, $address, $port)) < 0) { 
  echo "socket_bind() failed, reason: " . socket_strerror($ret) . "\n"; 
}else{ 
  echo "socket bound to $address:$port\n"; 
} 


if (($ret = socket_listen($master, 5)) < 0) { 
  echo "socket_listen() failed, reason: " . socket_strerror($ret) . "\n"; 
}else{ 
  echo "listening...\n"; 
} 



$read_sockets = array($master); 
$client_list = array($master); 
$abort = true; 
$policy_file = 
    '<'.'?xml version="1.0" encoding="UTF-8"?'.'>'. 
    '<cross-domain-policy xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="http://www.adobe.com/xml/schemas/PolicyFileSocket.xsd">'. 
        '<allow-access-from domain="*" to-ports="*" secure="false" />'. 
        '<site-control permitted-cross-domain-policies="master-only" />'. 
    '</cross-domain-policy>'; 

//---- Создаем  бесконечный цикл для приёма входящих соединений через сокеты --------------------- 
while ($abort) { 
  $changed_sockets = $read_sockets; 

  $num_changed_sockets = socket_select($changed_sockets, $write = NULL, $except = NULL, NULL); 

  foreach($changed_sockets as $socket) { 

    if ($socket == $master) { 

      if (($client = socket_accept($master)) < 0) { 
        echo "socket_accept() failed: reason: " . socket_strerror($msgsock) . "\n"; 
        continue; 
      } else { 
        array_push($read_sockets, $client); 
        $client_list[$client]['state'] = false; 
        $client_list[$client]['nick'] = ""; 
        send_Single($client, $policy_file); 
      } 
    } else { 

    $bytes = socket_recv($socket, $buffer, 2048, 0); 

    if ($bytes == 0) { 
        $nick = $client_list[$socket]['nick'];
        $send_index = send_index($nick,$read_sockets);		
        $iindex = array_search($socket, $client_list); 
        unset($client_list[$iindex]); 
        $index = array_search($socket, $read_sockets); 
        unset($read_sockets[$index]); 
        $allclients = $read_sockets; 
        array_shift($allclients);        		
        
		if($client_list[$socket]['nick'] != "" && $client_list[$socket]['nick'] != "<policy-file-request/>"){ 
          send_Message($allclients, "send_client_logout&$nick покинул чат&".$send_index); 
        }         
		socket_close($socket);
		
    }else{ 
      if($bytes){ 
        if($client_list[$socket]['state'] === false){ 
          $tempBuf = trim($buffer); 
          $testCase = false; 
          
		  foreach($read_sockets as $clients){ 
            if ($client_list[$clients]['nick'] == $tempBuf) { 
              $testCase = true; 
              send_Single($socket, "Извените, \"$tempBuf\" уже занят!"); 
              send_Single($socket, "Пожалуйста,введите другое имя:"); 
              break; 
            } 
          } 
          
		  if(!$testCase){            		
            $client_list[$socket]['nick'] = $tempBuf;
		    $allclients = $read_sockets;
            who($allclients, $socket);
            
			if($client_list[$socket]['nick'] != "" && $tempBuf != "<policy-file-request/>"){ 
                send_Message($allclients, "send_client_name".$client_list[$socket]['nick']);				
            }             
			$client_list[$socket]['state'] = true;		
          }
		  
        } else { 
          $allclients = $read_sockets; 
          array_shift($allclients); 
          
		  if(trim($buffer) == "shut-down-server"){ 
            shutDown($allclients, $master); 
          } else { 
                send_Message($allclients, $client_list[$socket]['nick']." пишет: ".$buffer); 
            } 
        } 
        } 
      } 
      } 
    } 
  } 
} while(true)

?>