@extends('layout.index')
@section('contenido')
@section('administracion-active', 'active')
@section('administracion-show', 'show')
@section('matricula-active', 'active')
<div id="app">
    <matriculacreate-component :old="{{ json_encode(Session::getOldInput()) }}"
        :errores_laravel="{{ json_encode(session('errores')) }}" :csrf="{{ json_encode(csrf_token()) }}"
        :error="{{ json_encode(session('error')) }}" :alumnos="{{ json_encode(alumnos()) }}"
        :grados="{{ json_encode(grados()) }}" :year_escolar="{{ json_encode(gradoEscolar()) }}">
    </matriculacreate-component>
</div>
@endsection
@section('vue-css')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection
@section('vue-script')
<script src="{{ asset('js/app.js') }}"></script>
@endsection
