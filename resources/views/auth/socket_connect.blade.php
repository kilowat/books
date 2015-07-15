<script>  
	  _app.setUser({!!Auth::user()!!});
	  
	  console.log(_app.getUser());
	  socket.on('connect', function (data) {
		 socket.id = _app.getUser().id;
		  socket.emit('join',_app.getUser());

	  });
	
	  socket.on('disconnect', function (data) {
		  socket.emit('leave',_app.getUser().id);
	  });
</script>