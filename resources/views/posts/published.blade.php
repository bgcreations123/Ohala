@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Published Posts

                    <a href="{{ route('list_posts') }}" class="btn btn-sm btn-default pull-right">
                        Return
                    </a>
                </div>

                <div class="panel-body">
                    <div class="row">
                    
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

                                        @can('publish-post')
                                            <a href="{{ route('unpublish_post', ['id' => $post->id]) }}" 
                                               class="btn btn-sm btn-default" 
                                               role="button">
                                                Unpublish
                                            </a>
                                        @endcan

                                        @can('update-post', $post)
                                            <a href="{{ route('edit_post', ['id' => $post->id]) }}" 
                                               class="btn btn-sm btn-default" 
                                               role="button">
                                                Edit
                                            </a>
                                        @endcan

                                    </div>
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
