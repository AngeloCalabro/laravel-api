@extends('layouts.admin')

@section('content')
    <h1>Users</h1>
    {{-- <div class="text-end">
        <a class="btn btn-success" href="">Crea nuovo utente</a>
    </div> --}}

    {{-- @if(session()->has('message'))
    <div class="alert alert-success mb-3 mt-3">
        {{ session()->get('message') }}
    </div>
    @endif --}}
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Ruolo</th>
            <th scope="col">Project</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>
                        {{$user->name}}
                    </td>
                    <td>
                        @if($user->is_admin)
                            <span>Admin</span>
                        @else
                            <span>Utente</span>
                        @endif
                    </td>
                    <td>
                        {{count($user->projects) > 0 ? count($user->projects)  : 0}}
                    </td>
                    <td>
                        <a class="link-secondary" href="{{route('admin.users.edit', $user->id)}}" title="Edit User">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{route('admin.users.destroy', $user->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button btn btn-danger ms-3" data-item-title="{{$user->name}}"><i class="fa-solid fa-trash-can"></i></button>
                     </form>
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
    @include('partials.admin.modal-delete')
@endsection
