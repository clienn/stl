@extends('layouts.master')

@section('content')
<div id="wrapper">
    @include('svg.wave-bg')

    <div class="header-absolute-hcenter top20">
        <p class="font-regular font-10 font-white">Sunday, August 2, 2020 | 1:20 PM</p>
    </div>

    <div class="d-flex justify-content-md-center align-items-center vh-100">
        <div id="login-wrap">
            <div class="wrap">
                <div class="d-flex flex-column justify-content-center font-regular font-black-1">
                    <div class="font-50 text-center">Welcome</div>
                    <div class="font-16 text-center">Please sign in or sign up to use the app.</div>
                    <form method="POST" action="/auth" class="mt-5 font-regular">
                        {{ csrf_field() }}
                        <div class="form-row justify-content-md-center">
                            <div class="form-group col-md-10">
                                <input type="text" name="username" class="form-control form-rounded bg-gray-1" id="in-username" placeholder="Username">    
                            </div>
                            <div class="form-group col-md-10">
                                <input type="password" name="password" class="form-control form-rounded bg-gray-1" id="in-passowrd" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-row justify-content-md-center mt-4">
                            <div class="form-group">
                                <button type="submit" class="btn form-btn-1 form-rounded bg-lime-1">Sign In</button>
                            </div>
                        </div>
                    </form>
                    <div class="mt-5"></div>
                    <div class="font-14 font-gray-1 text-center mt-5">Generating random paragraphs can be an excellent way for writers to get their creative flow going at the beginning of the day.d</div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="bottom-left font-lime font-bold font-10">SCDL Web Application v.10</div>
</div>
@stop