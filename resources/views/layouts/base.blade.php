@extends('layouts.master')

@section('content')
    @include('partials.topbar')
    <div class="container-fluid col-h100">
        <div class="row h-100">
            <div class="col-md-2 h-100">
                <div class="container font-regular menu-wrap">
                    <div class="row mt-2">
                        <div class="col-md-12 flex-column d-flex align-items-center mt-5">
                            <div class="db-icon-wrap bg-gray-1 menu" data="0">
                                @include('svg.db-dashboard')
                            </div>
                            <span class="mt-3 font-10 font-lime">Dashboard</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 flex-column d-flex align-items-center mt-3">
                            <div class="db-icon-wrap bg-gray-1 menu" data="1">
                                @include('svg.db-patient')
                            </div>
                            <span class="mt-3 font-10 font-lime">Users</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 flex-column d-flex align-items-center mt-3">
                            <div class="db-icon-wrap bg-gray-1 menu" data="2">
                                @include('svg.db-results')
                            </div>
                            <span class="mt-3 font-10 font-lime">Draws</span>
                        </div>
                    </div>
                    
                    <div class="row mt-5">
                        <div class="col-md-12 flex-column d-flex align-items-center mt-5">
                            <span class="mt-3 font-10 font-gray-2">STL Dashboard v.10</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10 dashboard-content-wrap">
                @yield('search-bar')
                <div class="d-flex flex-column justify-content-center align-items-center font-regular font-black-1 mt-3 db-column-right">
                    @yield('top-panel')
                    <div class="dashboard-content panel-shadow">
                        @yield('db-content')
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop