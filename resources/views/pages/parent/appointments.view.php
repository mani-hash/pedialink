@extends('layout/portal')

@section('title')
Parent - Appointments
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/pages/parent/appointments.css') }}">
@endsection

@section('header')

Appointments


@endsection

@section('content')
<?php

$appointments = [
    [
        'child' => 'John Doe',
        'date-time' => '2024-07-15 10:00 AM',
        'location' => 'City Clinic',
        'doctor' => 'Dr. Smith',
        'status' => 'Confirmed'
    ],
    [
        'child' => 'Jane Doe',
        'date-time' => '2024-07-20 02:00 PM',
        'location' => 'Health Center',
        'doctor' => 'Dr. Brown',
        'status' => 'Pending'
    ],
];

?>

<c-table.controls :columns='["Child","Date & Time ","Location","Doctor","Status"]'>

    <c-slot name="extrabtn">
        <c-link type="primary">
            <c-slot name="icon">
                <img src="{{ asset('assets/icons/profile.svg') }}" alt="">
            </c-slot>
            Requset Appointment </c-link>

    </c-slot>
</c-table.controls>

<c-table.wrapper card="1">
    <div class="table-wrapper" data-responsive="true">
        <c-table.main sticky="1" size="comfortable">
            <c-table.thead>
                <c-table.tr>
                    <c-table.th sortable="1">Child</c-table.th>
                    <c-table.th sortable="1">Date & Time</c-table.th>
                    <c-table.th sortable="1">Location</c-table.th>
                    <c-table.th>Doctor</c-table.th>
                    <c-table.th>Status</c-table.th>

                    <c-table.th class="table-actions"></c-table.th>
                </c-table.tr>
            </c-table.thead>

            <c-table.tbody>
                @foreach ($appointments as $appointmnet)
                <c-table.tr>
                    <c-table.td col="child"></c-table.td>
                    <c-table.td col="date-time"></c-table.td>
                    <c-table.td col="location"></c-table.td>
                    <c-table.td col="doctor"></c-table.td>
                    <c-table.td col="status"></c-table.td>
                    <c-table.td class="table-actions" align="center">
                        <c-dropdown.main>
                            <c-slot name="trigger">
                                <c-button variant="ghost" class="dropdown-trigger">
                                    <img src="{{ asset('assets/icons/horizontal-more.svg')}}" />
                                </c-button>
                            </c-slot>
                            <c-slot name="menu">
                                <c-dropdown.item>view Details</c-dropdown.item>
                                <c-dropdown.sep />

                                <c-dropdown.item>
                                    Reschedule Appointment
                                </c-dropdown.item>
                                <c-dropdown.item>
                                    Cancel Appointment
                                </c-dropdown.item>

                            </c-slot>
                        </c-dropdown.main>
                    </c-table.td>
                </c-table.tr>
                @endforeach
                @if(count($appointmnet) === 0)
                <tr>
                    <td colspan="6">
                        <div class="table-empty">No items found</div>
                    </td>
                </tr>
                @endif
            </c-table.tbody>
        </c-table.main>
    </div>
</c-table.wrapper>

<c-table.pagination />
@endsection