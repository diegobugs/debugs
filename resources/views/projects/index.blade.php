@extends('layouts.list',['width'=>8])
@section('panel-title')
<h5 class="card-title">
    List of projects
    <a class="btn btn-primary btn-sm float-right" href="{{route('projects.create')}}">
            <i class="fa fa-plus-squared-alt" aria-hidden="true"></i> Create project
        </a>
</h5>
@endsection

@section('table-title')
<tr>
    <th>Id</th>
    <th>Name</th>
    <th colspan="2" class="text-left">Actions</th>
</tr>
@endsection

@section('table-content')
    @forelse($projects as $project)
    <tr>
        <td><a href="{{route('projects.show',$project->id)}}">{{$project->id}}</a></td>
        <td class="text-capitalize">{{$project->name}}</td>
        <td>
            <a class="btn btn-secondary btn-sm btn-block" href="{{route('projects.show',$project->id)}}"><span class="fa fa-eye"></span> Show</a>
        </td>
        <td>
            <a class="btn btn-secondary btn-sm btn-block" href="{{route('projects.edit',$project->id)}}"><span class="fa fa-edit"></span> Edit</a>
        </td>
    </tr>
    @empty
    <tr class="warning no-result">
        <td colspan="4" class="text-center"><i class="fa fa-warning"></i> No projects to show</td>
    </tr>
    @endforelse
@endsection
