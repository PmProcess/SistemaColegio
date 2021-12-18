@extends('layout.index')
@section('contenido')
@section('administracion-active','active')
@section('administracion-show','show')
@section('alumno-active','active')
    <div id="app">
        <alumnocreate-component
        :departamentos="{{json_encode(departamentos())}}"
        :provincias="{{json_encode(provincias())}}"
        :distritos="{{json_encode(distritos())}}"
        :old="{{json_encode(Session::getOldInput())}}"
        :errores_laravel="{{json_encode(session('errores'))}}"
        :csrf="{{json_encode(csrf_token())}}"
        :error="{{json_encode(session('error'))}}"
        ></alumnocreate-component>
    </div>
@endsection
@section('vue-css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection
@section('vue-script')
<script src="{{asset('js/app.js')}}"></script>
@endsection
