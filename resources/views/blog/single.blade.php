@extends('main')
<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', "| $titleTag")

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@if(!empty($post->image))
				<img src="{{asset('/images/' . $post->image)}}" width="800" height="400" />
			@else
			<div class="row">
					<div class="col-md-12">
						<div class="jumbotron clsalign-center">
						<h2>Welcome to Laravel Blog Website</h2>
						
						<p><a class="btn btn-primary btn-lg" href="{{ url('/blog')}}" role="button">Blogs</a></p>
						</div>
					</div>
        	</div> <!-- end of header .row -->	
			@endif

			<h1>{{ $post->title }}</h1>
			<p>{!! $post->body !!}</p>
			<hr>
			<p>Posted In: {{ $post->category->name }}</p>
		</div>
	</div>

	

@endsection
