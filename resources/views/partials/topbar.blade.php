<div class="container-fluid font-regular">
    
    <div class="row">
        <div class="col-md-2 d-flex flex-column align-items-center pt-2">
            <span class="font-20 font-bold">STL</span>
        </div>
        <div class="col-md-10 align-items-center">
                <div class="row justify-content-between h-100 align-items-center">
                    <div class="col-md-4">
                        <span class="font-10 mr-1">{{ date('l, F j, Y | h:i A') }}</span>
                        @include('svg.cloud')
                    </div>
                    <div class="col-md-4 mr-1">
                        <div class="row h-100 align-items-center d-flex justify-content-end">
                            <div class="col-md-1"><div class="name-avatar bg-lime-1 font-bold font-10">{{ Auth::user()->firstname ? Auth::user()->firstname[0] : '' }}{{ Auth::user()->lastname ? Auth::user()->lastname[0] : '' }}</div></div>
                            <div class="col-md-4"><span class="font-bold font-14">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span></div>
                        </div>
                    </div>
            
                </div>
        </div>
    </div>
</div>
