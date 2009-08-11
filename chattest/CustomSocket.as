package{
import flash.errors.*;
import flash.events.*;
import flash.net.*;
import flash.system.*;

public class CustomSocket extends Socket {
    public var response:String;

    public function CustomSocket(host:String = null, port:uint = 0) {
        super();
        configureListeners();
        if (host && port)  {
            super.connect(host, port);
        }
    }

    public function configureListeners():void {
        addEventListener(Event.CLOSE, closeHandler);
        addEventListener(Event.CONNECT, connectHandler);
        addEventListener(IOErrorEvent.IO_ERROR, ioErrorHandler);
        addEventListener(SecurityErrorEvent.SECURITY_ERROR, securityErrorHandler);
    }

    public function writeln(str:String):void {
        str += "\n";
        try {
            writeUTFBytes(str);
        }
        catch(e:IOError) {
            trace(e);
        }
    }

    public function sendRequest(str:String):void {
        trace("sendRequest");
        response = "";
        writeln(str);
        flush();
    }
	
	
	public function firstTimeServer():void{
		var GET_NAME:String;
		var user_name:String;
		var vhod_var:URLVariables = new URLVariables();
        var vhod_req:URLRequest = new URLRequest("http://test1.ru/chattest/index.php");
		var vhod_ldr:URLLoader = new URLLoader();
		vhod_req.method = URLRequestMethod.POST;
		vhod_ldr.addEventListener(Event.COMPLETE, obrabotkaLogina);
		vhod_var.GET_NAME = "1";
		vhod_req.data = vhod_var;
		vhod_ldr.dataFormat = URLLoaderDataFormat.TEXT;
		vhod_ldr.load(vhod_req);
		
		function obrabotkaLogina(e:Event):void{
         vhod_ldr.removeEventListener(Event.COMPLETE, obrabotkaLogina);
         user_name = e.target.data;
		 trace(user_name);
		 sendRequest(user_name);
         }		 
	   }

    public function readResponse():String{
        var readmsg:String = readUTFBytes(bytesAvailable);
		trace(readmsg);
		if (readmsg!='<?xml version="1.0" encoding="UTF-8"?><cross-domain-policy xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="http://www.adobe.com/xml/schemas/PolicyFileSocket.xsd"><allow-access-from domain="*" to-ports="*" secure="false" /><site-control permitted-cross-domain-policies="master-only" /></cross-domain-policy>'){
		
		return(readmsg+"\n");
		}else{
			return "Добро пожаловать в онлайн игру \"Путь война\" !\n"}
    }

    public function closeHandler(event:Event):void {
        trace("closeHandler: " + event);
        trace(response.toString());
    }

    public function connectHandler(event:Event):void {
        trace("connectHandler: " + event);
		firstTimeServer();
    }

    public function ioErrorHandler(event:IOErrorEvent):void {
        trace("ioErrorHandler: " + event);
    }

    public function securityErrorHandler(event:SecurityErrorEvent):void {
        trace("securityErrorHandler: " + event);
    }

    public function socketDataHandler(event:ProgressEvent):void {
        trace("socketDataHandler: " + event);
        readResponse();
    }
}

}