@extends('layout.master')
@section('content')
<div class="row">
	<!--start left sidebar-->
	@widget('UserMenu')
	<!--end left sidebar-->
	<div class="col-md-6">
		<main class="content">
		<a href="{{route('user.publication.create')}}">Добавить</a>
		</main>
	</div>
	<div class="push"></div>
</div>
@endsection