@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Create Post for {{$repository->name}}
                </div>

                <div class="panel-body">
                {!! Former::open(route('posts.store', $repository)) !!}
                {!! Former::text('name') !!}
                {!! Former::select('hash') !!}
                {!! Former::submit('Create')->addClass('btn-primary pull-right') !!}
                {!! Former::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
