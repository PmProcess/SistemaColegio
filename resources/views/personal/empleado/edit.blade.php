@extends('layout.index')
@section('contenido')
@section('personas-active','active')
@section('personas-show','show')
@section('empleados-active','active')
    <div id="app">
        <empleadoedit-component
        :departamentos="{{json_encode(departamentos())}}"
        :provincias="{{json_encode(provincias())}}"
        :distritos="{{json_encode(distritos())}}"
        :old="{{json_encode(Session::getOldInput())}}"
        :errores_laravel="{{json_encode(session('errores'))}}"
        :csrf="{{json_encode(csrf_token())}}"
        :error="{{json_encode(session('error'))}}"
        :tipo_empleados="{{json_encode(tipoEmpleados())}}"
        :empleado="{{json_encode($empleado)}}"
        ></empleadoedit-component>
    </div>
@endsection
@section('vue-css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection
@section('vue-script')
<script src="{{asset('js/app.js')}}"></script>
@endsection
