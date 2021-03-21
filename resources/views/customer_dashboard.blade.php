<!DOCTYPE html>
<html lang="en">
<head>
  <title>Customer-Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<button style="float:left;"><a href="{{route('admin-logout')}}"><i class="fa fa-power-off mr-1 ml-1"></i> Logout</a></button>
<div class="container">
  <h2>Product Details</h2>
 @foreach($product as $data)
  <div class="card" style="width:300px">
    <center><img class="card-img-top" src="{{asset('public/uploads/'.$data->p_image)}}" alt="Card image" style="width:50%"></center>
    <div class="card-body">
      <h4 class="card-title">{{ $data->p_name }}</h4>
      price: <p class="card-text">{{ $data->p_price  }}</p>
      Discount: <p class="card-text">{{ $data->p_discount }}</p>
      Description: <p class="card-text">{{ $data->p_description }}</p>
      Date: <p class="card-text">{{ date('d-m-Y',strtotime($data->created_at)) }}</p>
    
    </div>
  </div>
  <br>
@endforeach

{{ $product->links() }}
</body>
</html>
