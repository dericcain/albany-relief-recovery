@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 m-b-24">
                <h2>Individual Volunteer Form</h2>
                <p>Thank you for being interested in volunteering! This form is for individuals only. If you are a group
                    who is looking to help, please complete the Volunteer Group Form found at albanyreliefrecovery.com.
                    As we continue to assess the needs and help our community move toward recovery, this information
                    will be helpful in filling potential needs.</p>
            </div>
            <div class="col-sm-12">
                @include('partials.volunteers._form', ['route' => route('volunteers.store')])
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