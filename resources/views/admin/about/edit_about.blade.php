@extends('layouts.admin_layouts')
@section('content')
    <div class="page-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Update About</h1>
        </div>
        <div>
            <ul class="breadcrumb">
                <li><i class="fa fa-home fa-lg"></i></li>
                <li><a href="#">Update About</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
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

                                <form class="login-form" method="post" action="/admin/save-edited-about"
                                      enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="control-label">About App</label>
                                        <textarea class="form-control" type="text" placeholder="Enter City name"
                                                  name="details" rows="15"> {{$result->details}}</textarea>
                                        <input type="hidden" name="_token" id="csrf-token" value="{{csrf_token()}}"/>
                                        <input type="hidden" name="about_id"  value="{{$result->about_id}}"/>
                                    </div>


                                    <div class="form-group btn-container">
                                        <button class="btn btn-primary btn-block"> UPDATE</button>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection