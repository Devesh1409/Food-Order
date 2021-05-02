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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>DELIVERY BOY NAME</th>
                    <th>PHONE NO</th>
                    <th>PASSWORD</th>
                    <th>STATUS</th>
                    <th>DATE OF JOINING</th>
                    <th>ACTION</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                    @foreach($data as $a)
                    <td>{{$a->id}}</td>
                    <td>{{$a->delivery_boy_name}}</td>
                    <td>{{$a->phone_no}}</td>
                    <td>{{$a->password}}</td>
                    <td>{{$a->status}}</td>
                    <td>{{$a->date_of_joining}}</td>
                  
                    
                
                   
                    

                     <td>
                      <a href="{{url('admin/delivery/edit/'.$a->id)}}">Edit</a>
                      <a href="{{url('delivery/delete/'.$a->id)}}">Delete</a>
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
                    <h5 class="modal-title">ADD BANNER</h5>

                    <button type="button" class="" data-dismiss="modal">
                    <span>&times;</span></button>
        
                </div>
                    <div class="modal-body">
                        <form method="post" action="{{url('delivery/insert')}}" enctype="multipart/form-data" >
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
                              <label>Delivery Boy Name</label>
                              <input type="text" name="delivery_boy_name" required="required" placeholder="ENTER NAME" class="form-control" >
                            </div>

                            <div class="form-group">
                              <label>Phone No</label>
                              <input type="number"  name="phone_no" required="required"  class="form-control">
                            </div>
                            

                              <div class="form-group">
                              <label>Password</label>
                              <input type="password"  name="password" required="required"  class="form-control">
                              </div>
                          

                             <div class="form-group">
                              <label>Status</label>
                              <br>
                              <input type="radio"  name="status" required="required" value="1">Active
                              <br>
                              <input type="radio"  name="status" required="required" value="0">Inactive
                            </div>
                              
                              <div>
                              <label>Date Of Joining</label>
                              <input type="date"  name="date_of_joining" required="required"  class="form-control">
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