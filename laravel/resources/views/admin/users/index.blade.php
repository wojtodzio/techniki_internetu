@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin Panel: Users') }}</div>

                @foreach($users AS $user)
                    <form action="{{ route('users.destroy', $user) }}" method="POST" id="destroy-form-{{ $user->id }}" class="d-none">
                        @csrf
                        @method('DELETE')
                    </form>
                @endforeach

                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</td>
                                <th scope="col">Name</td>
                                <th scope="col">Surname</td>
                                <th scope="col">Admin</td>
                                <th scope="col"></td>
                                <th scope="col"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users AS $index => $user)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->surname }}</td>
                                    <td>{{ $user->admin }}</td>
                                    <td colspan="2">
                                        <a class="btn btn-primary float-right" href="{{ route('users.edit', $user) }}">Edit user</a>
                                        <button type="submit" class="btn btn-primary float-right" form="destroy-form-{{ $user->id }}">Remove</button>
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
