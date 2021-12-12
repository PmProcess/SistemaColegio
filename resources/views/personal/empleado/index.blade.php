@extends('layout.index')
@section('contenido')
@section('personas-active','active')
@section('personas-show','show')
@section('empleados-active','active')
    <div id="app">
        <empleadoindex-component></empleadoindex-component>
    </div>
@endsection
@section('vue-css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection
@section('vue-script')
<script src="{{asset('js/app.js')}}"></script>
@endsection
