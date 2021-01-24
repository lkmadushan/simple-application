@extends('layouts.app')

@section('content')
  <div class="container pt-4">
    <div class="row justify-content-center">
      <div class="col-md-4"></div>
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">{{ __('Employees') }}</div>
          <div class="card-body">
            <x-employee-form
              :employee="$employee"
              :countries="$countries"
              :states="$states"
              :cities="$cities"
            />
          </div>
        </div>
      </div>
        </div>
    </div>
@endsection
