@extends('admin.master')
@section('main-content')
<section class="content">
  <div class="container-fluid">
    <div class="row pt-4">
      <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">All Users</span>
                <span class="info-box-number">
                  {{$userno}}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
      </div>

      <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Products</span>
                <span class="info-box-number">{{$productno}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Services</span>
                <span class="info-box-number">{{$serviceno}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
    </div>
  </div>
</section>
@endsection