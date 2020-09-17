@extends('layouts.master')

@section('content-header')
    <h1>
        Tipos de Usuarios
    </h1>
    <ol class="breadcrumb">
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route("admin.profile.tipos_usuarios.create") }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> Crear Tipo de Usuario
                    </a>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                    @include("profile::admin.tipo-usuario.partials.index.header")
                </div>
                <div class="box-body table-responsive">
                    @include("profile::admin.tipo-usuario.partials.index.table")
                </div>
            </div>
        </div>
    </div>
    @include('profile::admin.tipo-usuario.partials.confirmation-modal')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop

@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('profile::profiles.title.create profile') }}</dd>
    </dl>
@stop

@section('scripts')
    @include("profile::admin.tipo-usuario.partials.index.scripts")
@stop
