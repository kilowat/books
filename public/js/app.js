socket = io('http://192.168.1.5:81');

socket.on('inMsgSignal',function(data){
	document.getElementById('signal-status').innerHTML = 'Новое событие'
});

socket.on("user-channel:App\\Events\\UserLoginEvent", function(message){
         // increase the power everytime we load test route
        console.log(message);
 }); 
