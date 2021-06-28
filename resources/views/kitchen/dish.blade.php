@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            <h1 class="">Dishes</h1>    
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-8">
            <div class="card">
              <div class="card-body">
                <table id="dishes" class="display">
                  <thead>
                      <tr>
                          <th>Column 1</th>
                          <th>Column 2</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>Sithu</td>
                          <td>Row 1 Data 2</td>
                      </tr>
                      <tr>
                          <td>Row 2 Data 1</td>
                          <td>Row 2 Data 2</td>
                      </tr>
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