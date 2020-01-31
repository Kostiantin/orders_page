@extends('layout')

@section('title')
    <title>{{ config('app.name', 'Orders') }}</title>
@endsection

@section('content')

    <div class="container">

     <section class="custom-sections form-section">
         <div class="row">
             <div class="col-xs-12 col-sm-12 col-md-12 ">
                 <form class="form-inline" method="POST" action="{{route('search_order')}}">
                     {{csrf_field()}}
                     <div class="form-group fg-1">
                         <input type="text" class="form-control" id="key_word" name="key_word" placeholder="Keyword" required>
                     </div>
                     <div class="form-group fg-2">
                         <select name="search_type" id="search_type" class="form-control">
                             @foreach ($aSearchTypes as $key => $type)
                               <option value="{{$key}}">{{$type}}</option>
                             @endforeach
                         </select>
                     </div>
                     <div class="form-group fg-3">
                         <button type="submit" class="btn btn-primary">Search</button>
                     </div>

                 </form>
             </div>
         </div>
     </section>


    <section class="custom-sections chart-section">
         <div class="row">
             {!! $chart->container() !!}
         </div>
     </section>


    <section class="custom-sections orders-section">
         <div class="row">
             <div class="col-md-12">
                 <div class="table-responsive">
                     <table class="table">
                         <thead>
                             <tr>
                                 <th>#</th>
                                 <th>Client</th>
                                 <th>Product</th>
                                 <th>Total</th>
                                 <th>Date</th>
                                 <th>Actions</th>
                             </tr>
                         </thead>
                         <tbody>
                         @foreach ($orders as $order)
                             <tr>
                                 <td>{{$order->id}}</td>
                                 <td>{{$order->client->name}}</td>
                                 <td>{{$order->product->name}}</td>
                                 <td>$ {{$order->total_amount}}</td>
                                 <td>{{$order->order_date}}</td>
                                 <td><a href="#">Edit</a>&nbsp;|&nbsp;<a href="#">Delete</a></td>
                             </tr>
                         @endforeach

                         </tbody>
                     </table>
                     {{$orders->links()}}
                 </div>
             </div>
         </div>
     </section>



    </div>

@endsection

@section('custom_js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>

    {!! $chart->script() !!}
@endsection
