@extends('layouts.app')

@section('content')
    <div class="container pt-4">
        <div class="row justify-content-center">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Cities') }}</div>
                    <div class="card-body">
                        <x-city-form :city="$city" :states="$states" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
