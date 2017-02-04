@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('print.needs') }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-sm-12 m-b-24">
                <div id="map"></div>
            </div>
            <div class="col-sm-8 col-sm-offset-2 m-t-24">
                @if(Auth::check())
                    <p><strong>When printing, you need to leave the info window on the drop pins open, otherwise the
                            page for that pin will not pirint.</strong></p>
                @endif
            </div>
        </div>
        <button class="btn btn-primary" type="submit" id="print-button" style="display:none"><i class="fa fa-print"></i>
            Print Selected
            Needs
        </button>
    </form>
@endsection

@push('css')
@endpush

@push('js')
<script src="{{ asset('js/map.bundle.js') }}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCluOwWjHXusS1tUaMHN1q4sXcEXF_c1hk"></script>
@endpush