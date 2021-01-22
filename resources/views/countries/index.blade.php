@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Countries') }}</div>

                    <div class="card-body">
                      <button>
                        <a href="{{ route('countries.create') }}">Create New Country</a>
                      </button>

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('countries.index') }}" method="GET">
                            <input type="text" value="{{ request('search') }}" class="form-control" name="search">

                            <button>Search</button>
                        </form>

                        <table>
                            <thead>
                            <th>Country Code</th>
                            <th>Name</th>
                            </thead>
                            <tbody>
                            @foreach($countries as $country)
                                <tr>
                                    <td>{{ $country->country_code }}</td>
                                    <td>{{ $country->name }}</td>
                                    <td><a href="{{ route('countries.show', $country->id) }}">Edit</a></td>
                                    <td>
                                        <form action="{{ route('countries.destroy', $country->id) }}" method="POST">
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
