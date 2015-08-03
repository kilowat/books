@extends('layout.master')
@section('content')

<div class="row">
	<!--start left sidebar-->
	@widget('UserMenu')
	<!--end left sidebar-->
	<div class="col-md-6">
		<main class="content">
			{{$publication->name}}<br>
			{{$publication->description}}<br>
			<img src="/upload/users/{{Auth::user()->id}}/files/mini_{{$publication->image}}">
		</main>
	</div>
	<div class="push"></div>
</div>
@endsection