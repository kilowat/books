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
					<div class="col-md-2">
						<ul>
							<li><a href="{{route('user.messages.send',['id'=>$msg->user_send_id])}}">{{$msg->name}}</a></li>
							<li class="thumbnail  avatar-img-wrapper"><img  src="{{ Html::avatar('mini',$msg->user_id,$msg->avatar) }}"></a></li>
						</ul>	
					</div>
					<div class="col-md-10">
						<div class="messages-text-wrapper">
							@if($msg->confirmed === 0)<span class="glyphicon glyphicon-envelope"></span>@endif
							<span>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $msg->created_at)->format('d-m-Y H:i:s')}}</span><br>
							{{$msg->text}}
						</div>
					</div>
				</div>
			@endif
			
			@if($msg->message_type=="out")
				<div class="row user-messages-list messages-out confirmed-{{$msg->confirmed}}">
					<div class="col-md-4">
							<ul class="col-md-6">
								<li><a href="{{route('user.messages.send',['id'=>$msg->user_send_id])}}">{{$msg->name}}</a></li>
								<li class="thumbnail  avatar-img-wrapper"><img  src="{{ Html::avatar('mini',$msg->user_id,$msg->avatar) }}"></a></li>
							</ul>						
							<ul class="col-md-6">
								<li><span>{{\Auth::user()->name}}</span></li>
								<li class="thumbnail  avatar-img-wrapper current-user"><img src="{{ Html::avatar('mini',Auth::user()->id,$current_user->avatar) }}"></li>
							</ul>
					</div>
					<div class="col-md-8">
						<div class="messages-text-wrapper">
							@if($msg->confirmed === 0)<span class="glyphicon glyphicon-envelope"></span>@endif
							<span>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $msg->created_at)->format('d-m-Y H:i:s')}}</span><br>
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