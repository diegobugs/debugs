@extends('layouts.crud')
@section('crud-content')
    <div class="pb-2 mt-4 mb-2 border-bottom">
        <h2>Create a new issue </h2>
    </div>
    @include('issues.form',['route'=>'issues.store','method'=>'post'])
@endsection
