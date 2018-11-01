@extends('layouts.admin_layouts')
@section('content')
    <div class="page-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> View About</h1>
        </div>
        <div>
            <ul class="breadcrumb">
                <li><i class="fa fa-home fa-lg"></i></li>
                <li><a href="#">View About</a></li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            <strong></strong> {{session('success')}}
                        </div>
                    @endif
                    @if(session('decline'))
                        <div class="alert alert-danger">
                            <strong></strong> {{session('decline')}}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <h4>About App</h4>
                            <hr>
                            <p>{{$result->details}}</p>

                            <a href="/admin/view-about/edit/{{$result->about_id}}" class="btn btn-info"><i class="fa fa-lg fa-edit"></i></a>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>


@endsection