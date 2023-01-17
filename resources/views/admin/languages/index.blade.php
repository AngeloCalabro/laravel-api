@extends('layouts.admin')

@section('content')
    <h1>Language</h1>
    <div class="text-end">
        <a class="btn btn-success" href="">Crea nuovo linguaggio</a>
    </div>

    @if(session()->has('message'))
    <div class="alert alert-success mb-3 mt-3">
        {{ session()->get('message') }}
    </div>
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Project</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($languages as $language)
                <tr>
                    <th scope="row">{{$language->id}}</th>
                    <td>
                        {{$language->name}}
                    </td>
                    <td>
                        {{count($language->projects) > 0 ? count($language->projects)  : 0}}
                    </td>
                    <td>
                        <form action="{{route('admin.languages.destroy', $language->slug)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button btn btn-danger ms-3" data-item-title="{{$language->name}}"><i class="fa-solid fa-trash-can"></i></button>
                     </form>
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
    @include('partials.admin.modal-delete')
@endsection
