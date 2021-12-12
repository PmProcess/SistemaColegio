@extends('layout.index')
@section('contenido')
@section('personas-active','active')
@section('personas-show','show')
@section('tiposEmpleados-active','active')
    <div id="app">
        <tipoempleadoindex-component></tipoempleadoindex-component>
    </div>
@endsection
@section('vue-css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection
@section('vue-script')
<script src="{{asset('js/app.js')}}"></script>
@endsection
