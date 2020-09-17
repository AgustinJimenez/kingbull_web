<div class="box-body">
    {!! Form::normalInput('titulo', 'Título', $errors) !!}

    {!! Form::normalTextarea('contenido', 'Contenido', $errors) !!}

    @include('media::admin.fields.new-file-link-single', [
    'zone' => 'imagen'])
</div>
