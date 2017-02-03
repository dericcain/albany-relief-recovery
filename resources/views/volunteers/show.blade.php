@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Volunteer - {{ $volunteer->full_name }}</h2>
                    </div>
                    <table class="table table-striped table-hover">
                        <tbody>
                        <tr>
                            <td>Name:</td>
                            <td> {{ $volunteer->full_name }}</td>
                        </tr>
                        <tr>
                            <td>Phone:</td>
                            <td> {{ $volunteer->phone }}</td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td> {{ $volunteer->email or '' }}</td>
                        </tr>
                        <tr>
                            <td>Affiliation:</td>
                            <td>{{ $volunteer->affiliation }}</td>
                        </tr>
                        <tr>
                            <td>Preferred Type of Work</td>
                            <td>
                                <ul class="list-group">
                                    @if($volunteer->debris_removal)
                                        <li class="list-group-item">Manual Labor - Clean Up & Debri Removal</li>
                                    @endif

                                    @if($volunteer->home_repair)
                                        <li class="list-group-item">Manual Labor - Home Repair</li>
                                    @endif

                                    @if($volunteer->deliveries)
                                        <li class="list-group-item">Home Deliveries of Goods</li>
                                    @endif

                                    @if($volunteer->administrative)
                                        <li class="list-group-item">Secretarial Work (phone management, data entry,
                                            etc.)
                                        </li>
                                    @endif

                                    @if($volunteer->sorting)
                                        <li class="list-group-item">Sorting/Warehouse Management</li>
                                    @endif

                                    @if($volunteer->communications)
                                        <li class="list-group-item">Communication - Social Media</li>
                                    @endif

                                    @if($volunteer->counseling)
                                        <li class="list-group-item">Counseling Services</li>
                                    @endif

                                    @if($volunteer->other)
                                        <li class="list-group-item">{{ $volunteer->other }}</li>
                                    @endif
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>Resources Available</td>
                            <td>{{ $volunteer->resources_available }}</td>
                        </tr>
                        <tr>
                            <td>Time Commitment</td>
                            <td>{{ $volunteer->time_commitment }}</td>
                        </tr>
                        <tr>
                            <td>Speaks Spanish</td>
                            <td>{{ $volunteer->speaks_spanish }}</td>
                        </tr>
                        <tr>
                            <td>Date Available</td>
                            <td>{{ $volunteer->date_available->format('F j, y') }}</td>
                        </tr>
                        <tr>
                            <td>Additional Comments:</td>
                            <td> {{ $volunteer->additional_comments }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush