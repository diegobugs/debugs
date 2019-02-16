@extends('layouts.crud')
@section('crud-content')
<div class="pb-2 mt-4 mb-2 border-bottom">
    <h2>Showing project: {{$project->name}} </h2>
</div>
    @include('projects.form',['route'=>'show'])
@endsection
