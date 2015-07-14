<script>  
	  var curUser = {
				'id':{{Auth::user()->id}},
				'name':'{{Auth::user()->name}}',
			  };
	  
	  socket.on('connect', function (data) {
		  socket.id = curUser.id;
		  socket.emit('join',curUser);

	  });
	
	  socket.on('disconnect', function (data) {
		  socket.emit('leave',curUser.id)

	  });
</script>