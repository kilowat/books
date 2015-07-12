var app = require('http').createServer()
var io = require('socket.io')(app);
var fs = require('fs');
var userMessageModel = require('./model/UserMessage');
var messageStore = [];



app.listen(81);
io.on('connection', function (socket) {
	
	socket.emit('connect');
	
	socket.on('join',function(user){
		socket.join(user);
	});
	
	socket.on('leave',function(user){
		socket.leave(user);
	});
	  socket.on('send', function (data) {
		var copyData ={
				user_id:data.user_send_id,
				user_send_id:data.user_id,
				text:data.text,
				message_type:'in'
				
			};
		messageStore.push(data);
		messageStore.push(copyData);
		socket.to(data.user_send_id).emit('send',data);
		socket.emit('send',data);

	  });
	  
	 socket.on('disconnect',function(){
		if (messageStore.length>0){
			for(var i=0;messageStore.length>i;i++){
				userMessageModel.messageAdd(messageStore[i]);
			}
			messageStore = undefined;
			userMessageModel.disconnect();
		}
	 }); 
});