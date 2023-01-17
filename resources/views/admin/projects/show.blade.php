@extends('layouts.admin')
@section('content')
    <h1>{{$project->name_project}}</h1>
    <p>{{$project->description}}</p>
    @if ($project->category)
    <small>Category: {{$project->category->name}}</small>
    @endif

    <p>{!! $project->content !!}</p>
    <img width="300" src="{{ asset('storage/' . $project->cover_image) }}">
@endsection
