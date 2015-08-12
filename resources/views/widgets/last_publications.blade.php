<ul>
	@foreach ($publications as $pulication)
	<li> <a href="#">{{$pulication->name}}</a></li>
	@endforeach
</ul>