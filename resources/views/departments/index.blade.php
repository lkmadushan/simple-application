@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Departments') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('departments.index') }}" method="GET">
                            <input type="text" value="{{ request('search') }}" class="form-control" name="search">

                            <button>Search</button>
                        </form>

                        <table>
                            <thead>
                            <th>Name</th>
                            </thead>
                            <tbody>
                            @foreach($departments as $department)
                                <tr>
                                    <td>{{ $department->name }}</td>
                                    <td><a href="{{ route('departments.show', $department->id) }}">Edit</a></td>
                                    <td>
                                        <form action="{{ route('departments.show', $department->id) }}" method="POST">
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
