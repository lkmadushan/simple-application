@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('States') }}</div>

                    <div class="card-body">
                      <button>
                        <a href="{{ route('states.create') }}">Create New Status</a>
                      </button>

                        @if (session('state'))
                            <div class="alert alert-success" role="alert">
                                {{ session('state') }}
                            </div>
                        @endif

                        <form action="{{ route('states.index') }}" method="GET">
                            <input type="text" value="{{ request('search') }}" class="form-control" name="search">

                            <button>Search</button>
                        </form>

                        <table>
                            <thead>
                            <th>Country</th>
                            <th>Name</th>
                            </thead>
                            <tbody>
                            @foreach($states as $state)
                                <tr>
                                    <td>{{ $state->country->name }}</td>
                                    <td>{{ $state->name }}</td>
                                    <td><a href="{{ route('states.show', $state->id) }}">Edit</a></td>
                                    <td>
                                        <form action="{{ route('states.destroy', $state->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-link">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
