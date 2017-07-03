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
               	<form method="POST" action="{{route('repositories.store')}}" class="form-horizontal">
<div class="form-group"><label for="name" class="control-label col-lg-2 col-sm-4">Name</label><div class="col-lg-10 col-sm-8"><input id="name" type="text" name="name" class="form-control"></div></div> <div class="form-group"><label for="url" class="control-label col-lg-2 col-sm-4">Url</label><div class="col-lg-10 col-sm-8"><input id="url" type="text" name="url" class="form-control"></div></div> <input type="submit" value="Create" class="btn btn-primary pull-right"> <input type="hidden" name="_token" value="jB36wAvz8BAybuuQaxJyy4t8y7O2bRX5cOSaZ5Jk" class="form-control"></form>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection
