@extends('layout.index')
@section('contenido')
@section('administracion-active', 'active')
@section('administracion-show', 'show')
@section('matricula-active', 'active')
<div id="app">
    <matriculapagoindex-component :tiposdocumentos="{{ json_encode(tiposDocumentos()) }}"
        :csrf="{{ json_encode(csrf_token()) }}" :clientes="{{ json_encode(clientes()) }}"
        :old="{{ json_encode(Session::getOldInput()) }}" :validaciones="{{ json_encode(session('validaciones')) }}"
        :vista="{{ json_encode(session('vista')) }}" :pagos="{{ $pagos }}" :matricula="{{ $matricula }}"
        :elemento="{{ json_encode(session('elemento')) }}">
    </matriculapagoindex-component>
</div>
@endsection
@section('vue-css')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection
@section('vue-script')
<script src="{{ asset('js/app.js') }}"></script>
@endsection
