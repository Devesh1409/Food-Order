@extends('admin.master')
@section('tittle','Category | Edit Category')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Category</h1>
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
                <h3 class="card-title">Category</h3>
                 <div class="ml-auto">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#aa">Add Category</button>
                
                </div>
                </nav>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form method="post" action="{{url('category/update')}}" enctype="multipart/form-data" >
                           @csrf
                          <div class="card-body">
                            <div class="form-group">
                              <input type="hidden" name="id" value="{{$data->id}}">
                              <label>Title</label>
                              <input type="text" name="title" placeholder="ENTER TITLE" class="form-control" value="{{$data->title}}" >
                            </div>

                            <div class="form-group">
                              <label>Image</label>
                              <input type="file"  name="image" class="form-control">
                              <img src="/upload/{{$data->image}}" style="width: 100px;height: 100px;" >
                            </div>
                          

                             <div class="form-group">
                              <label>Category Status</label>
                              <br>
                              <input type="radio"  name="status" value="1" @if($data->status=='1') checked @endif>Active
                              <br>
                              <input type="radio"  name="status" value="0" @if($data->status=='0') checked @endif>Inactive
                            </div>
                              
                              <div>
                              <label>Date</label>
                             <input type="date"  name="date" class="form-control" value="{{$data->date}}">
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

