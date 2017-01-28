@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.needs._form')
    </div>
@endsection

@push('css')
@endpush

@push('js')
<script src="{{ asset('js/needs.bundle.js') }}"></script>
@endpush