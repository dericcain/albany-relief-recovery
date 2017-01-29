@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.needs._form', ['route' => route('needs.update', ['id' => $need->id]) ])
    </div>
@endsection

@push('css')
@endpush

@push('js')
<script src="{{ asset('js/needs.bundle.js') }}"></script>
@endpush