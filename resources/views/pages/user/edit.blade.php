@extends('layout.master')
@section('content')
		<div class="row">
			<!--start left sidebar-->
			@include('pages.user.user_menu')
			<!--end left sidebar-->
			<div class="col-md-9">
				<main class="content">
					<div class="row profile-top">
						<!--start ava-->
						<div class="col-md-3">
							    <div class="thumbnail">
									<img src="/images/robo.jpg" alt="...">
								</div>
						</div>
						<!--end ava-->
						<div class="col-md-9">
							<div class="profile-list">
								{!! Form::model($user, array('method'=>'patch','route' => array('user.profile.update')))!!}
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
	</div>	
@endsection