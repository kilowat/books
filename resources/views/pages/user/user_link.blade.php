@if(Auth::check())
	
	<div class="navbar-text"><a href="{{route('user.profile',['id'=>Auth::user()->id])}}">{{Auth::user()->name}}</a></div>
@else
	<ul class="nav navbar-nav">
	  <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Войти/зарегистрироваться <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{action('Auth\AuthController@getLogin')}}">Авторизация</a></li>
            <li><a href="{{action('Auth\AuthController@getRegister')}}">Зарегистрироваться</a></li>
          </ul>
        </li>
	</ul>
@endif