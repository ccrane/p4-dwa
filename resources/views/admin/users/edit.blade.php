@extends('layouts.admin.master')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center my-5">
            <div class="col-5">
                <div class="card text-center">
                    <h5 class="card-header">Add Edit</h5>
                    <div class="card-body text-left">
                        <form method='POST' action='/admin/users/{{ $user->id }}'>
                            {{ method_field('put') }}
                            {{ csrf_field() }}

                            <div class='d-flex justify-content-center'>* Required fields</div>

                            <div class="form-group">
                                <label for="name">* Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
                                @include('modules.field-error', ['field' => 'name'])
                            </div>
                            <div class="form-group">
                                <label for="email">* Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}">
                                @include('modules.field-error', ['field' => 'email'])
                            </div>
                            <div class="form-group">
                                <label for="role">* Role</label>
                                <select id='role' name='role' class="form-control">
                                    <option value=''>-- Select One --</option>
                                    <option value='admin' {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value='standard' {{ old('role', $user->role) == 'standard' ? 'selected' : '' }}>Standard</option>
                                </select>
                                @include('modules.field-error', ['field' => 'role'])
                            </div>
                            <div class="row ">
                                <div class="col-8 text-left">
                                    @include('modules.alert')
                                </div>
                                <div class="col-4 text-right">
                                    <a role='button' class='btn btn-secondary' href='/admin/users'>Cancel</a>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
