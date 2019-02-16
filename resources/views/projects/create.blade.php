@extends('layouts.crud')
@section('crud-content')
    <div class="pb-2 mt-4 mb-2 border-bottom">
        <h2>Create a new project </h2>
    </div>
    @include('projects.form',['route'=>'projects.store','method'=>'post'])
@endsection
