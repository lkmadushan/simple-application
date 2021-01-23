@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Cities') }}</div>
                    <div class="card-body">
                        @if (session('city'))
                            <div class="alert alert-success" role="alert">
                                {{ session('city') }}
                            </div>
                        @endif
                        <form class="d-flex" action="{{ route('cities.index') }}" method="GET">
                            <input placeholder="Search here..." type="text" value="{{ request('search') }}" class="form-control" name="search">
                            <button class="mx-2 btn btn-primary text-light">
                              <i class="fa fa-search"></i>
                            </button>
                            <a class="btn btn-primary" href="{{ route('cities.create') }}">Create</a>
                        </form>
                        <table class="table mt-3">
                            <thead>
                            <th class="pl-4">Country</th>
                            <th>State</th>
                            <th>Name</th>
                            <th></th>
                            <th class="text-right pr-4">Actions</th>
                            </thead>
                            <tbody>
                            @foreach($cities as $city)
                                <tr>
                                    <td class="align-middle font-weight-bold pl-4">{{ $city->state->country->name }}</td>
                                    <td class="align-middle font-weight-bold">{{ $city->state->name }}</td>
                                    <td class="align-middle font-weight-bold">{{ $city->name }}</td>
                                    <td></td>
                                    <td>
                                      <div class="d-flex justify-content-end">
                                        <a class="mt-2 mr-2" href="{{ route('cities.show', $city->id) }}">
                                        <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('cities.destroy', $city->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-link"><i class="fas fa-trash-alt text-danger"></i></button>
                                        </form>
                                       </div>
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
