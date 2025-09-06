@extends('layout/portal')

@section('title')
    PHM  Growth Monitoring
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/pages/phm/dashboard.css') }}">
@endsection

@section('header')
   Growth Monitoring - Overview
@endsection

@section('content')
        <div class="charts-grid-row">   
            <!-- Antenatal Risk Cases Chart -->
            <div class="chart-card">
                <div class="chart-header">
                    <h3>Child Weight Tracking</h3>
                    <p>Track Child's Weight Over Time</p>
                </div>
                <div class="chart-container">
                    <canvas id="riskChart"></canvas>
                </div>
            </div>     

<!-- Monthly Vaccinations Chart -->
            <div class="chart-card">
                <div class="chart-header">
                    <h3>Child Height Tracking</h3>
                    <p>Track Child's Height Over Time</p>
                </div>
                <div class="chart-container">
                    <canvas id="vaccinationChart"></canvas>
                </div>
            </div>
            
            <div class="chart-card">
                <div class="chart-header">
                    <h3>Child BMI Tracking</h3>
                    <p>Track Child's Height Over Time</p>
                </div>
                <div class="chart-container">
                    <canvas id="vaccinationChart"></canvas>
                </div>
            </div>  
        </div>      
@endsection            