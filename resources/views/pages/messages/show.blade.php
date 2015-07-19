@extends('layout.master')
@section('content')
<div class="row">
	<!--start left sidebar-->
	@include('pages.user.user_menu')
	<!--end left sidebar-->
	<div class="col-md-6">
		<main class="content">
		<ul>
		@foreach($userList as $user)
			<li><a href="{{route('user.messages.send',['id'=>$user->id])}}">{{$user->name}}</a></li>
		@endforeach
		</ul>
		</main>
	</div>
	<div class="push"></div>
</div>
@endsection