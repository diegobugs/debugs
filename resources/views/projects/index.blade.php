@extends('layouts.app')

@section('content')
    <h1>List of projects</h1>
    @forelse ($projects as $project)
        <a href="{{route('projects.show', $project->id)}}">{{$project->name}}</a>
    @empty
        <h2>No projects to show</h2>
    @endforelse
@endsection
