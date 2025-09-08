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
        <c-slot name="title"></c-slot>
        <c-slot name="number"></c-slot>
        <c-slot name="icon"></c-slot>
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
                <li class="select-item" data-value="baby-sara">Baby Sara</li>
                <li class="select-item" data-value="baby-john">Baby John</li>
            </c-select>
        </div>
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


@extends('layout/portal')

@section('title')
PHM Dashboard
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/pages/phm/dashboard.css') }}">
@endsection

@section('header')
    Good Evening Harry!
@endsection

@section('content')
     <!-- Dashboard Content -->
    <div class="dashboard-content">
        <div class="stats-grid">
            <!--<div class="stat-card">-->
            <div class="stat-content">
                <c-pill>
                        <c-slot name="title">Assinged Children</c-slot>
                        <c-slot name="number">03</c-slot>
                        <c-slot name="icon">
                        <img src="{{ asset('assets/icons/baby-01.svg') }}" alt="" />
                        </c-slot>
                </c-pill>

                <c-pill>
                    <c-slot name="title">Assigned Mothers</c-slot>
                    <c-slot name="number">04</c-slot>
                    <c-slot name="icon">
                        <img src="{{ asset('assets/icons/mother.svg') }}" alt="" />
                    </c-slot>
                </c-pill>

                <c-pill>
                    <c-slot name="title">Vaccinations Due</c-slot>
                    <c-slot name="number">04</c-slot>
                    <c-slot name="icon">
                        <img src="{{ asset('assets/icons/vaccine.svg') }}" alt="" />
                    </c-slot>
                </c-pill>

            </div>
        </div>
    </div>

    </div>
        <!-- Charts and Data Section -->
        <div class="charts-grid">
            <!-- Antenatal Risk Cases Chart -->
            <div class="chart-card">
                <div class="chart-header">
                    <h3>Antenatal Risk Cases</h3>
                    <p>Antenatal risk rates grouped by age group</p>
                </div>
                <div class="chart-container">
                    <canvas id="riskChart"></canvas>
                </div>
            </div>

            <!-- Monthly Vaccinations Chart -->
            <div class="chart-card">
                <div class="chart-header">
                    <h3>Monthly Vaccinations Completed</h3>
                    <p>Tracking vaccination completion rates over time</p>
                </div>
                <div class="chart-container">
                    <canvas id="vaccinationChart"></canvas>
                    <div class="chart-center-text">
                        <span class="center-number">254</span>
                        <span class="center-label">children</span>
                    </div>
                </div>
                <div class="chart-legend">
                    <div class="legend-item">
                        <span class="legend-color completed"></span>
                        <span>Completed</span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-color pending"></span>
                        <span>Pending</span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-color missed"></span>
                        <span>Missed</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Appointments and Vaccinations Section -->
        <div class="appointments-grid">
            <!-- Upcoming Appointments -->
            <div class="appointments-card">
                <div class="card-header">
                    <div>
                        <h3>Upcoming Appointments</h3>
                        <p>Upcoming appointments to attend</p>
                    </div>
                    <button class="view-all-btn">View Schedule</button>
                </div>
                
                <div class="appointments-list">
                    <div class="appointment-item">
                        <div class="appointment-info">
                            <span class="appointment-name">Sara Nancy - Routine Checkup</span>
                            <div class="appointment-meta">
                                <i class="fas fa-baby"></i>
                                <span>Baby</span>
                            </div>
                        </div>
                        <div class="appointment-time">
                            <span class="appointment-date">2025-06-06</span>
                            <span class="appointment-hour">09:30 AM</span>
                        </div>
                    </div>
                    
                    <div class="appointment-item">
                        <div class="appointment-info">
                            <span class="appointment-name">Nancy Parker - Routine Checkup</span>
                            <div class="appointment-meta">
                                <i class="fas fa-female"></i>
                                <span>Mother</span>
                            </div>
                        </div>
                        <div class="appointment-time">
                            <span class="appointment-date">2025-06-06</span>
                            <span class="appointment-hour">09:30 AM</span>
                        </div>
                    </div>
                    
                    <div class="appointment-item">
                        <div class="appointment-info">
                            <span class="appointment-name">Lara Peter - Counseling Session</span>
                            <div class="appointment-meta">
                                <i class="fas fa-female"></i>
                                <span>Mother</span>
                            </div>
                        </div>
                        <div class="appointment-time">
                            <span class="appointment-date">2025-06-06</span>
                            <span class="appointment-hour">09:30 AM</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Upcoming Vaccinations -->
            <div class="vaccinations-card">
                <div class="card-header">
                    <div>
                        <h3>Upcoming Vaccination</h3>
                        <p>Vaccines due for assigned children</p>
                    </div>
                    <button class="view-all-btn">View All</button>
                </div>
                
                <div class="vaccinations-list">
                    <div class="vaccination-item">
                        <div class="vaccination-info">
                            <span class="vaccination-name">Baby Sara</span>
                            <div class="vaccination-meta">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>RHU Center A</span>
                            </div>
                        </div>
                        <div class="vaccination-details">
                            <span class="vaccine-type">BCG</span>
                            <span class="vaccination-date">2025-06-01</span>
                        </div>
                    </div>
                    
                    <div class="vaccination-item">
                        <div class="vaccination-info">
                            <span class="vaccination-name">Baby Mike</span>
                            <div class="vaccination-meta">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>RHU Center A</span>
                            </div>
                        </div>
                        <div class="vaccination-details">
                            <span class="vaccine-type">OPV</span>
                            <span class="vaccination-date">2025-06-01</span>
                        </div>
                    </div>
                    
                    <div class="vaccination-item">
                        <div class="vaccination-info">
                            <span class="vaccination-name">Baby Sara</span>
                            <div class="vaccination-meta">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>RHU Center A</span>
                            </div>
                        </div>
                        <div class="vaccination-details">
                            <span class="vaccine-type">MMR</span>
                            <span class="vaccination-date">2025-06-01</span>
                        </div>
                    </div>
                    
                    <div class="vaccination-item">
                        <div class="vaccination-info">
                            <span class="vaccination-name">Baby Sara</span>
                            <div class="vaccination-meta">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>RHU Center A</span>
                            </div>
                        </div>
                        <div class="vaccination-details">
                            <span class="vaccine-type">MMR</span>
                            <span class="vaccination-date">2025-06-01</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection