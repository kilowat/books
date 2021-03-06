@extends('layout.master')
@section('content')
		<div class="row profile-page">
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
								<a href="{{route('user.messages.send',['id'=>$user->id])}}">Отпавить сообщение пользователю</a>
						</div>
						<!--end ava-->
						<div class="col-md-9">
							<div class="profile-list">
								<div class="name-profile user-item" id="id_{{$user->id}}">
									<div class="user-status-online">offline</div>
									<span>{{$user->name}}</span>
									<a href="{{route('user.profile.edit')}}">Редактировать</a>
								</div>
							</div>
						</div>
					</div>
					<!-- start profile wigets-->
					<div class="row">
						<div class="col-md-6">
					
						</div>
						<div class="col-md-6">
							<div class="widgets top-published">
								<h4>Последнии публикации пользователя</h4>
								@widget('LastPublications',['limit'=>8],$user->id)								
							 </div>
						</div>
					</div>
					<!--end profile wigets-->
				</main>
			</div>
		<div class="push"></div>
	</div>	
@endsection