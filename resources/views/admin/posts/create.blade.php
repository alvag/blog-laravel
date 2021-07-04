@extends('admin.layout')

@section('header')
    <h1>
        Posts
        <small>Crear publicación</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{ route('admin.posts.index') }}"><i class="fa fa-dashboard"></i> Posts</a></li>
        <li class="active">Crear post</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <form>
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title">Título</label>
                            <input name="title" type="text" id="title" class="form-control"
                                placeholder="Ingresa el título de la publicación">
                        </div>

                        <div class="form-group">
                            <label for="editor">Contenido</label>
                            <textarea name="body" type="text" id="editor" rows="10" class="form-control"
                                placeholder="Contenido de la publicación"></textarea>
                        </div>
                    </div>


                </div>
            </div>

            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-body">

                        <div class="form-group">
                            <label>Fecha de:</label>

                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input name="published_at" type="text" class="form-control pull-right" id="datepicker">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="excerpt">Extracto</label>
                            <textarea name="excerpt" type="text" id="excerpt" class="form-control"
                                placeholder="Extracto publicación"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Categorías:</label>
                            <select class="form-control">
                                <option value="">Selecciona una categoría</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Etiquetas</label>
                            <select class="form-control select2" multiple="multiple"
                                data-placeholder="Selecciona una o más etiquetas" style="width: 100%">
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar Publicación</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection


@push('styles')
    <link rel="stylesheet" href="/adminlte/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/adminlte/plugins/select2/dist/css/select2.min.css">
@endpush

@push('scripts')
    <!-- bootstrap datepicker -->
    <script src="/adminlte/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- CK Editor -->
    <script src="/adminlte/plugins/ckeditor/ckeditor.js"></script>

    <!-- Select2 -->
    <script src="/adminlte/plugins/select2/dist/js/select2.full.min.js"></script>


    <script>
        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        });

        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            // CK Editor
            CKEDITOR.replace('editor')
        });
    </script>
@endpush
