@extends('layout.master')
@section('content')

<div class="row">
	<!--start left sidebar-->
	@widget('UserMenu')
	<!--end left sidebar-->
	<div class="col-md-9">
		<main class="content">
			editor
		</main>
	</div>
	<div class="push"></div>
</div>
@endsection