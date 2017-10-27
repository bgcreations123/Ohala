@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Drafts

                    <a href="{{ route('list_posts') }}" class="btn btn-sm btn-default pull-right">
                        Return
                    </a>
                </div>

                <div class="panel-body">
                    <div class="row">
                    
                        @foreach($drafts as $draft)
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <div class="caption">
                                        <h3>
                                            <a href="{{ route('show_draft', ['id' => $draft->id]) }}">
                                                {{ $draft->title }}
                                            </a>
                                        </h3>
                                        <p>
                                            {{ str_limit($draft->body, 50) }}
                                        </p>

                                        @can('activate-post')
                                            <a href="{{ route('activate_post', ['id' => $draft->id]) }}" 
                                               class="btn btn-sm btn-default" 
                                               role="button">
                                                Activate
                                            </a>
                                        @endcan

                                        @if($draft->isLive == true)
                                            @can('publish-post')
                                                <a href="{{ route('publish_post', ['id' => $draft->id]) }}" 
                                                   class="btn btn-sm btn-default" 
                                                   role="button">
                                                    Publish
                                                </a>
                                            @endcan
                                        @endif

                                        @can('update-post', $draft)
                                            <a href="{{ route('edit_post', ['id' => $draft->id]) }}" 
                                               class="btn btn-sm btn-default" 
                                               role="button">
                                                Edit
                                            </a>
                                        @endcan

                                        @can('publish-post')
                                            <a href="{{ route('delete_post', ['id' => $draft->id]) }}" 
                                               class="btn btn-sm btn-danger pull-right" 
                                               role="button"
                                               onsubmit="confirm('Are you sure you want to delete?')">
                                                X
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
