@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div id="map"></div>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
<script src="{{ asset('js/map.bundle.js') }}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCluOwWjHXusS1tUaMHN1q4sXcEXF_c1hk"></script>
@endpush