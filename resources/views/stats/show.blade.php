@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <form method="POST" action="{{ route('print.stats') }}">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary pull-right">Print Stats</button>
                </form>
                <h1>Stats</h1>
            </div>
        </div>
        <div id="stats" class="row">
            <div class="col-sm-6 bg-info">
                <div class="stat-wrapper-lg">
                    <h4>People Helped</h4>
                    <div>{{ $completed }}</div>
                </div>
            </div>
            <div class="col-sm-6 bg-warning">
                <div class="stat-wrapper-lg">
                    <h4>People Needing Help</h4>
                    <div>{{ $pending }}</div>
                </div>
            </div>
            <div class="col-md-2 col-xs-4 bg-blue">
                <div class="stat-wrapper-sm">
                    <h4>Water Given</h4>
                    <div>{{ $water }}</div>
                </div>
            </div>
            <div class="col-md-2 col-xs-4 bg-yellow">
                <div class="stat-wrapper-sm">
                    <h4>Food Given</h4>
                    <div>{{ $food }}</div>
                </div>
            </div>
            <div class="col-md-2 col-xs-4 bg-pink">
                <div class="stat-wrapper-sm">
                    <h4>Baby Needs</h4>
                    <div>{{ $baby_needs }}</div>
                </div>
            </div>
            <div class="col-md-2 col-xs-4 bg-green">
                <div class="stat-wrapper-sm">
                    <h4>Debris Removal</h4>
                    <div>{{ $debris_removal }}</div>
                </div>
            </div>
            <div class="col-md-2 col-xs-4 bg-brown">
                <div class="stat-wrapper-sm">
                    <h4>Home Repair</h4>
                    <div>{{ $home_repair }}</div>
                </div>
            </div>
            <div class="col-md-2 col-xs-4 bg-red">
                <div class="stat-wrapper-sm">
                    <h4>Medical Supplies</h4>
                    <div>{{ $medical_supplies }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush