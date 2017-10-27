@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        
        @if($posts->isEmpty())
            <div class="alert alert-info">
                <strong>Info!</strong> No posts to show yet...!
            </div>    
        @endif

        @foreach($posts as $post)
            <div class="col-md-3 col-sm-6">
                <span class="thumbnail">
                    <img src="http://placehold.it/500x400" alt="...">
                    <h4 class="price">Kshs 290/-</h4>
                    <div class="caption">
                        <p class="pull-right" style="margin-top: 12px;">12.12.2017</p>
                        <h4><a href="{{ route('show_post', [ 'id' => $post->id ]) }}">{{ $post->title }}</a></h4>
                        <p>{{ $post->body }}</p>
                    </div>
                    
                    <hr class="line">
                    <div class="ratings">
                        <p class="pull-right">123 Reviews</p>
                        <p>
                            @for ($i=1; $i <= 5 ; $i++)
                                <span class="fa fa-star{{ ($i <= 3) ? '' : '-o'}}"></span>
                            @endfor
                        </p>
                    </div>
                    
                </span>
            </div>
        @endforeach 
                    
    </div>
</div>
@endsection
