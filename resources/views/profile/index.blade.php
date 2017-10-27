@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">My Profile</div>

                <div class="panel-body">

                    <div class="row-fluid">

                        <div class="pull-right">
                            <div class="btn-group">
                                <a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#">
                                    <i class="fa fa-cogs icon-white"></i>
                                    Action 
                                    <i class="caret"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('profile_change_image') }}"><i class="fa fa-sliders"></i> Change Profile Image</a></li>
                                    <li><a href="#"><i class="fa fa-wrench"></i> Modify Profile</a></li>
                                    <li><a href="#"><i class="fa fa-trash"></i> Sign Off</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="span2" >
                            <img src="{{ asset('uploads/avatars/') }}/{{ file_exists(public_path('uploads/avatars/') . Auth::user()->avatar) ? Auth::user()->avatar : 'default.png' }}" alt="{{ $user->name }}" class="img img-thumbnail img-circle pull-left" width="150px" height="auto" style="margin: 0 15px;">
                        </div>
                        
                        <div class="span8">
                            <h3>{{ $user->name }}</h3>
                            <h6>Email: {{ $user->email }}</h6>
                            <h6>Nationality: Kenyan</h6>
                            <h6>Old: 1 Year</h6>
                            <h6><a href="#">More... </a></h6>
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
