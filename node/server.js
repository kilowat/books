var app = require('http').createServer()
var io = require('socket.io')(app);
var fs = require('fs');
var Redis = require('ioredis');
var redis = new Redis();
var activeUsers = {};
var dateFormat = require('dateformat');
app.listen(81);

io.on('connection', function (socket) {

	socket.emit('connect');
	
	socket.on('join',function(user){
		var id = 'id_'+user.id;
		socket.join(id);
		socket.user_id = id;

		activeUsers[id] = user;
		io.emit('usersOnline',activeUsers);
		//socket.broadcast.emit('userOnlineAdd',user);

	});
	
	socket.on('send', function (data) {

		var userMessageModel = require('./model/UserMessage');
		var dateF = dateFormat(new Date(), "dd-mm-yyyy H:MM:ss");
		data.incom.dateF = dateF;
		data.out.dateF = dateF;
		socket.to('id_'+data.incom.user.id).emit('in',data.incom);
		
		socket.to('id_'+data.incom.user.id).emit('inMsgSignal',data.incom);
		
		socket.emit('send',data.out);
		
		userMessageModel.messageAdd(data.out);
		userMessageModel.messageAdd(data.incom);

	  });
	
	
	socket.on('messageTake',function(userId){
		console.log('user'+userId+'take message');
	});
	
	socket.on('msgConfirm',function(data){
	
		var userMessageModel = require('./model/UserMessage');
		userMessageModel.messageConfirm(data);
	});
	
	socket.on('commentAdd',function(data){
		var commentModel = require('./model/Comment');
		data.dateF = dateFormat(new Date(), "dd-mm-yyyy H:MM:ss");
		commentModel.add(data);
		io.emit('commentAdd',data);
	});
	
	socket.on('getActiveUser',function(){
		socket.emit('getActiveUser',activeUsers);
	});

	 socket.on('disconnect',function(){
		// console.log(io.sockets.adapter.rooms);
		 var userInRoom = io.sockets.adapter.rooms[socket.user_id];
		 var leaveUser = activeUsers[socket.user_id];
		 if(userInRoom === undefined)
			delete activeUsers[socket.user_id];
		 //update online user info
		 io.emit('usersOnline',activeUsers)

		 //io.emit('userOut',leaveUser);

	 	socket.leave(socket.user_id);
	 	socket.leave(socket.id);
	 	
	 	//redis.unsubscribe('user-channel');
	 });

	socket.on('error',function(e){
		console.log(e);
	});	

/*
	setInterval(function(){
		console.log(activeUsers);
		console.log('------------------');
		//socket.emit('usersOnline',activeUsers);
	},1000) 
*/

//console.log(process.memoryUsage());
//console.log(io.sockets);
	/****************************************/


});

redis.subscribe('user-channel', function(err, count) {

});
redis.on('message', function(channel, message) {
	console.log('Message Recieved: ' + message);
	message = JSON.parse(message);
	io.emit(channel + ':' + message.event, message.data);
});




