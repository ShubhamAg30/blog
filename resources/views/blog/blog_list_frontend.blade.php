@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if(count($blogs))
                @foreach($blogs as $blog)
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $blog->title }}</div>

                    <div class="panel-body">
                        {{ $blog->description }}
                        @if($blog->tags)
                        <p><i><b>Tags:</b> {{ $blog->tags }}</i></p>
                        @endif
                    </div>
                    <div class="panel-footer">Author: {{ $blog->user->name }}<span class="pull-right">Published At: {{ $blog->published_at }}</span></div>
                </div>
                @endforeach
            @else
            <p class="text-danger">No Blogs avalable</p>
            @endif
        </div>
    </div>
</div>
@endsection
