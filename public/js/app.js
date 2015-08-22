function Bapp(){
	
}

Bapp.prototype.setUser = function(user){
	this._user = user;
}
Bapp.prototype.getUser = function(){
	return this._user;
}
Bapp.prototype.getAvatar = function(size,userId,fileName){
	
	if(fileName == '')
		return '/images/avatar_'+size+'_default.png';
	return '/upload/users/'+userId+'/avatar/'+size+'_'+fileName;
	
}
Bapp.prototype.currentMenu = function(items){
	
	for (var i = 0;items.length>i;i++){
		$('#'+items[i]+' li').each(function(key,value){
			$(value).removeClass('active');
			if($(value).children()[0].href==window.location.href)
				$(value).addClass('active');
			
		});
	}
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
	
$(document).ready(function(){
	_app.currentMenu(['top-menu'])
});



