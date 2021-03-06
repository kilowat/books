@extends('layout.master')
@section('content')

		<div class="row">
			<!--start left sidebar-->
			@widget('UserMenu')
			<!--end left sidebar-->
			<div class="col-md-9">
				<main class="content">
					<div class="row profile-top">
						<!--start ava-->
						<div class="col-md-3">
							    <div class="thumbnail">
									<img src="{{Html::avatar('normal',$user->id,$user->avatar)}}" alt="...">
								</div>
						</div>
						<!--end ava-->
						<div class="col-md-9">
							<div class="profile-list">
								{!! Form::model($user, array('method'=>'patch','route' => array('user.profile.store'),'enctype'=>'multipart/form-data'))!!}
									<div class="input-group">
										{!!Form::label('name','имя')!!}
										{!!Form::text('name',$user->name,['class'=>'form-control'])!!}
									</div>
									<div class="input-group">
										{!!Form::label('avatar','фотография')!!}
										{!!Form::file('avatar')!!}
									</div>
								{!! Form::submit() !!}
								{!! Form::close() !!}
							</div>
						</div>
					</div>
				</main>
			</div>
		<div class="push"></div>
			@if($errors->any())
				<div class="alert alert-danger" role="alert">
				@foreach($errors->all() as $error)
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					<span class="sr-only">Error:</span>
					{{$error}}
				@endforeach
				</div>
			@endif
	</div>	

@endsection
