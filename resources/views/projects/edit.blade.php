@extends('layouts.crud')
@section('crud-content')
    <div class="pb-2 mt-4 mb-2 border-bottom">
        <h2>Edit project</h2>
    </div>
    @include('projects.form',['route'=>['projects.update', $project->id], 'method'=>'patch'])
@endsection
