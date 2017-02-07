@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 m-b-24">
                <h2>Individual Volunteer Form - {{ $volunteer->full_name }}</h2>
            </div>
            <div class="col-sm-12">
                @include('partials.group_volunteers._form', ['route' => route('group_volunteers.update', ['id' => $volunteer->id])])
            </div>
        </div>
    </div>
@endsection

@push('css')
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.min.css">
@endpush

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('js/volunteers.bundle.js') }}"></script>
@endpush