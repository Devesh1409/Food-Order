@extends('admin.master')
@section('tittle','Coupon | Add Coupon')
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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>COUPON CODE</th>
                    <th>COUPON TYPE</th>
                    <th>COUPON VALUE</th>
                    <th>CART MINIMUM VALUE</th>
                    <th>EXPIRED ON</th>
                    <th>COUPON STATUS</th>
                    <th>DATE </th>
                    <th>ACTION</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                    @foreach($data as $a)
                    <td>{{$a->id}}</td>
                    <td>{{$a->coupon_code}}</td>
                    <td>{{$a->coupon_type}}</td>
                    <td>{{$a->coupon_value}}</td>
                    <td>{{$a->cart_min_value}}</td>
                    <td>{{$a->expired_on}}</td>
                    <td>{{$a->coupon_status}}</td>
                    <td>{{$a->date_time}}</td>


                   
                      
                     <td>
                      
                      <a href="{{url('admin/coupon/edit/'.$a->id)}}">Edit</a>
                      <a href="{{url('admin/delete/'.$a->id)}}">Delete</a>
                    </td>

                    
                  </tr>
                               
                  </tbody>
                  @endforeach 
                </table>
              </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="modal fade" id="aa">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Coupon</h5>

                    <button type="button" class="" data-dismiss="modal">
                    <span>&times;</span></button>
        
                </div>
                    <div class="modal-body">
                        <form method="post" action="{{url('coupon/insert')}}" enctype="multipart/form-data" >
                        @csrf
                        <div class="card">
                          @if ($errors->any())
                          <div class="alert alert-danger">
                            <ul>
                              @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                              @endforeach
                            </ul>
                          </div>
                          @endif
                          <div class="card-body">
                            <div class="form-group">
                              <label>Coupon Code</label>
                              <input type="text" name="coupon_code" required="required" placeholder="ENTER COUPON CODE" class="form-control" >
                            </div>
                             <div class="form-group">
                                  <label>Coupon Type:</label>
                                   <select class="form-control" name="coupon_type" class="form-control">
                                    <option>Select</option>
                                    <option>Fixed</option>
                                    <option>Percentage</option>
                                </select>
                            </div>
                            <div class="form-group">
                              <label>Coupon Value</label>
                              <input type="text" name="coupon_value" required="required" placeholder="ENTER COUPON VALUE" class="form-control" >
                            </div>
                             <div class="form-group">
                              <label>Cart Min Value</label>
                              <input type="number" name="cart_min_value" required="required" placeholder="ENTER CART MIN VALUE" class="form-control" >
                            </div>
                            <div class="form-group">
                              <label>Expired On</label>
                              <input type="date" name="expired_on" required="required"  class="form-control" >
                            </div>
                             <div class="form-group">
                              <label> Coupon Status</label><br>
                              <input type="radio" name="coupon_status"  value="1" required="required" >Active
                              <input type="radio" name="coupon_status" value="0" required="required" >Inactive
                            </div>
                            <div class="form-group">
                              <label>DateTime</label>
                              <input type="date" name="date_time" required="required"  class="form-control" >
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