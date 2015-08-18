	<div class="col-md-3">
		<ul class="list-group">
			<li class="list-group-item">
				<span class="badge">{{$newMsgCount}}</span>
				<a href="{{route('user.messages.show')}}">Мои сообщения</a>
			</li>
		 	<li class="list-group-item">
				<a href="{{route('user.publication.index')}}">Мои публикации</a>
			</li>
	</ul>
</div>