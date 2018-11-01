@extends('layouts.admin_layouts')
@section('content')
    <div class="page-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Places</h1>
        </div>
        <div>
            <ul class="breadcrumb">
                <li><i class="fa fa-home fa-lg"></i></li>
                <li><a href="#">Places</a></li>
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
                            <a href="/admin/new-place" class="btn btn-primary btn-sm pull-right" href="#"><i
                                        class="fa fa-lg fa-plus"></i>New Place</a><br><br>
                        </div>

                    </div>

                    <table class="table table-hover table-bordered table-responsive" id="sampleTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Place Name</th>
                            <th>City</th>
                            <th>Address</th>
                            <th>Lat</th>
                            <th>Lon</th>
                            {{-- <th>Opening</th>
                             <th>Closing</th>--}}
                            <th>Url</th>
                            <th>Opening Days</th>
                            <th>Image</th>
                            <th>Description</th>
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
                                <td>{{$res->place_name}}</td>
                                <td>{{$res->name}}</td>
                                <td>{{$res->place_address}}</td>
                                <td>{{$res->latitude}}</td>
                                <td>{{$res->longitude}}</td>
                                {{-- <td>{{$res->open_time}}</td>
                                 <td>{{$res->close_time}}</td>--}}
                                <td>{{$res->place_web_url}}</td>
                                <?php  $arr = explode(',', $res->opening_weekdays);
                                    $day=array('Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday');
                                    $i=0;
                                ?>
                                <td>
                                    <ul class="pagination" style="width: 175px;">
                                        @foreach($arr as $array)

                                            @if($array!="-")

                                                <button class="btn btn-sm btn-primary"
                                                        style="margin: 1px;  padding: 10px 10px; font-size: 11px;
    line-height: 0.428571;
    border-radius: 3px; ">{{$day[$i]}}: {{($array)}}</button>
                                            @endif
                                                @php(++$i)
                                        @endforeach
                                    </ul>
                                </td>

                                <td><img src="/images/{{$res->place_image}}" height="50px"/></td>
                                <td>{{$res->details}}</td>

                                <td>
                                    <div class="btn-group">
                                        <a href="/admin/place/edit/{{$res->place_id}}" class="btn btn-info"
                                           href="#"><i class="fa fa-lg fa-edit"></i></a>
                                        <a href="/admin/place/delete/{{$res->place_id}}" class="btn btn-warning"
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