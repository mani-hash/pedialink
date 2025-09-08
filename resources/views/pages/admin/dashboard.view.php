@extends('layout/portal')

@section('title')
    Dashboard
@endsection

@section('header')
    Welcome, {{ auth()->user()->name }}
@endsection

@section('content')
    
@endsection