@extends('layout.master')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="users-list-wrapper">
			@foreach($users->all() as $user)
				<ul id="id_{{$user->id}}" class="user-item">
					<li class="user-status-online">offline</li>
					<li>{{$user->id}}</li>
					<li><a href="{{route('user.profile',['id'=>$user->id])}}">{{$user->name}}</a></li>
					<li>{{$user->avatar}}</li>
				</ul>
			@endforeach
		</div>
	</div>
</div>

@endsection