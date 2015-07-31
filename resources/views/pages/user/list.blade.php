@extends('layout.master')
@section('content')
<?php $i=0;$count=6?>
<div class="row">
	<div class="col-md-12">
		<div class="users-list-wrapper">
			@foreach($users as $user)
				@if($i === 0|| $i%$count === 0)
				<div class="row">
				@endif
				<?php $i++;?>
					<div class="col-md-2">
						<ul id="id_{{$user->id}}" class="user-item">
							<li><img src="{{$user->avatarMini($user)}}"></li>
							<li class="user-status-online">offline</li>
							<li><a href="{{route('user.profile',['id'=>$user->id])}}">{{$user->name}}</a></li>
						</ul>
					</div>
				@if($i%$count === 0 || $i === $users->count())
				</div>
				@endif
			@endforeach
		</div>
	</div>
</div>

@endsection