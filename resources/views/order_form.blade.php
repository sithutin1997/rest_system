<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

</head>
<body>
    <div class="row">
        <div class="col-12">
         <a href="{{route('login')}}" class="btn btn-success">Login</a>
        </div>
      </div>
      <!-- ./row -->
      <div class="row">
          
        <div class="col-12 col-sm-6 col-lg-12">
          <div class="card card-primary card-tabs">
            <div class="card-header p-0 pt-1">
              <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Orders</a>
                </li>
              </ul>
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
              <div class="tab-content" id="custom-tabs-one-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                  <form action="{{route('order.submit')}}" method="post">
                    @csrf  
                    <div class="row">                  
                    @foreach ($dishes as $key=>$dish) 
                      <div class="col-sm-3">
                        <div class="card">
                          <div class="card-body">
                            <img src="{{url('/images/'.$dish->image)}}" width="100" height="100"><br>
                            <label for="dish">Dishes : </label>
                            <label for="">{{$dish->name}}</label><br>
                            <label for="quantity">Quantity : </label>
                            <input type="number" name="item[{{$key}}][qty]" value="0"><br><br>
                            <input type="hidden" name="item[{{$key}}][dish_id]" value={{$dish->id}}>
                          </div>
                        </div>
                      </div>
                    @endforeach
                    </div>
                    <div>
                      <div class="form-group">
                        <label for="table">Table No: </label>
                        <select name="table" id="">
                          @foreach ($tables as $table)
                              <option class="form-control"value="{{$table->id}}">{{$table->table_number}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <input type="submit" class="btn btn-success" value="submit">
                  </form>

                </div>
                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                  
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
                            <a style="margin-right: 10px;"href="/order/{{$order->id}}/serve" class="btn btn-secondary h-40">Serve</a>
                          </div>
                        </td>
                    </tr>
                      @endforeach
                    </tbody>
                </table>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
</body>
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script>
  $(document).ready( function () {
   $('#dishes').DataTable();
} );
</script>
</html>