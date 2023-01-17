@extends('layouts.admin')
@section('content')

    <h1>Project</h1>
    <div class="text-end">
        <a class="btn btn-success" href="{{route('admin.projects.create')}}">Crea nuovo progetto</a>
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
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Language</th>
            <th scope="col">Category</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)
                <tr>
                    <th scope="row">{{$project->id}}</th>
                    <td>
                        <a href="{{route('admin.projects.show', $project->slug)}}" title="View Post">{{$project->name_project}}</a>
                    </td>
                    <td>{{Str::limit($project->description,100)}}</td>
                    <td class="text-center">
                        {{count($project->languages)}}
                        {{-- @if (count($project->languages))
                            @foreach ($project->languages as $language)
                                <div class="text-center">{{$language->name}}</div>
                            @endforeach
                        @else
                        <small class="text-center">Senza linguaggio</small>
                        @endif --}}
                    </td>
                    <td>{{$project->category ? $project->category->name : 'Senza categoria'}}</td>
                    <td>
                        <a class="link-secondary" href="{{route('admin.projects.edit', $project->slug)}}" title="Edit Project">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button btn btn-danger ms-3" data-item-title="{{$project->name_project}}">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                     </form>
                </tr>
        @endforeach

        </tbody>
    </table>
    @include('partials.admin.modal-delete')
@endsection

