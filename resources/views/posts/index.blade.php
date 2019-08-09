@extends('main')

@section('title', '| All Posts')

@section('content')

	<div class="row">
		<div class="col-md-10">
			<h1>Blogs List</h1>
		</div>

		<div class="col-md-2">
			<a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Add New Blog</a>
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	</div> <!-- end of .row -->

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Blog Title</th>
					<th>Blog Description</th>
					<th>Blog Created On</th>
					<th>Actions</th>
				</thead>

				<tbody>
					
					@foreach ($posts as $post)
						
						<tr>
							<th>{{ $post->id }}</th>
							<td>{{ $post->title }}</td>
							<td>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}</td>
							<td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
							<td>
							<a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm">View</a> 
							<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default btn-sm">Edit</a>
							
							<div class="col-sm-6">
								{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

								{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

								{!! Form::close() !!}
						   </div>

							
							
							</td>

						</tr>

					@endforeach

				</tbody>
			</table>

			<div class="text-center">
				{!! $posts->links(); !!}
			</div>
		</div>
	</div>

@stop