
<ul>
	@foreach ($publications as $publication)
	<li> 
		<a href="{{route('publication.detail',[$publication->category->slug,$publication->id])}}">
			{{$publication->name}}
		</a>
	</li>
	@endforeach
</ul>