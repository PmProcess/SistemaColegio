@extends('layout.index')
@section('contenido')
@section('administracion-active','active')
@section('administracion-show','show')
@section('matricula-active','active')
    <div id="app">
        <matriculaindex-component></matriculaindex-component>
    </div>
@endsection
@section('vue-css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection
@section('vue-script')
<script src="{{asset('js/app.js')}}"></script>
@endsection
