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
        'id' => 'APT001',
        'name' => 'John Doe',
        'date' => '2024-07-15',
        'time' => '10:00 AM',
        'location' => 'City Clinic',
        'doctor' => 'Dr. Smith',
        'status' => 'Upcoming',
        'purpose' => 'Regular Checkup',
        'notes'=>[
            'Bring previous medical records.',
            'Fasting required for blood test.'
        ]
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
                    <c-table.th sortable="1">Name</c-table.th>
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
                    <c-table.td col="name">{{$appointmnet['name']}}</c-table.td>
                    <c-table.td col="date-time" width="200px">{{$appointmnet['date']}} at {{$appointmnet['time']}}</c-table.td>
                    <c-table.td col="location" width="200px">{{$appointmnet['location']}}</c-table.td>
                    <c-table.td col="doctor">{{$appointmnet['doctor']}}</c-table.td>
                    <c-table.td col="status">
                        <c-badge>
                            {{$appointmnet['status']}}
                        </c-badge>
                    </c-table.td>
                    <c-table.td class="table-actions" align="center">
                        <c-dropdown.main>
                            <c-slot name="trigger">
                                <c-button variant="ghost" class="dropdown-trigger">
                                    <img src="{{ asset('assets/icons/horizontal-more.svg')}}" />
                                </c-button>
                            </c-slot>
                            <c-slot name="menu">
                                <c-dropdown.item>View Details</c-dropdown.item>
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