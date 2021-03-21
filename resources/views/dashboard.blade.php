<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.js"></script>
    <title>CDP User-Dashboard</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 6px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 8px 2px 1px 19px;;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 20%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>

<body>
<div class="container">
  <h2>Product List</h2>
  <p>Auth User can perform all action</p>

  @if(Session::has('flash_message_update'))
                      
                      <div class="col-lg-6 col-lg-12">
                       <div class="alert alert-success alert-rounded">   {!! Session('flash_message_update')!!}
                                   <button type="button" class="close ml-auto" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                               </div>
                      </div>
         
                    @endif

  @if(Session::has('flash_message_success'))
                      
                      <div class="col-lg-6 col-lg-12">
                       <div class="alert alert-success alert-rounded">   {!! Session('flash_message_success')!!}
                                   <button type="button" class="close ml-auto" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                               </div>
                      </div>
         
                    @endif
                    
  <button style="margin: 10px;
    float: right;" type="button" class="btn btn-primary add-product">Add Product</button>
              
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Discount</th>
        <th>Description</th>
        <th>Product Status</th>
        <th>Update</th>
        <th>Delete</th>
      
      </tr>
    </thead>
    <tbody>
    @foreach($product_details as $data)
      <tr>
          <td>{{ $data->id }}</td>
          <td>
             @if(!empty($data->p_image))
            <img src="{{asset('public/uploads/'.$data->p_image)}}" alt="" style="width:70px;">
             @endif
          
          </td>
          <td>{{ $data->p_name}}</td>
          <td>{{ $data->p_price}}</td>
          <td>{{ $data->p_discount}}</td>
          <td>{{ $data->p_description}}</td>
          <td>


          <input type="checkbox" class="ProductStatus btn btn-success" rel="{{$data->id}}"
           data-toggle="toggle" data-on="Enabled" data-of="Disabled" data-onstyle="success" data-offstyle="danger"
            @if($data['status']=="0") checked @endif>
               <!-- @switch($data->status)

                   @case(1)
                   <p style="color:red;">Disabled</p>
                   @break
                   @default
                   <p style="color:green;">Enabled</p>

               @endswitch -->
          </td>
          <td><button  type="button" class="btn btn-warning product_update" rel="{{$data->id}}">Update</button></td>
          <td><button  type="button" class="btn btn-danger product_delete" rel="{{$data->id}}">Delete</button></td>
          <!-- <td><button  type="button" class="btn btn-info">Disable</button></td> -->
      </tr>
     @endforeach
    </tbody>
  </table>
  <button style="float:right;"><a href="{{route('admin-logout')}}"><i class="fa fa-power-off mr-1 ml-1"></i> Logout</a></button>
  
</div>


<!-- product store form code goes here -->
<div class="container">
<form  action="{{route('store-product')}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
<div class="modal fade" id="exampleModal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                <div class="row">
      <div class="col-25">
        <label for="pname">Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="pname" name="pname" placeholder="Product name.." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="price">Price</label>
      </div>
      <div class="col-75">
        <input type="text" id="price" name="price" placeholder="Price.." required>
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="discount_per">Discount</label>
      </div>
      <div class="col-75">
        <input type="text" id="discount_per" name="discount_per" placeholder="Discount" required>
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="desc">Description</label>
      </div>
      <div class="col-75">
        <textarea id="desc" name="desc" placeholder="description.." style="height:200px" required></textarea>
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="f_name">Image Upload</label>
      </div>
      <div class="col-75">
        <input type="file" name='f_name' id="f_name" required>
      </div>
    </div>
                
          
                
                    
                </div>
                <div class="modal-footer">
                    
                    <input type="submit" class="btn btn-primary btn-sm" value="Send">
                </div>
                </div>
            </div>
</div>
</form>
</div>
<!-- product update form code goes here -->
<div class="container">
<form  action="{{route('update-product-details')}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
<div class="modal fade" id="exampleModal_update"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                <div class="row">
                <input type="hidden" id="p_id" name="p_id">
      <div class="col-25">
        <label for="pname">Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="p_name" name="pname">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="price">Price</label>
      </div>
      <div class="col-75">
        <input type="text" id="p_price" name="price">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="discount_per">Discount</label>
      </div>
      <div class="col-75">
        <input type="text" id="p_discount_per" name="discount_per">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="desc">Description</label>
      </div>
      <div class="col-75">
        <textarea id="p_desc" name="desc"  style="height:100px"></textarea>
      </div>
    </div>

   
                
          
                
                    
                </div>
                <div class="modal-footer">
                    
                    <input type="submit" class="btn btn-primary btn-sm" value="Send">
                </div>
                </div>
            </div>
</div>
</form>
</div>
    
</body>
</html>

<script>

$('.add-product').click(function(){

  $('#exampleModal').modal('show');

  


});

// product status code goes here

$(".ProductStatus").change(function(){
               var id = $(this).attr('rel');
               if($(this).prop("checked")==true)
               {
                  $.ajax({
                     headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     type : 'post',
                     url  : '{{route('product-status')}}',
                     data : {status:'0',id:id},
                     success:function(data)
                     {
                        alert('This product has NOW Visible to Customer!');
                     },
                     error:function()
                     {
                        alert("Error");
                     }

                  });

               }else{

                  $.ajax({
                     headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     type : 'post',
                     url  : '{{route('product-status')}}',
                     data : {status:'1',id:id},
                     success:function(resp)
                     {
                       alert('This product will be No longer visible to customer!');
                     },
                     error:function()
                     {  
                        alert("Error");
                     }

                  });


               }

            });

            // poduct delete code goes here

            $(".product_delete").click(function(){
              var id = $(this).attr('rel');
              $.ajax({
                     headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     type : 'post',
                     url  : '{{route('product-del')}}',
                     data : {id:id},
                     success:function(data)
                     {
                        alert('Product Remove Successfully!');
                        window.location.href='{{route('user-dashboard')}}';
                     },
                     error:function()
                     {
                        alert("Error");
                     }

                  });
              
            });

            // product update code goes here

            $(".product_update").click(function(){
              var id = $(this).attr('rel');
              $('#exampleModal_update').modal('show');

              $.ajax({
                     headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     type : 'post',
                     url  : '{{route('get-product-details')}}',
                     data : {id:id},
                     success:function(data)
                     {
                      $.each(JSON.parse(data), function(i, item) {

                       $('#p_name').val(item.p_name); 
                       $('#p_price').val(item.p_price);
                       $('#p_discount_per').val(item.p_discount);
                       $('#p_desc').val(item.p_description);
                       $('#p_id').val(item.id);
                     

                      });
                     },
                     error:function()
                     {
                        alert("Error");
                     }

                  });
              

            });




</script>