@extends('adminlte::page')

@section('title', 'New Post')

@section('content_header')
    <h1>Create Post</h1>
@stop

@section('content')
<div id="app">
    <new_post> 

    </new_post>
</div>
@stop
<script src="{{ mix('js/app.js') }}" defer></script>
