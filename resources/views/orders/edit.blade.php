@extends('layout')

@section('title')
    <title>Edit Order #{{$order->id}}</title>
@endsection

@section('content')

    <div class="container">

    <h2 class="custom-header">Edit Order #{{$order->id}}</h2>
     <section class="custom-sections form-section">
         <div class="row">
             <div class="col-xs-12 col-sm-12 col-md-12 ">

                 <form class="" method="post" action="{{route('update_order')}}">

                     {{csrf_field()}}

                     <input type="hidden" name="orderId" value="{{$order->id}}">

                     <div class="card">
                         <div class="card-header">
                             <h5>Fields which can not be edited are marked with <i class="fa fa-info-circle" aria-hidden="true"></i></h5>
                         </div>
                         <ul class="list-group list-group-flush">
                             <li class="list-group-item">
                                 <div class="form-group">
                                     <label>Order ID <i class="fa fa-info-circle" aria-hidden="true" title="you can not edit this field"></i></label><br/>
                                     <div class="disabledField">{{$order->id}}</div>
                                 </div>
                             </li>
                             <li class="list-group-item">
                                 <div class="form-group">
                                     <label>Client <i class="fa fa-info-circle" aria-hidden="true" title="you can not edit this field"></i></label><br/>
                                     <div class="disabledField">{{$order->client->name}}</div>
                                 </div>
                             </li>
                             <li class="list-group-item">
                                 <div class="form-group">
                                     <label>Product <i class="fa fa-info-circle" aria-hidden="true" title="you can not edit this field"></i></label><br/>
                                     <div class="disabledField">{{$order->product->name}}</div>
                                 </div>
                             </li>

                             <li class="list-group-item">
                                 <div class="form-group">
                                     <label for="total_amount">Total Amount $</label><br/>
                                     <input type="text" name="total_amount" id="total_amount" value="{{$order->total_amount}}"/>
                                 </div>
                             </li>

                             <li class="list-group-item">
                                 <div class="form-group">
                                     <label for="order_date">Order Date</label><br/>
                                     <input type="text" name="order_date" id="order_date" value="{{$order->order_date}}"/>
                                 </div>
                             </li>
                         </ul>
                     </div>

                     <div class="form-group with-submit-btn">
                         <button type="submit" class="btn btn-primary">Save</button>
                     </div>

                 </form>
             </div>
         </div>
     </section>

    </div>

@endsection

@section('custom_js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/js/all.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $( document ).ready(function() {
            $( "#order_date" ).datepicker({
                dateFormat: "yy-mm-dd",
            });
        });
    </script>

@endsection
