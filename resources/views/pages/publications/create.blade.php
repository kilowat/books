@extends('layout.master')
@section('content')

<div class="row">
	<!--start left sidebar-->
	@widget('UserMenu')
	<!--end left sidebar-->
	<div class="col-md-6">
		<main class="content">
			{!!Form::open(['method'=>'post','action'=>'PublicationController@store'])!!}
				<div class="row input-list">
					<div class="form-group">
						<label class="col-md-4 control-label" for="name">Название</label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="name" id="name">
						</div>
					</div>
				</div>
				<div class="row input-list">	
					<div class="form-group">
						<label class="col-md-4 control-label" for="name">Описание</label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="descritpion" id="descritpion">
						</div>
					</div>
				</div>
				<div class="row input-list">	
					<div class="form-group">
						<label class="col-md-4 control-label" for="category_id">Категория</label>
						<div class="col-md-8">
							{!!Form::select('category_id',$categories)!!}
						</div>
					</div>
				</div>
				<div class="row input-list">	
					<div class="form-group">
						<div class="col-md-12">
							<input type="submit" value="Отправить">
						</div>
					</div>
				</div>
			{!!Form::close()!!}
			<div class="errors-list">
				@if($errors->any())
				<div class="alert alert-danger" role="alert">
				@foreach($errors->all() as $error)
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					<span class="sr-only">Error:</span>
					{{$error}}
				@endforeach
				</div>
			@endif
			</div>
		</main>
	</div>
	<div class="push"></div>
</div>
@endsection