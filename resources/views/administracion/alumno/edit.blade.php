@extends('layout.index')
@section('contenido')
@section('personas-active','active')
@section('personas-show','show')
@section('alumno-active','active')
    <div id="app">
        <alumnoedit-component
        :departamentos="{{json_encode(departamentos())}}"
        :provincias="{{json_encode(provincias())}}"
        :distritos="{{json_encode(distritos())}}"
        :old="{{json_encode(Session::getOldInput())}}"
        :errores_laravel="{{json_encode(session('errores'))}}"
        :csrf="{{json_encode(csrf_token())}}"
        :error="{{json_encode(session('error'))}}"
        :alumno="{{json_encode($alumno)}}"
        ></alumnoedit-component>
    </div>
@endsection
@section('vue-css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection
@section('vue-script')
<script src="{{asset('js/app.js')}}"></script>
@endsection
