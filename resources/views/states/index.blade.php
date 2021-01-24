@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('States') }}</div>
                    <div class="card-body">
                      <form class="d-flex" action="{{ route('states.index') }}" method="GET">
                        <input placeholder="Search here..." type="text" value="{{ request('search') }}"
                               class="form-control" name="search">
                        <button class="mx-2 btn btn-primary text-light"><i class="fa fa-search"></i></button>
                        <a class="btn btn-primary" href="{{ route('states.create') }}">Create</a>
                      </form>
                      <table class="table mt-3">
                        <thead>
                        <tr>
                          <th class="pl-4">Country</th>
                          <th>Name</th>
                          <th class="text-right pr-4">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($states as $state)
                          <tr>
                            <td class="align-middle font-weight-bold pl-4">{{ $state->country->name ?? '-' }}</td>
                            <td class="align-middle font-weight-bold">{{ $state->name }}</td>
                            <td>
                              <div class="d-flex justify-content-end">
                                <a class="mt-2 mr-2" href="{{ route('states.show', $state->id) }}">
                                  <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('states.destroy', $state->id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-link">
                                    <i class="fas fa-trash-alt text-danger"></i>
                                  </button>
                                </form>
                              </div>
                            </td>
                          </tr>
                        @endforeach
                        @if($states->isEmpty())
                          <tr>
                            <td colspan="3" class="text-center">No states available.</td>
                          </tr>
                        @endif
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
