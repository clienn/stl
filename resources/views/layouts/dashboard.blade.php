@extends('layouts.base')

@section('db-content')
<div class="db-content-info d-flex justify-content-md-center align-items-center h-100 mt-2">
    <div class="container-fluid font-regular form-wrap">
        <form id="config-form" method="post" action="/config/save">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12 flex-column d-flex align-items-center mt-2">
                    <span class="font-50">Welcome To STL Dashboard!</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 flex-column d-flex align-items-center mt-1 text-center">
                    <span class="font-16">General STL configurations for bet limits.<br /> Other miscellaneous settings.</span>
                </div>
            </div>
            <div class="row mt-2 d-flex justify-content-center mt-5">
                <div class="form-group col-md-3">
                    <label class="font-bold font-10 ml-2">L2 Bet Limit:</label>
                    <input type="text" name="l2_bet_limit" class="form-control form-rounded bg-gray-1" placeholder="Enter L2 Bet Limit" value="{{ count($config) ? $config[0]->l2_bet_limit : '' }}" />
                </div>
                <div class="form-group col-md-3">
                    <label class="font-bold font-10 ml-2">S3 Bet Limit:</label>
                    <input type="text" name="s3_bet_limit" class="form-control form-rounded bg-gray-1" placeholder="Enter S3 Bet Limit" value="{{ count($config) ? $config[0]->s3_bet_limit : '' }}" />
                </div>
                <div class="form-group col-md-3">
                    <label class="font-bold font-10 ml-2">P3 Bet Limit:</label>
                    <input type="text" name="p3_bet_limit" class="form-control form-rounded bg-gray-1" placeholder="Enter P3 Bet Limit" value="{{ count($config) ? $config[0]->p3_bet_limit : '' }}" />
                </div>
            </div>

            <div class="row mt-2 d-flex justify-content-center mt-1">
                <div class="form-group col-md-3">
                    <label class="font-bold font-10 ml-2">D Time:</label>
                    <input type="text" name="d" class="form-control form-rounded bg-gray-1" placeholder="Enter D Time" value="{{ count($config) ? $config[0]->d : '' }}" />
                </div>
                <div class="form-group col-md-3">
                    <label class="font-bold font-10 ml-2">M Time:</label>
                    <input type="text" name="m" class="form-control form-rounded bg-gray-1" placeholder="Enter M Time" value="{{ count($config) ? $config[0]->m : '' }}" />
                </div>
                <div class="form-group col-md-3">
                    <label class="font-bold font-10 ml-2">MD Time:</label>
                    <input type="text" name="md" class="form-control form-rounded bg-gray-1" placeholder="Enter MD Time" value="{{ count($config) ? $config[0]->md : '' }}" />
                </div>
            </div>
            
            @include('partials.saveinfo')
        </form>
    </div>
    
</div>
@stop