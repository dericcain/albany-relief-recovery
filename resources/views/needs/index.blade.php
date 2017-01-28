@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-condensed" id="needs-table">
                        <thead>
                        <tr>
                            <th>Status</th>
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
                                <td><a href="{{ route('needs.show', ['id' => $need->id]) }}">{{ $need->full_name }}</a>
                                </td>
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
<link rel="stylesheet" type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.13/css/dataTables.bootstrap.min.css"/>
@endpush

@push('js')
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.13/js/jquery.dataTables.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.13/js/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="{{ asset('js/needs-table.bundle.js') }}"></script>
@endpush