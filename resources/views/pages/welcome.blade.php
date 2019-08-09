@extends('main')

@section('title', '| Homepage')

@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron clsalign-center">
                  <h2>Welcome to Laravel Blog Website</h2>
                 
                  <p><a class="btn btn-primary btn-lg" href="{{ url('/blog')}}" role="button">Blogs</a></p>
                </div>
            </div>
        </div> <!-- end of header .row -->

        <div class="row">
            <div class="col-md-8">
                
                @foreach($posts as $post)

                    <div class="post">
                        <h3>{{ $post->title }}</h3>
                        <p>{{ substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>
                        <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More</a>
                    </div>

                    <hr>

                @endforeach

            </div>

        </div>
@stop