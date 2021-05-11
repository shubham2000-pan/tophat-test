@extends('layout.admin.app')

@section('internal_css')    
  <style type="text/css">
  .error{
    color:red;
  }
</style>

@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="user_form" action="{{url('user_upadate')}}" method="post">
               @csrf
                <input type="hidden" name="id" value="{{ $result->id}}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" value="{{ $result->name}}">
                  </div>
              
                  <div class="form-group">
                    <label for="exampleInputEmail1">Contact</label>
                    <input type="text" name="contact" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{ $result->contact}}">
                  </div>
                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{ $result->email}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">address</label>
                    <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{ $result->address}}">
                  </div>
                
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" id="add_user" class="btn btn-primary">update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
         
        </div>
      </div>
    </div>
  </div>
</section>
</div>
@endsection

@section('footer_script')

@endsection
