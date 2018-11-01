@extends('layouts.admin_layouts')
@section('content')
    <div class="page-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> View Templates</h1>
        </div>
        <div>
            <ul class="breadcrumb">
                <li><i class="fa fa-home fa-lg"></i></li>
                <li><a href="#">View Templates</a></li>
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
                        <div class="col-md-12">
                            <a href="/admin/new-template" class="btn btn-primary btn-sm pull-right" href="#"><i
                                        class="fa fa-lg fa-plus"></i>New Template</a><br><br>
                        </div>

                    </div>

                    <table class="table table-hover table-bordered table-responsive" id="sampleTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Head Image</th>
                            <th>Audio</th>
                            <th>Video</th>
                            <th>Video Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 0
                        @endphp
                        @foreach($result as $res)
                            @php
                                $i++
                            @endphp
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$res->templates_name}}</td>
                                <td>{{$res->templates_description}}</td>
                                <td><img src="/images/{{$res->templates_image}}" height="100px"/></td>
                                <td>

                                    <audio controls>
                                        <source src="/audio/{{$res->audio_url}}" type="audio/mpeg">
                                    </audio>
                                </td>
                                <td>{{$res->video_url}}</td>
                                <td>{{$res->video_description}}</td>
                                <td><img src="/images/{{$res->templates_image2}}" height="100px"/></td>

                                <td>
                                    <div class="btn-group">
                                        <a href="/admin/template/edit/{{$res->template_id}}" class="btn btn-info"><i
                                                    class="fa fa-lg fa-edit"></i></a>
                                        <a href="/admin/template/delete/{{$res->template_id}}"
                                           class="btn btn-warning" onclick="return checkDelete()"><i
                                                    class="fa fa-lg fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection