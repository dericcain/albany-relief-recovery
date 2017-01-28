@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @if($need->is_complete)
                    <h3><span class="label label-success pull-right">Complete</span></h3>
                @elseif($need->is_pending)
                    <h3><span class="label label-warning pull-right">Pending</span></h3>
                @else
                    <h3><span class="label label-default pull-right">Waiting</span></h3>
                @endif
                <h2>Case# {{ $need->id }}</h2>
                <div class="clearfix m-b-24"></div>
            </div>
            <div class="col-sm-12">
                <div class="section-wrapper">
                    <table class="table table-striped table-hover">
                        <tbody>
                        <tr>
                            <td>Name:</td>
                            <td> {{ $need->full_name }}</td>
                        </tr>
                        <tr>
                            <td>Phone:</td>
                            <td> {{ $need->phone }}</td>
                        </tr>
                        <tr>
                            <td>email:</td>
                            <td> {{ $need->phone }}</td>
                        </tr>
                        <tr>
                            <td>Speaks Spanish:</td>
                            <td>{{ $need->speaks_spanish ? 'Yes' : 'No' }}</td>
                        </tr>
                        <tr>
                            <td>Address:</td>
                            <td>{{ $need->address }}, {{ $need->zip }}</td>
                        </tr>
                        <tr>
                            <td>Insurance:</td>
                            <td> {{ $need->insurance_agency }}</td>
                        </tr>
                        <tr>
                            <td>Has applied for FEMA/GEMA:</td>
                            <td> {{ $need->speaks_spanish ? 'Yes' : 'No' }}</td>
                        </tr>
                        <tr>
                            <td>Currently living at home:</td>
                            <td> {{ $need->is_staying_home ? 'Yes' : 'No' }}</td>
                        </tr>
                        <tr>
                            <td>Has power:</td>
                            <td> {{ $need->has_power ? 'Yes' : 'No' }}</td>
                        </tr>
                        <tr>
                            <td>Needs:</td>
                            <td>
                                @foreach($need->physicalNeeds as $item)
                                    <p>{{ ucfirst($item->name) }}</p>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td>Prayer needs:</td>
                            <td> {{ $need->prayer_needs }}</td>
                        </tr>
                        <tr>
                            <td>Attends local church:</td>
                            <td> {{ $need->attends_church ? 'Yes' : 'No' }}</td>
                        </tr>
                        <tr>
                            <td>Church attended:</td>
                            <td> {{ $need->church_attended }}</td>
                        </tr>
                        <tr>
                            <td>Additional comments:</td>
                            <td> {{ $need->additional_comments }}</td>
                        </tr>
                        </tbody>
                    </table>

                    <h3></h3>
                    <hr>

                </div>
            </div>
        </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush