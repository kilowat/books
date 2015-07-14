<script>  
	  var curUser = {
				'id':{{Auth::user()->id}},
				'name':'{{Auth::user()->name}}',
				'ava':'mini_ava_1.png',
			  };
	  
	  socket.on('connect', function (data) {
		  socket.id = curUser.id;
		  socket.emit('join',curUser);

	  });
	
	  socket.on('disconnect', function (data) {
		  socket.emit('leave',curUser.id)

	  });
</script>