@extends('layout/portal')

@section('title')
Parent - Event & Campaigns
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/pages/parent/events-campaigns.css') }}">
@endsection

@section('header')
<div class="title-section">

   <span>Events & Campaigns</span>
</div>
@endsection

@section('header_right')
<div class="search-box">
   <span class="search-icon" aria-hidden="true">
      <img src="{{ asset('assets/icons/search.svg') }}" />

   </span>
   <input type="search" name="q" placeholder="Search" />
</div>
@endsection

@section('content')

@endsection