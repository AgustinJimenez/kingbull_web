@extends('layouts.master')

@section('content-header')
    <h1>
        Horarios
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('reservas::horarios.title.horarios') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    {!! Form::button('Cantidad Usuarios Default', array('class' => 'btn btn-primary cantidad-maxima-usuarios')) !!}
                </div>
            </div>
            <div class="box box-primary">
                <!-- /.box-header -->
                <div class="box-body">
                   @include("reservas::admin.horarios.partials.index.horarios")
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    @include('reservas::admin.horarios.partials.index.modal-alert')
    @include('reservas::admin.horarios.partials.index.modal-agregar')
    @include('reservas::admin.horarios.partials.index.modal-actualizar-cantidad-usuarios-default')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('reservas::horarios.title.create horario') }}</dd>
    </dl>
@stop

@section('scripts')
    @include('reservas::admin.horarios.partials.index.scripts.main')
    <?php $locale = locale(); ?>
@stop
