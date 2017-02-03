@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 m-b-24">
                <h2>Volunteers</h2>
            </div>
            <div class="col-sm-12">
                <div class="section-wrapper">
                    <div class="responsive-table-wrapper">
                        <table class="table table-striped table-hover table-condensed" id="volunteers-table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Start Date</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($volunteers as $volunteer)
                                <tr>
                                    <td>{{ $volunteer->full_name }}</td>
                                    <td>{{ $volunteer->phone }}</td>
                                    <td>{{ $volunteer->email }}</td>
                                    <td>{{ $volunteer->date_available->format(' F j') }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('volunteers.show', ['id' => $volunteer->id]) }}"
                                               class="btn btn-sm btn-default"
                                               data-toggle="tooltip"
                                               data-placement="top"
                                               title="View Volunteer">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('volunteers.edit', ['id' => $volunteer->id]) }}"
                                               class="btn btn-sm btn-primary"
                                               data-toggle="tooltip"
                                               data-placement="top"
                                               title="Edit Volunteer">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.13/r-2.1.0/datatables.min.css"/>
@endpush

@push('js')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.13/r-2.1.0/datatables.min.js"></script>
<script type="text/javascript" src="{{ asset('js/volunteers.bundle.js') }}"></script>
@endpush