@extends('layouts.admin_layouts')
@section('content')
    <div class="page-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Edit Template</h1>
        </div>
        <div>
            <ul class="breadcrumb">
                <li><i class="fa fa-home fa-lg"></i></li>
                <li><a href="#">Edit Template</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
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

                                <form class="login-form" method="post" action="/admin/edit-template/save"
                                      enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="control-label">Template Name</label>
                                        <input class="form-control" type="text" value="{{$result->templates_name}}"
                                               placeholder="Template name"
                                               name="templates_name">
                                        <input type="hidden" name="_token" id="csrf-token" value="{{csrf_token()}}"/>
                                        <input type="hidden" name="template_id" value="{{$result->template_id}}"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Template Description</label>
                                        <textarea class="form-control" type="text" placeholder="Template Description"
                                                  name="templates_description"
                                                  required>{{$result->templates_description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Head Image <span style="color: #E26F39;font-size: 12px">(Use 375 * 180px)</span></label>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <input class="form-control" type="file" name="image" id="imgInp2">
                                            </div>
                                            <div class="col-md-6">
                                                <img id="blah2" src="/images/{{$result->templates_image}}" alt="Image"
                                                     width="150px"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Audio File</label>
                                        <input class="form-control" type="file" name="audio_url">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Video Url</label>
                                        <input class="form-control" type="text" placeholder="Video Url" name="video_url"
                                               value="{{$result->video_url}}>
">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Video Description</label>
                                        <textarea class="form-control" type="text" placeholder="Video Description"
                                                  name="video_description">{{$result->video_description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="control-label">Second Image <span style="color: #E26F39;font-size: 12px">(Use 343 * 180px)</span></label>
                                            <div class="col-md-6">
                                                <input class="form-control" type="file" name="image2" id="imgInp">
                                            </div>
                                            <div class="col-md-6">
                                                <img id="blah" src="/images/{{$result->templates_image2}}" alt="Image"
                                                     width="150px"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group btn-container">
                                        <button class="btn btn-primary btn-block"> SAVE</button>
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

    <script>
        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah2').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp2").change(function () {
            readURL2(this);
        });
    </script>
@endsection