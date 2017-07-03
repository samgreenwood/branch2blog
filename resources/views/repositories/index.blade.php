@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Repositories
                    <a class="btn btn-xs btn-primary pull-right" href="{{route('repositories.create')}}">Create</a>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>URL</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($repositories as $repository)
                            <td>{{$repository->name}}</td>
                            <td>{{$repository->url}}</td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{route('posts.create', $repository)}}">Create Post</a>
                                <a class="btn btn-xs btn-danger" href="#">Delete</a>
                            </td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
