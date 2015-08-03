@extends('layout.master')
@section('content')

<div class="row">
	<div class="col-md-3">
		{!!Menu::handler('category')!!}
	</div>
	<div class="col-md-9">
		<main class="content">
			список публикаций
		</main>
	</div>
	<div class="push"></div>
</div>
@endsection
