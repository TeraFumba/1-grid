@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>All Posts</h1>
@stop

@section('content')
<div id="app">
    <all-posts> 

    </all-posts>
</div>  
@stop
<script src="{{ mix('js/app.js') }}" defer></script>