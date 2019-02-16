@extends('layouts.app')
@section('content-fluid')
<div class="row align-items-center justify-content-center">
    <div class="col-md-{{$width ?? 12}} col-xl-{{$width ?? 12}}">
        @yield('filtro')
        <div class="card">
            <div class="card-header bg-primary text-white">@yield('panel-title')</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            @yield('table-title')
                        </thead>
                        <tbody>
                            @yield('table-content')
                        </tbody>
                    </table>
                    @yield('pagination')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
