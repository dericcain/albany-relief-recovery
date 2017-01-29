@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="responsive-table-wrapper">
                    <table class="table table-striped table-hover table-condensed" id="needs-table">
                        <thead>
                        <tr>
                            <th>Status</th>
                            <th></th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($needs as $need)
                            <tr>
                                @if($need->is_pending)
                                    <td class="pending"><span class="label label-warning">Pending</span></td>
                                @elseif($need->is_complete)
                                    <td class="complete"><span class="label label-success">Complete</span></td>
                                @else
                                    <td class="waiting"><span class="label label-default">Waiting</span></td>
                                @endif
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('needs.show', ['id' => $need->id]) }}"
                                           class="btn btn-sm btn-default"
                                           data-toggle="tooltip"
                                           data-placement="top"
                                           title="View Need">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('needs.edit', ['id' => $need->id]) }}"
                                           class="btn btn-sm btn-primary"
                                           data-toggle="tooltip"
                                           data-placement="top"
                                           title="Edit Need">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </div>
                                </td>
                                <td>{{ $need->full_name }}</td>
                                <td>{{ $need->address }}</td>
                                <td>{{ $need->phone }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button"
                                                data-id="{{ $need->id }}"
                                                data-route="{{ route('needs.update', ['id' => $need->id]) }}"
                                                class="btn btn-sm btn-warning mark-pending change-status {{ $need->is_pending || $need->is_complete ? 'disabled' : '' }}"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title="Mark as Pending">
                                            <i class="fa fa-clock-o"></i>
                                        </button>
                                        <button type="button"
                                                data-id="{{ $need->id }}"
                                                data-route="{{ route('needs.update', ['id' => $need->id]) }}"
                                                class="btn btn-sm btn-success mark-complete change-status {{  $need->is_complete ? 'disabled' : '' }}"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title="Mark as Complete">
                                            <i class="fa fa-check"></i>
                                        </button>
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
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.13/r-2.1.0/datatables.min.css"/>
@endpush

@push('js')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.13/r-2.1.0/datatables.min.js"></script>
<script type="text/javascript" src="{{ asset('js/needs-table.bundle.js') }}"></script>
@endpush