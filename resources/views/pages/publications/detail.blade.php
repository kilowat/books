@extends('layout.master')
@section('content')

<div class="row">
	<!--start left sidebar-->
	@widget('UserMenu')
	<!--end left sidebar-->
	<div class="col-md-9">
		<main class="content">
			<div class="row">
				<div class="col-md-4">
					<img src="{{Html::showUserImage('normal',Auth::user()->id,'files',$publication->image)}}">
				</div>
				<div class="col-md-8">
					{!! Html::showPublicProperty([
							'Название'=>'name',
							'Автор'=>'user_name',
							'Создан'=>'created_at',
							'Просмотров'=>'see_count',
							'Рейтинг'=>'rang',
						],$publication) !!}
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<br>
					{{$publication->description}}
				</div>
			</div>
		</main>
	</div>
	<div class="push"></div>
</div>
@endsection