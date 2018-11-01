@extends('layouts.admin_layouts')
@section('content')
    <div class="page-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> New Sponsor Logo</h1>
        </div>
        <div>
            <ul class="breadcrumb">
                <li><i class="fa fa-home fa-lg"></i></li>
                <li><a href="#">New Sponsor Logo</a></li>
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

                                <form class="login-form form-horizontal" method="post"
                                      action="/admin/view-sponsor-logo/store"
                                      enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Image <span style="color: #E26F39;font-size: 12px">(Use 98 * 75px)</span></label>
                                        <div class="col-lg-9">
                                            <div class="row">
                                                <input type="hidden" name="_token" id="csrf-token"
                                                       value="{{csrf_token()}}"/>

                                                <div class="col-md-6">
                                                    <input class="form-control" type="file" name="image" id="imgInp">
                                                </div>
                                                <div class="col-md-6">
                                                    <img id="blah" src="#" alt="Image" width="150px"/>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">URL</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" name="sponsor_logo_web_url">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">City</label>
                                        <div class="col-lg-9">
                                            <select class="form-control" id="select" name="city_id">
                                                @foreach($cities as $city)
                                                    <option value="{{$city->city_id}}">{{$city->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group btn-container">
                                        <div class="col-lg-3"></div>
                                        <div class="col-lg-9">
                                            <button class="btn btn-primary btn-block"> SAVE</button>
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


    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });
    </script>

@endsection