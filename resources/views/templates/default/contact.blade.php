@extends('templates.default.layout')
@section('title', $data['contact']['mainCaption'])
@section('content')
    @include('templates.default.components.contacto',['data'=>$data['contact']])

@stop
