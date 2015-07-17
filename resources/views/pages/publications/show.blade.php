@extends('layout.master')
@section('content')
<div class="row">
	<!--start left sidebar-->
	@include('pages.user.user_menu')
	<!--end left sidebar-->
	<div class="col-md-6">
		<main class="content">
		контент
		</main>
	</div>
	<div class="push"></div>
</div>
@endsection