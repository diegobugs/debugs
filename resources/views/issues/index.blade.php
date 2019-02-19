@extends('layouts.list',['width'=>8])
@section('panel-title')
<h5 class="card-title">
    List of issues
    <a class="btn btn-primary btn-sm float-right" href="{{route('issues.create')}}">
            <i class="fa fa-plus-squared-alt" aria-hidden="true"></i> Create issue
        </a>
</h5>
@endsection

@section('table-title')
<tr>
    <th>Id</th>
    {{--  TODO: Agregar titulo de columnas a ser mostradas  --}}
    {{--  <th>Name</th>  --}}
    <th colspan="2" class="text-left">Actions</th>
</tr>
@endsection

@section('table-content')
    @forelse($issues as $issue)
    <tr>
        <td><a href="{{route('issues.show',$issue->id)}}">{{$issue->id}}</a></td>
        {{--  TODO: Agregar columnas a ser mostradas  --}}
        {{--  <td class="text-capitalize">{{$issue->name}}</td>  --}}
        <td>
            <a class="btn btn-secondary btn-sm btn-block" href="{{route('issues.show',$issue->id)}}"><span class="fa fa-eye"></span> Show</a>
        </td>
        <td>
            <a class="btn btn-secondary btn-sm btn-block" href="{{route('issues.edit',$issue->id)}}"><span class="fa fa-edit"></span> Edit</a>
        </td>
    </tr>
    @empty
    <tr class="warning no-result">
        <td colspan="4" class="text-center"><i class="fa fa-warning"></i> No issues to show</td>
    </tr>
    @endforelse
    {{--  TODO: Agregar paginacion  --}}
@endsection
