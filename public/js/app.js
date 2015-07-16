function Bapp(){
	
}

Bapp.prototype.setUser = function(user){
	this._user = user;
}
Bapp.prototype.getUser = function(){
	return this._user;
}

var _app = new Bapp();

/******sockets listeners********/

	socket = io('192.168.1.5:81');

	socket.on('inMsgSignal',function(data){
		document.getElementById('signal-status').innerHTML = 'Новое событие'
	});

	socket.on("user-channel:App\\Events\\UserLoginEvent", function(user){

	 });

/****check online user*******/
	socket.on('usersOnline',function(users){
	  	var userList = $('.user-item');
	  	for(var i = 0; userList.length>i;i++){
	  		if(users[userList[i].id]!=undefined){
	  			$(userList[i]).removeClass('online')
	  			$(userList[i]).addClass('online');
	  		}
	  	}
	  });
	




