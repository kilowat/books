@extends('layout.master')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="users-list-wrapper">

			@foreach($users->all() as $user)
				<ul id="id_{{$user->id}}" class="user-item">
					<li>{{$user->id}}</li>
					<li>{{$user->name}}</li>
					<li>{{$user->avatar}}</li>
					<li>offline</li>
				</ul>
			@endforeach
		</div>
	</div>
</div>
<script>







</script>
@endsection