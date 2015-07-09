@extends('layout.master')
@section('content')
		<div class="row">
			<!--start left sidebar-->
			<div class="col-md-3">
				<ul class="list-group">
				  <li class="list-group-item">
					<span class="badge">14</span>
					<a href="{{route('user.messages.show')}}">Мои сообщения</a>
				  </li>
				  <li class="list-group-item">
					<a href="">Мои публикации</a>
				  </li>
				  <li class="list-group-item">
					<span class="badge">14</span>
					<a href="">Мои Отзывы</a>
				  </li>
				  <li class="list-group-item">
					<a href="">Мои закладки</a>
				  </li>
				</ul>
			</div>
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
								<div class="name-profile">
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