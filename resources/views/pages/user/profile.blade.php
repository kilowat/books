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
								<div class="name-profile user-item" id="id_{{$user->id}}">
									<div class="user-status-online">offline</div>
									<span>{{$user->name}}</span>
								</div>
								<span>Основное</span>
								<ul>
									<li>Возраст: Неуказан</li>
									<li>Город: Детройт</li>
									<li>Рейтинг: 100</li>
									<li>Читатель/Писатель</li>
								</ul>
								<span>Любимые жанры</span>
								<ul>
									<li>Комедия</li>
									<li>Хорор</li>
								</ul>
								<span>Любимые Авторы</span>
								<ul>
									<li>Кинг</li>
									<li>Дарья Данцова ;)</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- start profile wigets-->
					<div class="row">
						<div class="col-md-6">
							<div class="widgets last-reviews">
								<h4>Последнии отзывы</h4>
								<ul>
									<li> <a href="#">Равным образом постоянное информационно-пропагандистское обеспечение</a></li>
									<li> <a href="#">Равным образом постоянное информационно-пропагандистское обеспечение</a></li>
									<li> <a href="#">Равным образом постоянное информационно-пропагандистское обеспечение</a></li>
									<li> <a href="#">Равным образом постоянное информационно-пропагандистское обеспечение</a></li>
									<li> <a href="#">Равным образом постоянное информационно-пропагандистское обеспечение</a></li>
									<li> <a href="#">Равным образом постоянное информационно-пропагандистское обеспечение</a></li>
									<li> <a href="#">Равным образом постоянное информационно-пропагандистское обеспечение</a></li>
								</ul>	
							</div>						
						</div>
						<div class="col-md-6">
							<div class="widgets top-published">
								<h4>Последнии публикации</h4>
								<ul>
									<li> <a href="#">Равным образом постоянное информационно-пропагандистское обеспечение</a></li>
									<li> <a href="#">Равным образом постоянное информационно-пропагандистское обеспечение</a></li>
									<li> <a href="#">Равным образом постоянное информационно-пропагандистское обеспечение</a></li>
									<li> <a href="#">Равным образом постоянное информационно-пропагандистское обеспечение</a></li>
								</ul>						
							 </div>
						</div>
					</div>
					<!--end profile wigets-->
				</main>
			</div>
		<div class="push"></div>
	</div>	
@endsection