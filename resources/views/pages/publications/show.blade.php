@extends('layout.master')
@section('content')

<div class="row">
	<!--start left sidebar-->
	@widget('UserMenu')
	<!--end left sidebar-->
	<div class="col-md-6">
		<main class="content">
			<h1>{{$publication->name}}</h1>
			<img src="{{Html::showUserImage('normal',$publication->user->id,'files',$publication->image)}}"><br>
			<b>Описание:</b>{{$publication->description}}<br>
		</main>
	</div>
	<div class="push"></div>
</div>
@endsection