@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Create Attendance</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-times"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        @if(Session::has('message'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-check"></i> Done!</h4>
                            {{ session('message') }}
                        </div>
                        @endif

                        {{--<div class="alert alert-danger alert-dismissible">--}}
                            {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>--}}
                            {{--<h4><i class="icon fa fa-ban"></i> Oops!</h4>--}}
                            {{--Something is wrong.--}}
                        {{--</div>--}}

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form role="form" action="/attendances" method="post">
                            <!-- text input -->
                            {{ csrf_field() }}

                            <?php
                               $warning = "";
                            if ($errors->has('name')){
                                $warning = "has-warning";
                            }
                            ?>

                            <div class="form-group {{ $warning }}">
                                <label class="control-label" for="name">
                                    @if ($errors->has('name'))
                                    <i class="fa fa-bell-o"></i>
                                    @endif
                                    Name </label>
                                <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                                @foreach ($errors->get('name') as $message) {
                                    <span class="help-block">{{ $message }}</span>
                                @endforeach
                            </div>

                            {{--@if ($errors->has('name'))--}}
                                {{--<div class="form-group has-warning">--}}
                                    {{--<label class="control-label" for="name"><i class="fa fa-bell-o"></i> Name </label>--}}
                                    {{--<input type="text" class="form-control" id="name" placeholder="Name" name="name">--}}
                                    {{--@foreach ($errors->get('name') as $message) {--}}
                                        {{--<span class="help-block">{{ $message }}</span>--}}
                                    {{--@endforeach--}}
                                {{--</div>--}}
                            {{--@else--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="control-label" for="name"> Name</label>--}}
                                {{--<input type="text" class="form-control" placeholder="Name" name="name">--}}
                            {{--</div>--}}
                            {{--@endif--}}



                            <input type="submit" value="create"/>

                            <!-- input states -->
                            {{--<div class="form-group has-success">--}}
                                {{--<label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Input with success</label>--}}
                                {{--<input type="text" class="form-control" id="inputSuccess" placeholder="Enter ...">--}}
                                {{--<span class="help-block">Help block with success</span>--}}
                            {{--</div>--}}
                            {{--<div class="form-group has-warning">--}}
                                {{--<label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Input with--}}
                                    {{--warning</label>--}}
                                {{--<input type="text" class="form-control" id="inputWarning" placeholder="Enter ...">--}}
                                {{--<span class="help-block">Help block with warning</span>--}}
                            {{--</div>--}}
                            {{--<div class="form-group has-error">--}}
                                {{--<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Input with--}}
                                    {{--error</label>--}}
                                {{--<input type="text" class="form-control" id="inputError" placeholder="Enter ...">--}}
                                {{--<span class="help-block">Help block with error</span>--}}
                            {{--</div>--}}

                        </form>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>

                </div>

                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Attendances</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                        <div class="box-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($attendances as $attendance)
                                    <tr>
                                        <td>{{ $attendance->id }}</td>
                                        <td>{{ $attendance->name }}</td>
                                    </tr>
                                @endforeach


                    </tbody>
                    </table>
                </div>

                </div>
            </div>
        </div>
    </div>
@endsection
