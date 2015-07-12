var app = require('http').createServer()
var io = require('socket.io')(app);
var fs = require('fs');
var userMessageModel = require('./model/UserMessage');
var messageStore = [];
var users = [];


app.listen(81);
io.on('connection', function (socket) {
	socket.emit('connect');
	
	socket.on('join',function(user){
		socket.join(users);

	});
	
	socket.on('leave',function(user){
		socket.leave(user);
	});
	  socket.on('send', function (data) {
		var copyData ={
				user_id:data.user_send_id,
				user_send_id:data.user_id,
				text:data.text,
				message_type:'in',
				
			};
		messageStore.push(data);
		messageStore.push(copyData);
		//console.log(messageStore);
		socket.emit('send',data);
		socket.to(data.user_send_id).emit('in',copyData);


	  });
	  
	 socket.on('disconnect',function(){
	 /*
		userMessageModel.connect();
		if (messageStore.length>0){
			for(var i=0;messageStore.length>i;i++){
				userMessageModel.messageAdd(messageStore[i]);
			}
			messageStore = {};
			userMessageModel.disconnect();
		}
		*/
	 });

	socket.on('error',function(e){
		console.log(e);
	});	 
});