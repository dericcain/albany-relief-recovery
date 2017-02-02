@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#add-user">Add User</button>
                <h1>Users</h1>
                <h5><span class="label label-success">Admin can do anything</span></h5>
                <h5><span class="label label-info">Worker can see backend and change the status of needs, etc.</span>
                </h5>
                <h5>
                    <span class="label label-default">User is very limited and cannot perform any administrative tasks.</span>
                </h5>
                <hr>
            </div>
            <div class="col-sm-12">
                <div class="section-wrapper">
                    <div class="responsive-table-wrapper">
                        <table class="table table-striped table-hover table-condensed" id="users-table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th class="text-center">Group</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control change-group"
                                                    data-id="{{ $user->id }}"
                                                    data-route="{{ route('users.update', ['id' => $user->id]) }}">
                                                @foreach($groups as $group)
                                                    @if($user->group_id == $group->id)
                                                        <option value="{{ $group->id }}"
                                                                selected>{{ $group->name }}</option>
                                                    @else
                                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <button class="delete-user btn btn-danger btn-small"
                                                data-route="{{ route('users.destroy', ['id' => $user->id]) }}"
                                                data-id="{{ $user->id }}">Delete
                                        </button>
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
    @include('partials.users._new_user_modal')
@endsection

@push('css')
@endpush

@push('js')
<script src="{{ asset('js/users.bundle.js') }}"></script>
@endpush