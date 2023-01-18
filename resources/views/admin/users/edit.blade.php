@extends('layouts.admin')
@section('content')
 {{-- <div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div> --}}
        <h1>Edit User: {{$user->name}}</h1>
        <div class="row bg-white">
            <div class="col-12">
                <form action="{{route('admin.users.update', $user->id)}}" method="POST" enctype="multipart/form-data" class="p-4">
                    @csrf
                    @method('PUT')
                      <div class="mb-3">
                         <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name', $user->name)}}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="users" class="form-label">Seleziona ruolo:</label><br>

                            <input type="checkbox" class="form-check-input" name="is_admin" id="{{$user->is_admin}}" value="{{NULL}}" {{old('is_admin', $user->is_admin)? 'checked' : NULL}}>

                            <span class="text-capitalize">
                                Admin
                            </span>
                    </div>

                      <button type="submit" class="btn btn-success">Invia</button>
                      <button type="reset" class="btn btn-primary">Reset</button>
                </form>
            </div>
        </div>
@endsection
