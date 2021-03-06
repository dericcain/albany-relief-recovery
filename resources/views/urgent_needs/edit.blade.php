@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.urgent_needs._form', ['route' => route('urgent_needs.update', ['id' => $need->id])])
    </div>
@endsection

@push('js')
<script src="{{ asset('js/urgent-needs.bundle.js') }}"></script>
@endpush