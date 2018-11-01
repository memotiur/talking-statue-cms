@extends('layouts.admin_layouts')
@section('content')

    <div class="page-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> View Statues</h1>
        </div>
        <div>
            <ul class="breadcrumb">
                <li><i class="fa fa-home fa-lg"></i></li>
                <li><a href="#">View Statues</a></li>
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
                            <a href="/admin/new-statue" class="btn btn-primary btn-sm pull-right" href="#"><i
                                        class="fa fa-lg fa-plus"></i>New Statue</a><br><br>
                        </div>

                    </div>
                    <table class="table table-hover table-bordered table-responsive" id="sampleTable" style="overflow-x:auto;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Lat</th>
                            <th>Lon</th>
                            <th>City</th>
                            <th>Description</th>
                            <th>Web</th>
                            <th>QR</th>
                            <th>Range Radius (in meter)</th>
                           {{-- <th>Template Name</th>--}}

                            <th>QR ON</th>
                            <th>GPS ON</th>
                            <th>Statue Active</th>
                            <th>Keywords</th>
                            <th>Label</th>

                            <th>Image</th>
                            <th>Audio</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 0
                        @endphp
                        @foreach($result as $res)
                            @php($i++)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$res->statue_name}}</td>
                                <td>{{$res->latitude}}</td>
                                <td>{{$res->longitude}}</td>
                                <td>{{$res->name}}</td>
                                <td>{{$res->description}}</td>
                                <td>{{$res->web_address}}</td>
                                <td>{{$res->qr_code}}</td>
                                <td>{{$res->range_radius}}</td>
                                {{--<td>{{$res->templates_name}}</td>--}}

                                <td>@if($res->qr_code_on==1) <button type="button " class="btn btn-primary btn-xs">ON</button> @else <button type="butto" class="btn btn-danger  btn-xs">OFF</button> @endif</td>
                                <td>@if($res->gps_on==1) <button type="button " class="btn btn-primary btn-xs">ON</button>  @else <button type="butto" class="btn btn-danger  btn-xs">OFF</button> @endif</td>
                                <td>@if($res->statue_active==1) <button type="button " class="btn btn-primary btn-xs">ON</button>  @else <button type="butto" class="btn btn-danger  btn-xs">OFF</button> @endif</td>
                                <td>{{$res->keywords}}</td>
                                <td>{{$res->label}}</td>

                                <td><img src="/images/{{$res->image}}" height="100px"/></td>
                                <td>

                                    <audio controls>
                                        <source src="/audio/{{$res->audio_url}}" type="audio/mpeg">
                                    </audio>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="/admin/view-statue/edit/{{$res->statue_id}}" class="btn btn-info"
                                           href="#"><i class="fa fa-lg fa-edit"></i></a>
                                        <a href="/admin/view-statue/delete/{{$res->statue_id}}" class="btn btn-warning"
                                           onclick="return checkDelete()"><i class="fa fa-lg fa-trash"></i></a>
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
