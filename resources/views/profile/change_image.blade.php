@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Change My Profile Image</div>

                <div class="panel-body">

                    <div class="row">

                        <div class="span2" >
                            <img src="{{ asset('uploads/avatars/') }}/{{ file_exists(public_path('uploads/avatars/') . Auth::user()->avatar) ? Auth::user()->avatar : 'default.png' }}" alt="{{ $user->name }}" class="img img-thumbnail img-circle pull-left" width="150px" height="auto" style="margin: 0 15px;">
                        </div>
                        
                        <div class="span8">
                            <h2>{{ $user->name }}</h2>
                            <form enctype="multipart/form-data" action="{{ route('profile_change_image') }}" method="POST" role="form" class="form-horizontal">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="avatar">Change your profie image:</label>
                                    <input type="file" class="form-control-file" id="avatar" name="avatar" />
                                    <input type="submit" name="submit" style="margin: 10px 0;" />
                                    <a href="{{ route('profile_index') }}" class="btn btn-sm btn-default">
                                        Cancel
                                    </a>
                                </div>
                            </form>
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
