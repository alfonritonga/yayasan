@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<!-- row -->
<div class="container-fluid">
    <div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
        <h2 class="font-w600 mb-2 me-auto">Dashboard</h2>
        <!-- <div class="weather-btn mb-2">
            <span class="fs-22 font-w600 d-flex"><i class="fa fa-cloud me-3 ms-3"></i>21</span>
            <select class="form-control style-3 default-select">
                <option>Medan, IDN</option>
                <option>Jakarta, IDN</option>
                <option>Surabaya, IDN</option>
            </select>
        </div>
        <a href="javascript:void(0);" class="btn btn-primary mb-2 rounded"><i
                class="las la-calendar scale5 me-3"></i>Filter Periode</a> -->
    </div>
    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12 text-center">
            <div class="card">
                <div class="card-body d-flex mb-sm-4 d-flex flex-wrap align-items-center  text-center">
                    <p style="text-align: center;" class="text-center">Selamat Datang di Administrator <strong>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</strong></p>
                </div>
            </div>
        </div>
        
    </div>
    
</div>
@endsection