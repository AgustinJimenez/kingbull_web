<div class="box-body">
    {!! Form::normalInput('titulo', 'Título', $errors, $noticia) !!}

    {!! Form::normalTextarea('contenido', 'Contenido', $errors, $noticia) !!}

    @include('media::admin.fields.file-link', [
      'entityClass' => 'Modules\\\\Noticias\\\\Entities\\\\Noticia',
      'entityId' => $noticia->id,
      'zone' => 'imagen'
    ])
</div>
