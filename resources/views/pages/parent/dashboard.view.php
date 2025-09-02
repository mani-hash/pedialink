@extends('layout/portal')

@section('title')
Parent Dashboard
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/pages/parent/dashboard.css') }}">
@endsection


@section('header')
Good Evening, 
<br>Harry
<section class="pill-container">
    <c-card>
        <div class="text-section">
        <span class="pill-title">Linked Children</span>
        <span class="pill-subtitle">03</span>
        <img src="{{asset('assets/icons/baby-01.svg')}}" alt="">
</div>
    </c-card>


</section>

@endsection


@section('content')

<main class="container">
    <c-card class="card">
        <div class="header">
            <div class="title-section">
                <span class="card-title">Upcoming Events</span>
                <span class="card-subtitle">Stay updated with upcoming events</span>
            </div>
            <c-button varient="secondary">View All</c-button>
        </div>
        <div class="card-body">
            <div class="tab vaccine">
                
            </div>
        </div>
    </c-card>
       <c-card class="card">
        <div class="header">
            <div class="title-section">
                <span class="card-title">Child Growth Chart</span>
                <span class="card-subtitle">Track Baby Sarah's BMI over time</span>
            </div>
 <c-select name='child' class="child-select" placeholder="Select Child">
 *    <li class="select-item" data-value="baby-sara">Baby Sara</li>
 *    <li class="select-item" data-value="baby-john">Baby John</li>
 * </c-select>        </div>
        <div class="card-body">
            <div class="tab events-campaigns">
                
            </div>
        </div>
    </c-card>
    <c-card class="card">
        <div class="header">
            <div class="title-section">
                <span class="card-title">Upcoming Appoinments</span>
                <span class="card-subtitle">Your scheduled visits to the clinic</span>
            </div>
            <c-button varient="secondary">View Schedule</c-button>
        </div>
        <div class="card-body">
            <div class="tab appoinment">
                
            </div>
        </div>
    </c-card>
    <c-card class="card">
        <div class="header">
            <div class="title-section">
                <span class="card-title">Upcoming Events & Campaigns</span>
                <span class="card-subtitle">Scheduled health events and vaccination drives</span>
            </div>
            <c-button varient="secondary">View All</c-button>
        </div>
        <div class="card-body">
            <div class="tab events-campaigns">
                
            </div>
        </div>
    </c-card>
    
</main>


@endsection