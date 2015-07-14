var app = require('http').createServer()
var io = require('socket.io')(app);
var fs = require('fs');

app.listen(81);
io.on('connection', function (socket) {
	socket.emit('connect');
	socket.on('join',function(user){
		socket.join(user.id);

	});
	
	socket.on('leave',function(user){
		socket.leave(user.id);
	});
	
	socket.on('send', function (data) {
		var userMessageModel = require('./model/UserMessage');
		var forGetUserData ={
				user_id:data.user_id,
				user_send_id:data.user_send_id,
				text:data.text,
				message_type:'in',
				
		};
		//console.log(messageStore);
		socket.to(data.user_send_id).emit('in',forGetUserData);
		
		socket.to(data.user_send_id).emit('inMsgSignal',forGetUserData);
		
		socket.emit('send',data);
		
		userMessageModel.messageAdd(data);
		userMessageModel.messageAdd(forGetUserData);

	  });
	
	
	socket.on('messageTake',function(userId){
		console.log('user'+userId+'take message');
	});	  
	 socket.on('disconnect',function(){

	 });

	socket.on('error',function(e){
		console.log(e);
	});	 
});