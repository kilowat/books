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

	socket.on("user-channel:App\\Events\\UserLoginEvent", function(user){
	         // increase the power everytime we load test route

	 });
	




