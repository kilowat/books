@extends('layout.master')
@section('content')
<div class="row">
	<!--start left sidebar-->
	@widget('UserMenu')
	<!--end left sidebar-->
	<div class="col-md-9">
		<main class="content">
		@foreach($msgList as $msg)
			@if($msg->message_type=="in")
				<div class="row user-messages-list messages-in confirmed-{{$msg->confirmed}}">
					<div class="col-md-4">
						<ul>
							<li><a href="{{route('user.messages.send',['id'=>$msg->userSend->id])}}">{{$msg->userSend->name}}</a></li> 
							<li><img src="{{$msg->user->avatarMini($msg->userSend)}}"></li>
						</ul>
					</div>
					<div class="col-md-8">
						<div>
							{{$msg->text}}
						</div>
					</div>
				</div>
			@endif
			
			@if($msg->message_type=="out")
				<div class="row user-messages-list messages-out confirmed-{{$msg->confirmed}}">
					<div class="col-md-4">
						<ul>
							<li><a href="{{route('user.messages.send',['id'=>$msg->userSend->id])}}">{{$msg->userSend->name}}</a></li>
							<li><img src="{{$msg->user->avatarMini($msg->userSend)}}"></a></li>
						</ul>
						<ul>
							<li><span>{{\Auth::user()->name}}</span></li>
							<li><img src="{{$msg->user->avatarMini(\Auth::user())}}"></li>
						</ul>
					</div>
					<div class="col-md-8">
						<div>
							{{$msg->text}}
						</div>
					</div>
				</div>
			@endif				
		@endforeach

		</main>
	</div>
	<div class="push"></div>
</div>
@endsection