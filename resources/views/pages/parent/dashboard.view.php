@extends('layout/portal')

@section('title')
Parent Dashboard
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/pages/parent/dashboard.css') }}">
@endsection



@section('content')
<div class="top-section">

    <section class="greet">
        <h1>Good Moring, <br>
            [Parent's Name]!</h1>
    </section>
    <section class="pill-container">
        <c-pill>
            <c-slot name="title">Linked Childern</c-slot>
            <c-slot name="number">03</c-slot>
            <c-slot name="icon">
                <img src="{{asset('assets/icons/baby-01.svg')}}">
            </c-slot>
        </c-pill>
        <c-pill>
            <c-slot name="title">Appoinments</c-slot>
            <c-slot name="number">03</c-slot>
            <c-slot name="icon">
                <img src="{{asset('assets/icons/profile.svg')}}">
            </c-slot>
        </c-pill>
        <c-pill>
            <c-slot name="title">Vaccinations</c-slot>
            <c-slot name="number">03</c-slot>
            <c-slot name="icon">
                <img src="{{asset('assets/icons/vaccine.svg')}}">
            </c-slot>
        </c-pill>
    </section>
</div>
<main class="container">
    <c-card class="card">
        <div class="header">
            <div class="title-section">
                <span class="card-title">Upcoming Events</span>
                <span class="card-subtitle">Stay updated with upcoming events</span>
            </div>
            <c-button varient="secondary" size="sm">View All</c-button>
        </div>
        <hr class="divider">

        <div class="card-body">
            <div class="tab vaccine">
                <div class="primary-deatils">
                    <div class="name">Baby Sara</div>
                    <div class="sub-details">
                        <img src="{{asset('assets/icons/profile.svg')}}" class="sub-icon">
                        <div class="sub-name">RHU Center A</div>
                    </div>
                    <c-badge>BCG</c-badge>
                    <div class="secondary-deatils">
                        <div class="date">2025.06.01</div>
                    </div>
                </div>
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
                <li class="select-item" data-value="baby-sara">Baby Sara</li>
                <li class="select-item" data-value="baby-john">Baby John</li>
            </c-select>
        </div>
        <hr class="divider">
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
            <c-button varient="secondary" size="sm">View Schedule</c-button>
        </div>
        <hr class="divider">

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
            <c-button varient="secondary" size="sm">View All</c-button>
        </div>
        <hr class="divider">

        <div class="card-body">
            <div class="tab events-campaigns">

            </div>
        </div>
    </c-card>

</main>


@endsection