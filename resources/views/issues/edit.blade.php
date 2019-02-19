@extends('layouts.crud')
@section('crud-content')
    <div class="pb-2 mt-4 mb-2 border-bottom">
        <h2>Edit issue</h2>
    </div>
    @include('issues.form',['route'=>['issues.update', $issue->id], 'method'=>'patch'])
@endsection
