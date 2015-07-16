<script>  
	  _app.setUser({!!Auth::user()!!});
	  
	  socket.on('connect', function (data) {
		 socket.emit('join',_app.getUser());

	  });


	  socket.on('disconnect', function (data) {
		  //socket.emit('leave',_app.getUser());
	  });
</script>