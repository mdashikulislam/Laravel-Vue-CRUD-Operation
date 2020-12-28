@extends('information.layouts.app')
@section('main-content')
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                <h2 class="d-block"><i class="fa fa-plus fa-fw"></i>Add Information
                    <a href="{{route('information.index')}}" cslass="btn btn-success -pull-right"><i class="fa fa-list fa-fw"></i>List</a>
                </h2>
            </div>

            <edit id="{{$id}}"></edit>
        </div>
    </div>
@endsection
