@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">{{ __('Users') }}</div>
          <div class="card-body">
            <x-user-form :user="$user" :roles="$roles"/>
          </div>
        </div>
        @if($user->exists)
          <div class="card mt-4">
            <div class="card-header">{{ __('Change Password') }}</div>
            <div class="card-body">
              <form action="{{ route('change_password', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="password">Password</label>
                  <input
                    id="password"
                    type="password"
                    class="form-control @error('password') is-invalid  @enderror"
                    name="password"
                  >
                </div>

                <div class="form-group">
                  <label for="password_confirmation">Confirm Password</label>
                  <input
                    id="password_confirmation"
                    type="password"
                    class="form-control @error('password_confirmation') is-invalid  @enderror"
                    name="password_confirmation"
                  >
                </div>

                <button class="btn btn-primary">Update Password</button>
              </form>
            </div>
          </div>
        @endif
      </div>
    </div>
  </div>
@endsection
