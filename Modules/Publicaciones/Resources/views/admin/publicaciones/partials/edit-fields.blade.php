<div class="box-body">
    {!! Form::normalInput('titulo', 'Título', $errors, $noticia) !!}

    {!! Form::normalInput('resumen', 'Resumen', $errors, $noticia) !!}

    {!! Form::normalTextarea('contenido', 'Contenido', $errors, $noticia) !!}

    @include('media::admin.fields.file-link', [
      'entityClass' => 'Modules\\\\Publicaciones\\\\Entities\\\\Publicaciones',
      'entityId' => $publicacion->id,
      'zone' => 'imagen'
    ])
</div>
