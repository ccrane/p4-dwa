@extends('layouts.admin.master')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center my-5">
            <div class="col-8">
                <div class="card text-center">
                    <h5 class="card-header">Users</h5>
                    <div class="card-body">
                        @include('modules.alert')
                        <form id='frm-user-search' method='GET' action='/admin/users'>
                            {{ csrf_field() }}
                            <div class='d-flex justify-content-between align-items-center my-2'>
                                @include('modules.page-size', ['perPageSize' => $perPageSize])
                                <div class='form-row'>
                                    <label for="searchText" class="col-sm-2 col-form-label">Find:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="searchText" name="searchText" value='{{ $searchText }}'>
                                    </div>
                                    <div class="col-sm-1">
                                        <button type="submit" class="btn btn-link"><i class="fas fa-search fa-lg"></i></button>
                                    </div>
                                </div>
                                <div class='text-right'>
                                    <a href='/admin/users/create' title='Add User'><i class="fas fa-plus fa-2x"></i></a>
                                </div>
                            </div>
                        </form>
                        <table class="table table-striped">
                            <caption class='text-right'>{{$users->total()}} users found.</caption>
                            <thead>
                            <tr>
                                <th scope="col" style='width: 20%;'>ID</th>
                                <th scope="col" style='width: 20%;'>Name</th>
                                <th scope="col" style='width: 20%;'>Email</th>
                                <th scope="col" style='width: 20%;'>Role</th>
                                <th scope="col" style='width: 20%;'></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td scope="row"><strong>{{ $user->id }}</strong></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td class='d-flex justify-content-center'>
                                        <a href='/admin/users/{{ $user->id }}' title='View User'><i class="far fa-file-alt fa-lg"></i></a>&nbsp;&nbsp;
                                        <a href='/admin/users/{{ $user->id }}/edit' title='Edit User'><i class="far fa-edit fa-lg"></i></a>&nbsp;&nbsp;
                                        <a href='/admin/users/{{ $user->id }}/delete' title='Delete User'><i class="far fa-trash-alt fa-lg"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @if($users->total() > $users->perPage())
                            <div class="d-flex align-items-center justify-content-center">
                                {{ $users->appends(['perPageSize' => $perPageSize, 'searchText' => $searchText])->links() }}
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
