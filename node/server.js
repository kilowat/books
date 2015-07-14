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
		//console.log(messageStore);
		socket.to(data.incom.user.id).emit('in',data.incom);
		
		socket.to(data.incom.user.id).emit('inMsgSignal',data.incom);
		
		socket.emit('send',data.out);
		
		userMessageModel.messageAdd(data.out);
		userMessageModel.messageAdd(data.incom);

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