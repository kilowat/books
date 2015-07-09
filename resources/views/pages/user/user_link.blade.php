@if(Auth::check())
	
	<div class="navbar-text"><a href="{{route('user.profile',['id'=>Auth::user()->id])}}">{{Auth::user()->name}}</a></div>
@else
	<div class="navbar-text"><a href="{{action('Auth\AuthController@getLogin')}}">Авторизация/Профиль</a></div>
@endif