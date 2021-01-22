@extends('layouts.app')

@section('content')
    <div class="container pt-4">
        <div class="row justify-content-center">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Departments') }}</div>

                    <div class="card-body">
                      <button>
                        <a href="{{ route('departments.create') }}">Create New Department</a>
                      </button>

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="d-flex" action="{{ route('departments.index') }}" method="GET">
                            <input placeholder="Search here..." type="text" value="{{ request('search') }}" class="form-control" name="search">
                            <button class="mx-2 btn btn-primary text-light">
                              <i class="fa fa-search"></i>
                            </button>
                            <button class="btn btn-primary">Create</button>

                        </form>

                        <table class="table mt-3">
                            <thead style="background-color:#F0F0F0;">
                            <tr>
                               <th scope="col">Name</th>
                               <th scope="col"></th>
                               <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($departments as $department)
                                <tr>
                                    <td class="align-middle font-weight-bold">{{ $department->name }}</td>
                                    <td></td>
                                    <td>
                                   <div class="d-flex">
                                     <a class="mt-2 mr-2" href="{{ route('departments.show', $department->id) }}">
                                        <i class="fas fa-edit"></i>
                                     </a>
                                     <form action="{{ route('departments.show', $department->id) }}" method="POST">
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
