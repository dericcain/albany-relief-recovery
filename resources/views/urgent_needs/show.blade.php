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
                <h2>Case# URGENT-{{ $need->id }}</h2>
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
                            <td>Alt Phone:</td>
                            <td> {{ $need->alt_phone or '' }}</td>
                        </tr>
                        <tr>
                            <td>Address:</td>
                            <td>{{ $need->address }}, {{ $need->zip }}</td>
                        </tr>
                        <tr>
                            <td>Comments:</td>
                            <td> {{ $need->comments }}</td>
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