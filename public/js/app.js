socket = io('http://192.168.1.5:81');

socket.on('inMsgSignal',function(data){
	document.getElementById('signal-status').innerHTML = 'Новое событие'
}); 
