@extends('layouts.master')
@section('content-header')
    <h1>
        Crear tipo de Usuario
    </h1>
    <ol class="breadcrumb">
    </ol>
@stop
@section('content')
	{!! Form::open(['route' => ['admin.profile.tipos_usuarios.store'], 'method' => 'post']) !!}
	    <div class="row">
	        <div class="col-xs-12">
	            <div class="row">
	            </div>
	            <div class="box box-primary">
	                <div class="box-header">
	                </div>
	                <div class="box-body table-responsive">
	                    @include("profile::admin.tipo-usuario.partials.tipo-usuario-fields")
	                </div>
	            </div>
	        </div>
	    </div>
    {!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop

@section('shortcuts')
@stop

@section('scripts')
    
@stop