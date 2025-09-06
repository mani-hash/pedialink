@extends('layout/portal')

@section('title')
    PHM  Vaccination
@endsection

@section('header')
   Vaccination Details
@endsection

@section('content')
    <?php
    $items = [
        ['id' => 'C-123', 'name' => 'Sarah Peter',  'Age' => '4 months', 'Vaccination Status' => 'Completed', 'Vaccination Date' => '2023-01-15'],
        ['id' => 'D-123', 'name' => 'John peter',   'Age' => '7 months', 'Vaccination Status' => 'Over due','Vaccination Date' => '2023-02-20'],
        ['id' => 'B-123', 'name' => 'Daniel Parker',  'Age' => '5 months', 'Vaccination Status' => 'Completed','Vaccination Date' => '2023-01-30'],
        ['id' => 'C-123', 'name' => 'Sarah Peter',  'Age' => '4 months', 'Vaccination Status' => 'Completed','Vaccination Date' => '2023-01-15'],
        ['id' => 'F-123', 'name' => 'Sarah Peter',  'Age' => '4 months', 'Vaccination Status' => 'Completed','Vaccination Date' => '2023-01-16'],
        ['id' => 'J-123', 'name' => 'Sarah Peter',  'Age' => '4 months', 'Vaccination Status' => 'Completed','Vaccination Date' => '2023-01-17'],
        ['id' => 'L-123', 'name' => 'Sarah Peter',  'Age' => '4 months', 'Vaccination Status' => 'Completed','Vaccination Date' => '2023-01-18'],
        ['id' => 'T-123', 'name' => 'Sarah Peter',  'Age' => '4 months', 'Vaccination Status' => 'Completed','Vaccination Date' => '2023-01-18'],
        ['id' => 'K-123', 'name' => 'Sarah Peter',  'Age' => '4 months', 'Vaccination Status' => 'Completed','Vaccination Date' => '2023-01-19'],
        ['id' => 'A-123', 'name' => 'Sarah Peter',  'Age' => '4 months', 'Vaccination Status' => 'Completed','Vaccination Date' => '2023-01-13'],
        ['id' => 'L-123', 'name' => 'Sarah Peter',  'Age' => '4 months', 'Vaccination Status' => 'Completed','Vaccination Date' => '2023-01-14'],
    ];
    ?>

    <c-table.wrapper card="1">
        <div class="table-wrapper" data-responsive="true">
            <c-table.main sticky="1" size="comfortable">
                <c-table.thead>
                    <c-table.tr>
                        <c-table.th sortable="1" width="200px">ID</c-table.th>
                        <c-table.th sortable="1" width="220px">Name</c-table.th>
                        <c-table.th sortable="1" width="220px">Age</c-table.th>
                        <c-table.th align="left" sortable="1" width="220px">Vaccination Status</c-table.th>
                        <c-table.th align="left" sortable="1">Vaccination Date</c-table.th>
                        <c-table.th class="table-actions"></c-table.th>
                    </c-table.tr>
                </c-table.thead>

                <c-table.tbody>
                    @foreach ($items as $item)
                        <c-table.tr>
                            <c-table.td col="id">{{ $item['id'] }}</c-table.td>
                            <c-table.td col="name">{{ $item['name'] }}</c-table.td>
                            <c-table.td col="Age">{{ $item['Age'] }}</c-table.td>
                            <c-table.td col="Vaccination Satus">{{ $item['Vaccination Status'] }}</c-table.td>
                            <c-table.td col="Vaccination Date">{{ $item['Vaccination Date'] }}</c-table.td>
                            <c-table.td class="table-actions" align="center">
                                <c-dropdown.main>
                                    <c-slot name="trigger">
                                        <c-button variant="ghost" class="dropdown-trigger">
                                            <img src="{{ asset('assets/icons/horizontal-more.svg')}}" />
                                        </c-button>
                                    </c-slot>
                                    <c-slot name="menu">
                                        <c-dropdown.item>View Vaccination Details</c-dropdown.item>
                                        <c-dropdown.sep />
                                        <c-dropdown.item>Edit Vaccination Details</c-dropdown.item>
                                    </c-slot>
                                </c-dropdown.main>
                            </c-table.td>
                        </c-table.tr>
                    @endforeach
                    @if(count($items) === 0)
                        <tr><td colspan="6"><div class="table-empty">No items found</div></td></tr>
                    @endif
                </c-table.tbody>
            </c-table.main>
        </div>
    </c-table.wrapper>

    <c-table.pagination />
@endsection