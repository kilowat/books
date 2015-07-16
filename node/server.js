var app = require('http').createServer()
var io = require('socket.io')(app);
var fs = require('fs');
var Redis = require('ioredis');
var redis = new Redis();
var activeUsers = {};
var obj = {};
app.listen(81);

io.on('connection', function (socket) {

	socket.emit('connect');



	socket.on('join',function(user){
		var id = user.id;
		socket.join(id);
		//socket.id = id;
		activeUsers['id_'+id] = user;
		io.emit('usersOnline',activeUsers);
		console.log('--------------------');
			//console.log(socket.id);
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

	 	//delete user from online collection
	 	//console.log(activeUsers['id_'+socket.id]);
		//if(activeUsers['id_'+socket.id]!==undefined)
			//delete(activeUsers['id_'+socket.id]);
		//console.log(activeUsers);
		//io.emit('usersOnline',activeUsers);
	 	socket.leave('socket.id');
	 	//redis.unsubscribe('user-channel');
	 });

	socket.on('error',function(e){
		console.log(e);
	});	

/*
	setInterval(function(){
		console.log(io.sockets.sockets);
		console.log('------------------');
		//socket.emit('usersOnline',activeUsers);
	},1000) 
*/

console.log(process.memoryUsage());
console.log(io.sockets);
	/****************************************/


});

redis.subscribe('user-channel', function(err, count) {

});
redis.on('message', function(channel, message) {
	console.log('Message Recieved: ' + message);
	message = JSON.parse(message);
	io.emit(channel + ':' + message.event, message.data);
});




