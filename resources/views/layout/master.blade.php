<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="http://localhost:81/socket.io/socket.io.js"></script>
    <script>
    	socket = io('http://localhost:81')
    </script>
    <script>
	  var curUser = {{Auth::user()->id}};

	  var curUserName = '{{Auth::user()->name}}';
	  
	  socket.on('connect', function (data) {
		  socket.id = curUser; 
		  socket.emit('join',curUser);

	  });
	
	  socket.on('disconnect', function (data) {
		  socket.emit('leave',curUser)

	  });

    
    /**this code need writing is out from this block code*/
		socket.on('inMsgSignal',function(data){
		alert('У вас новое сообщение')
	 	}); 

/*************************/
    </script>
  </head>
  <body>
  
	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		@include('pages.user.user_link')
		  <ul class="nav navbar-nav">
			<li class="active"><a href="/">Главная <span class="sr-only">Главная</span></a></li>
			<li><a href="">Библиотека</a></li>
			<li><a href="#">Новости</a></li>
			<li><a href="#">Статьи</a></li>
		  </ul>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	
	<div class="container wrapper">
		@yield('content')
	</div>
<footer class="navbar-static-bottom row-fluid">
	<div class="navbar-inner">
		<div class="container">
			футер
 		</div>
	</div>
</footer>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/js/jquery-2.1.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>