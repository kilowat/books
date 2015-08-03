@extends('layout.master')
@section('content')
<div class="row">
	<!--start left sidebar-->
	@widget('UserMenu')
	<!--end left sidebar-->
	<div class="col-md-9">
		<main class="content">
		<a href="{{route('user.publication.create')}}">Добавить</a>
		
			{!!Html::divTablePanel([
				'name'=>'название',
				'description'=>'описание',
				'created_at'=>'Добавлен',
				],$publications,'user.publication')!!}

		{!!$publications->render()!!}
		</main>
	</div>
	<div class="push"></div>
</div>
@endsection