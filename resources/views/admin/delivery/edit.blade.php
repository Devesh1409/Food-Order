@extends('admin.master')
@section('tittle','Banner | Add Banner')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Banner</h1>
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
                <h3 class="card-title">Banner</h3>
                 <div class="ml-auto">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#aa">Add Banner</button>
                
                </div>
                </nav>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form method="post" action="{{url('delivery/update')}}" enctype="multipart/form-data" >
                           @csrf
                          <div class="card-body">
                            <div class="form-group">
                              <input type="hidden" name="id" value="{{$data->id}}">
                              <label>Delivery Boy Name</label>
                              <input type="text" name="delivery_boy_name"  class="form-control" value="{{$data->delivery_boy_name}}" >
                            </div>

                            <div class="form-group">
                              <label>Phone No</label>
                              <input type="number"  name="phone_no" class="form-control" value="{{$data->phone_no}}" >
                            </div>
                            
                            <div class="form-group">
                              <label>Password</label>
                              <input type="password"  name="password" class="form-control" value="{{$data->password}}" >
                            </div>
                          

                             <div class="form-group">
                              <label> Status</label>
                              <br>
                              <input type="radio"  name="status" value="{{$data->status}}" @if($data->status=='1') checked @endif>Active
                              <br>
                              <input type="radio"  name="status" value="{{$data->status}}" @if($data->status=='0') checked @endif>Inactive
                            </div>
                              
                              <div>
                              <label>Date Of Joining </label>
                              <input type="date"  name="date_of_joining" class="form-control" value="{{$data->date_of_joining}}">
                              </div>
                              <br><br>

                            <input type="submit" name="submit" value="submit" class="btn btn-info">
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              @endsection

