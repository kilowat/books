@extends('layout.master')
@section('content')
<?$i=0?>
<div class="row">
	<div class="col-md-3">
		{!!Menu::handler('category')!!}
	</div>
	<div class="col-md-9">
		<main class="content">
			@foreach($publications as $publication)
				@if($i==0||$i%2==0)
					<div class="row">
				@endif
					<div class="col-md-6">
						<div class="publication-cell">
							<div class="pub-list-title">
								<span>Дата:{{$publication->created_at}}</span>
								<span>Автор:{{$publication->user->name}}</span>
								<span>Рейтинг:{{$publication->rang}}</span>
							</div>
							<a href="{{route('publication.detail',[$category->slug,$publication->id])}}">{{$publication->name}}</a>
							<a href="{{route('publication.detail',[$category->slug,$publication->id])}}" class="pub-image-list">
								<img src="{{Html::showUserImage('normal',Auth::user()->id,'files',$publication->image)}}">
							</a>
							<div class="pub-description">
								{{str_limit($publication->description,250,'...')}}
							</div>
						</div>
					</div>	
				<?$i++;?>
				@if($i%2==0||$i==$publications->count())
					</div>
				@endif
			@endforeach
			{!!$publications->render()!!}
		</main>
	</div>
	<div class="push"></div>
</div>
@endsection
