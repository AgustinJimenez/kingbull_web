<div class="box-body">
    {!! Form::normalInput('titulo', 'Título', $errors, $wod) !!}

    {!! Form::normalTextarea('contenido', 'Contenido', $errors, $wod) !!}

    @include('media::admin.fields.file-link', [
      'entityClass' => 'Modules\\\\Wod\\\\Entities\\\\Wod',
      'entityId' => $wod->id,
      'zone' => 'imagen'
    ])
</div>
