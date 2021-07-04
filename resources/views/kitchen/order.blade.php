
@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            <h1 class="m-0">Kitchen Pannel</h1>
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
                <h3 class="card-title">Orders</h3>
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
                                <th>Dishes</th>
                                <th>Table</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($orders as $order)
                          <tr>
                            <td>{{$order->dish->name}}</td>
                            <td>{{$order->order->table->table_number}}</td>
                            <td>{{$status[$order->status]}}</td>
                            <td>
                              <div class="form-row">
                                <a style="margin-right: 10px;"href="/order/{{$order->id}}/approve" class="btn btn-secondary h-40">Approve</a>
                                <a style="margin-right: 10px;"href="/order/{{$order->id}}/cancel" class="btn btn-danger h-40">Cancel</a>
                                <a style="margin-right: 10px;"href="/order/{{$order->id}}/done" class="btn btn-success h-40">Done</a>
                              </div>
                            </td>
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
