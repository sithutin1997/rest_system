@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 col-lg-12">
            <a class="nav-link float-right" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            <h1 class="float-left">Kitchen Panel</h1>    
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Dishes</h3>
                <a href="/dish/create" class="btn btn-success float-right">Create</a>
              </div>
                <div class="card-body">
                  @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show">
                      {{ session('message')}}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  @endif
                      <table id="dishes" class="display">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Category Name</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($dishes as $dish)
                          <tr>
                            <td>{{$dish->name}}</td>
                            <td>{{$dish->category->name}}</td>
                            <td>{{$dish->created_at}}</td>
                        </tr>
                          @endforeach
                        </tbody>
                    </table>
                  
                </div>
            </div>
            
          <!-- /.col-md-6 -->
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection