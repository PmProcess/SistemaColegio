@extends('layout.index')
@section('contenido')
@section('administracion-active','active')
@section('administracion-show','show')
@section('grado-active','active')
    <div id="app">
        <gradoseccionindex-component
        :old="{{json_encode(Session::getOldInput())}}"
        :errores_laravel="{{json_encode(session('errores'))}}"
        :csrf="{{json_encode(csrf_token())}}"
        :error="{{json_encode(session('error'))}}"
        :tipo="{{json_encode(session('tipo'))}}"
        :id="{{json_encode(session('id'))}}"
        :idgrado="{{json_encode($idgrado)}}"
        :secciones="{{json_encode($secciones)}}"
        ></gradoseccionindex-component>
    </div>
@endsection
@section('vue-css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection
@section('vue-script')
<script src="{{asset('js/app.js')}}"></script>
@endsection
