@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Deleted Posts
                </div>

                <div class="panel-body">
                    <div class="row">

                        @if($posts->isEmpty())
                            <div class="alert alert-info">
                                <strong>Info!</strong> No deleted posts to show yet...!
                            </div>    
                        @endif

                        @foreach($posts as $post)
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <div class="caption">
                                        <h3>
                                            <a href="{{ route('show_post', ['id' => $post->id]) }}">
                                                {{ $post->title }}
                                            </a>
                                        </h3>
                                        <p>
                                            {{ str_limit($post->body, 50) }}
                                        </p>
                                    </div>
                                    <a href="{{ route('restore_post', ['id' => $post->id]) }}" 
                                       class="btn btn-sm btn-default" 
                                       role="button">
                                        Restore
                                    </a>
                                </div>
                            </div>
                        @endforeach 

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
