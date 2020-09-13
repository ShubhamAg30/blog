@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>

                <div class="panel-body">
                    <p><b>Id: </b>{{ $user->id }}</p>
                    <p><b>Name: </b>{{ $user->name }}</p>
                    <p><b>Email: </b>{{ $user->email }}</p>
                    <p><b>Created At: </b>{{ $user->created_at }}</p>
                    <p><b>Updated At: </b>{{ $user->updated_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
