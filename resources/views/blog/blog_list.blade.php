@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Blog <a href="{{ route('blog_add') }}" class="btn btn-primary pull-right">Add</a></h3>
            <br>
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Tags</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Published At</th>
                    <th>Action</th>
                </tr>
                @if($blogs)
                    @foreach($blogs as $blog)
                    <tr>
                        <td>{{ $blog->id }}</td>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->tags }}</td>
                        <td>{{ $blog->status }}</td>
                        <td>{{ $blog->created_at }}</td>
                        <td>{{ $blog->published_at }}</td>
                        <td></td>
                    </tr>
                    @endforeach
                @else
                <tr><td colspan="7">No Blog</td></tr>
                @endif
            </table>
        </div>
    </div>
</div>
@endsection
