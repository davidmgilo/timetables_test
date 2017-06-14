@extends('adminlte::page')

@section('htmlheader_title')
	Personal Timetable
@endsection

@section('contentheader_title')
    Personal Timetable
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-9 col-md-offset-1">
                <personal-calendar></personal-calendar>
			</div>
		</div>
	</div>
@endsection
