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

	socket = io('localhost:81');

	socket.on('inMsgSignal',function(data){
		document.getElementById('signal-status').innerHTML = 'Новое событие'
	});



/****check online user*******/
	socket.on('usersOnline',function(users){
	  	var userList = $('.user-item');
	  	for(var i = 0; userList.length>i;i++){
  			$(userList[i]).removeClass('online')
  			$(userList[i]).find('.user-status-online').text('offline');
	  		if(users[userList[i].id]!=undefined){
	  			$(userList[i]).addClass('online');
	  			$(userList[i]).find('.user-status-online').text('online');
	  		}
	  	}
	  });
	




