@extends('layouts.base')

@section('search-bar')
    @include('partials.search-bar')
@stop

@section('db-content')
    <div id="user-list" class="container-fluid font-regular form-wrap">
        @include('ajax-forms.user-main-list')
    </div>

    <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            initAjaxListSearch('db-search', 'user-list', 'pagination-list', "{{ URL::to('/') }}", '/user/list/search');
        });
    </script>
@stop