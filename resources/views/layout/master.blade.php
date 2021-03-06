﻿<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>
      @if(isset($title))
        {{$title}}
      @endif
      - Префикс в заголовке 12 строка master_layout
    </title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="/js/socket.io.js"></script>
	 <script src="/js/jquery-2.1.1.min.js"></script>
    <script src="/js/app.js"></script>

   	@if(Auth::check())
   		@include('auth.socket_connect')
   	@endif

    @yield('javascripts')

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
		<div class="navbar-text">Status:
			<span id="signal-status"></span>
		</div>
		  <ul class="nav navbar-nav" id="top-menu">
			<li class="active"><a href="/">Главная <span class="sr-only">Главная</span></a></li>
			<li><a href="{{action('UserController@usersList')}}">Пользователи</a></li>
      <li><a href="{{action('PublicationController@all')}}">Библиотека</a></li>
			<li><a href="#">Новости</a></li>
			<li><a href="#">Статьи</a></li>
		  </ul>
		  @if(Auth::check())
			 <div class="navbar-right navbar-text"><a href="/auth/logout">Выйти</a></div>
		 @endif
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

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>