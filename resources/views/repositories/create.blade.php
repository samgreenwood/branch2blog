@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Create Repository
                </div>

                <div class="panel-body">
                {!! Former::open(route('repositories.store')) !!}
                {!! Former::text('name') !!}
                {!! Former::text('url') !!}
                {!! Former::submit('Create')->addClass('btn-primary pull-right') !!}
                {!! Former::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
