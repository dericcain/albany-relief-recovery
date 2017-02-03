@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                @if($need->is_complete)
                    <div class="panel panel-success">
                        @elseif($need->is_pending)
                            <div class="panel panel-warning">
                                @else
                                    <div class="panel panel-default">
                                        @endif
                                        <div class="panel-heading">
                                            @if($need->is_complete)
                                                <h3><span class="label label-success pull-right">Complete</span></h3>
                                            @elseif($need->is_pending)
                                                <h3><span class="label label-warning pull-right">Pending</span></h3>
                                            @else
                                                <h3><span class="label label-default pull-right">Waiting</span></h3>
                                            @endif
                                            <h2>Case# URGENT-{{ $need->id }}</h2>
                                        </div>
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
                                    </div>
                            </div>
                    </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush