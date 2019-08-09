@extends('main')

@section('title', '| Edit Blog Post')

@section('stylesheets')

	{!! Html::style('css/select2.min.css') !!}

	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

	<script>
		tinymce.init({
			selector: 'textarea',
			plugins: 'link code',
			menubar: false
		});
	</script>

@endsection

@section('content')

	<div class="row">
		{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
		<div class="col-md-8">
			{{ Form::label('title', 'Blog Title:') }}
			{{ Form::text('title', null, ["class" => 'form-control input-lg']) }}

			{{ Form::label('slug', 'Blog Slug:', ['class' => 'form-spacing-top']) }}
			{{ Form::text('slug', null, ['class' => 'form-control']) }}

			{{ Form::label('category_id', "Blog Category:", ['class' => 'form-spacing-top']) }}
			{{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}

		 <!--	{{ Form::label('tags', 'Tags:', ['class' => 'form-spacing-top']) }}
			{{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }} -->
			
			{{ Form::label('body', "Blog Description:", ['class' => 'form-spacing-top']) }}
			{{ Form::textarea('body', null, ['class' => 'form-control']) }}
		</div>

		
		   <div class="col-md-6">
					<div class="col-sm-6">
						{!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block', 'style' => 'margin-top: 20px;')) !!}
					</div>
					<div class="col-sm-6">
						{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top: 20px;']) }}
					</div>
				
            </div>
		
		{!! Form::close() !!}
	</div>	<!-- end of .row (form) -->

@stop

@section('scripts')

	{!! Html::script('js/select2.min.js') !!}

	<script type="text/javascript">

		$('.select2-multi').select2();
		$('.select2-multi').select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('change');

	</script>

@endsection