@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Departments') }}</div>

                    <div class="card-body">
                        @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        <form action="{{ route('departments.show', $department->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input
                                    id="name"
                                    type="text"
                                    class="form-control @error('name') is-invalid  @enderror" value="{{ old('name', $department->name) }}"
                                    name="name"
                                >
                            </div>

                            <button class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
