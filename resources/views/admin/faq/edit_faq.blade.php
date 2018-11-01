@extends('layouts.admin_layouts')
@section('content')
    <div class="page-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> New FAQ</h1>
        </div>
        <div>
            <ul class="breadcrumb">
                <li><i class="fa fa-home fa-lg"></i></li>
                <li><a href="#">New FAQ</a></li>
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

                                <form class="login-form form-horizontal" method="post" action="/admin/update-faq"
                                      enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Question</label>
                                        <div class="col-lg-10">

                                            <input class="form-control" type="text" placeholder="Question"
                                                   name="question" value="{{$result->question}}">
                                            <input type="hidden" name="_token" id="csrf-token"
                                                   value="{{csrf_token()}}"/>
                                            <input type="hidden" name="id"
                                                   value="{{$result->faq_id}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Answer</label>
                                        <div class="col-lg-10">
                                        <textarea class="form-control" rows="4" placeholder="Answer"
                                                  name="answer">{{$result->answer}}</textarea>
                                        </div>
                                    </div>


                                    <div class="form-group btn-container">
                                        <div class="col-lg-2"></div>
                                        <div class="col-lg-10">
                                            <button class="btn btn-primary btn-block"> UPDATE</button>
                                        </div>

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