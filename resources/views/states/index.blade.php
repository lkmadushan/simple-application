@extends('layouts.app')

@section('content')
    <div class="container pt-4">
        <div class="row justify-content-center">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('States') }}</div>
                    <div class="card-body">
                        @if (session('state'))
                            <div class="alert alert-success" role="alert">
                                {{ session('state') }}
                            </div>
                        @endif

                        <form class="d-flex" action="{{ route('states.index') }}" method="GET">
                            <input placeholder="Search here..." type="text" value="{{ request('search') }}" class="form-control" name="search">
                            <button class="mx-2 btn btn-primary text-light"><i class="fa fa-search"></i></button>
                            <a class="btn btn-primary" href="{{ route('states.create') }}">Create</a>
                        </form>

                        <table class="table mt-3">
                            <thead style="background-color:#F0F0F0;">
                            <th>Country</th>
                            <th>Name</th>
                            <th></th>
                            <th>Actions</th>
                            </thead>
                            <tbody>
                            @foreach($states as $state)
                                <tr>
                                    <td class="align-middle font-weight-bold">{{ $state->country->name }}</td>
                                    <td class="align-middle font-weight-bold">{{ $state->name }}</td>
                                    <td></td>
                                    <td>
                                      <div class="d-flex">
                                        <a class="mt-2 mr-2" href="{{ route('states.show', $state->id) }}">
                                        <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('states.destroy', $state->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-link">
                                            <i class="fas fa-trash-alt"></i>
                                            </button>
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
