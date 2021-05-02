@extends('admin.master')
@section('tittle','Coupon | Edit Coupon')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Coupon</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
     <div class="card">
              <div class="card-header">
                <nav class="navbar navbar-expand-md">
                <h3 class="card-title">Coupon</h3>
                 <div class="ml-auto">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#aa">Add Coupon</button>
                
                </div>
                </nav>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form method="post" action="{{url('coupon/update')}}" enctype="multipart/form-data" >
                           @csrf
                         <div class="card-body">
                            <div class="form-group">
                              <input type="hidden" name="id" value="{{$data->id}}">
                              <label>Coupon Code</label>
                              <input type="text" name="coupon_code" required="required" placeholder="ENTER COUPON CODE" class="form-control" value="{{$data->coupon_code}}">
                            </div>
                             <div class="form-group">
                                  <label>Coupon Type:</label>
                                   <select class="form-control" name="coupon_type" class="form-control">
                                    <option>Select</option>
                                    <option value="Fixed" @if($data->coupon_type=='Fixed')selected @endif>Fixed</option>
                                     <option value="Percentage" @if($data->coupon_type=='Percentage')selected @endif>Percentage</option>
                                </select>
                            </div>
                            <div class="form-group">
                              <label>Coupon Value</label>
                              <input type="text" name="coupon_value" required="required" placeholder="ENTER COUPON VALUE" class="form-control" value="{{$data->coupon_value}}">
                            </div>
                             <div class="form-group">
                              <label>Cart Min Value</label>
                              <input type="number" name="cart_min_value" required="required" placeholder="ENTER CART MIN VALUE" class="form-control" value="{{$data->cart_min_value}}">
                            </div>
                            <div class="form-group">
                              <label>Expired On</label>
                              <input type="date" name="expired_on" required="required"  class="form-control" value="{{$data->expired_on}}">
                            </div>
                             <div class="form-group">
                              <label> Coupon Status</label><br>
                             <input type="radio"  name="coupon_status" value="{{$data->coupon_status}}" @if($data->coupon_status=='1') checked @endif>Active
                              <br>
                              <input type="radio"  name="coupon_status" value="{{$data->coupon_status}}" @if($data->coupon_status=='0') checked @endif>Inactive
                            </div>
                            <div class="form-group">
                              <label>DateTime</label>
                              <input type="date" name="date_time" required="required"  class="form-control" value="{{$data->date_time}}">
                            </div>
                            
                            <input type="submit" name="submit" value="submit" class="btn btn-info">
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              @endsection