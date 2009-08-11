package{
	import sendBtn;
	import flash.display.MovieClip;
	import flash.display.*;
	import CustomSocket;
	import flash.events.*;
	import flash.text.*;
    import fl.controls.UIScrollBar;
    import fl.controls.ScrollBarDirection;
	import fl.controls.List;

	public class RootClass extends MovieClip {
		var socket:CustomSocket = new CustomSocket("localhost",10001);
		public var chatWindow:TextField = new TextField();
		public var chatMsg:TextField = new TextField();
		public var vScrollBar:UIScrollBar = new UIScrollBar();
		var sendButton:sendBtn = new sendBtn();
		public var aList:List = new List();
		public function RootClass(){			
			chatWindow.x=255;
			chatWindow.y=435;
			chatWindow.width=705;
			chatWindow.height=109;
			chatMsg.x=256;
			chatMsg.y=555;
			chatMsg.width=620.9;
			chatMsg.height=20.9;
			chatMsg.type=TextFieldType.INPUT;
			addChild(chatWindow);
			addChild(chatMsg);
			addChild(sendButton);
            vScrollBar.direction = ScrollBarDirection.VERTICAL;
            vScrollBar.move(chatWindow.x + chatWindow.width, chatWindow.y);
            vScrollBar.height = chatWindow.height;
            vScrollBar.scrollTarget = chatWindow;
            addChild(vScrollBar);
            aList.setSize(212, 294);
            aList.move(23.8,279.3);
            addChild(aList);
            aList.addEventListener(Event.CHANGE, changeHandler);
            function changeHandler(event:Event):void {
              trace(event.target.selectedItem.data); 
            }
			sendButton.addEventListener(MouseEvent.MOUSE_OVER,overBtn);
            sendButton.addEventListener(MouseEvent.MOUSE_OUT,outBtn);
            sendButton.addEventListener(MouseEvent.MOUSE_DOWN,downBtn);
            sendButton.addEventListener(MouseEvent.MOUSE_UP,upBtn);

            function overBtn(e:Event):void{	
	         e.target.gotoAndStop(2);
	        }
            function outBtn(e:Event):void{	
	         e.target.gotoAndStop(1);
	        }
            function downBtn(e:Event):void{
	         e.target.x+=1;
	         e.target.y+=1;
	        }
            function upBtn(e:Event):void{
	          e.target.x-=1;
	          e.target.y-=1;
			  socket.sendRequest(chatMsg.text);
			   chatMsg.text="";
	        }
			socket.addEventListener(ProgressEvent.SOCKET_DATA, writeChat);
			chatMsg.addEventListener(KeyboardEvent.KEY_DOWN, key_down);
			}
		
		public function writeChat(e:ProgressEvent):void {
			var msg:String = socket.readResponse();
			
			if (msg.substring(0,16)=="send_client_name"){	
			  var nick:String = msg.substring(16,msg.indexOf("\n"));
			  aList.addItem({label:nick, data:nick});
		    }else if (msg.substring(0,15)=="send_all_client"){
				var all_user:Array = msg.substring(15,msg.indexOf("\n")).split("&");
				all_user.shift();
				all_user.pop();
				for(var i:uint = 0;i<all_user.length;i++){
					aList.addItem({label:all_user[i], data:all_user[i]});
					}
			}else if (msg.substring(0,18)=="send_client_logout"){
				var user_logout:Array = msg.split("&");
				aList.removeItemAt(user_logout[2]-1);
				chatWindow.appendText(user_logout[1]+"\n");
                vScrollBar.update();
				}else{
			  chatWindow.appendText(msg);
              vScrollBar.update();
			}
		}
	    
		public function key_down(e:KeyboardEvent):void { 
		   if (e.keyCode==13){			   
			   socket.sendRequest(chatMsg.text);
			   chatMsg.text="";
			   
			   }
		   
		   }
		   
	}
}