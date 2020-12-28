@extends('information.layouts.app')
@section('main-content')
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                <h2 class="d-block"><i class="fa fa-list fa-fw"></i>Information List
                    <a href="{{route('information.create')}}" class="btn btn-success -pull-right"><i class="fa fa-plus fa-fw"></i>Add New</a>
                </h2>
            </div>
            <index></index>
        </div>
    </div>
@endsection
