@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Users') }}</div>
                    <div class="card-body">
                        <form class="d-flex" action="{{ route('users.index') }}" method="GET">
                            <input placeholder="Search here..." type="text" value="{{ request('search') }}" class="form-control" name="search">
                            <button class="mx-2 btn btn-primary text-light">
                              <i class="fa fa-search"></i>
                            </button>
                            <a class="btn btn-primary" href="{{ route('users.create') }}">Create</a>
                        </form>
                        <table class="table mt-3">
                            <thead>
                            <tr>
                              <th class="pl-4">Username</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Email</th>
                              <th>Role</th>
                              <th class="text-right pr-4">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="align-middle font-weight-bold pl-4">{{ $user->username }}</td>
                                    <td class="align-middle font-weight-bold">{{ $user->first_name }}</td>
                                    <td class="align-middle font-weight-bold">{{ $user->last_name }}</td>
                                    <td class="align-middle font-weight-bold">{{ $user->email }}</td>
                                    <td class="align-middle font-weight-bold">{{ $user->role ? $user->role->name : '-' }}</td>
                                    <td>
                                      <div class="d-flex justify-content-end">
                                        <a class="mt-2 mr-2" href="{{ route('users.show', $user->id) }}">
                                        <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-link"><i class="fas fa-trash-alt text-danger"></i></button>
                                        </form>
                                       </div>
                                    </td>
                                </tr>
                            @endforeach
                            @if($users->isEmpty())
                              <tr>
                                <td colspan="6" class="text-center">No users available.</td>
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
