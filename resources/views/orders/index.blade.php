@extends('layout')

@section('title')
    <title>{{ config('app.name', 'Orders') }}</title>
@endsection

@section('content')

    <div class="container">

     <section class="custom-sections form-section">
         <div class="row">
             <div class="col-xs-12 col-sm-12 col-md-12 ">
                 <form class="form-inline" method="get" action="{{route('search_order')}}">

                     <div class="form-group fg-1">
                         <input type="text" class="form-control" id="key_word" name="key_word" placeholder="Keyword" required value="@if (!empty($querystringArray['key_word'])) {{$querystringArray['key_word']}} @endif">
                     </div>
                     <div class="form-group fg-2">
                         <select name="search_type" id="search_type" class="form-control">
                             @foreach ($aSearchTypes as $key => $type)
                               <option @if (isset($querystringArray['search_type']) && $querystringArray['search_type'] == $key) {{'selected'}} @endif value="{{$key}}">{{$type}}</option>
                             @endforeach
                         </select>
                     </div>
                     <div class="form-group fg-3">
                         <button type="submit" class="btn btn-primary">Search</button>

                         @if (!empty($querystringArray['key_word']))
                           <a class="clear-filters" href="{{route('home')}}">Clear Filters</a>
                         @endif
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

    <section class="custom-sections email-section">
        <div class="row">
            <div class="col-md-12">
              <a href="#">Email this report <i class="fa fa-paper-plane" aria-hidden="true"></i></a>
            </div>
        </div>
    </section>

    <section class="custom-sections orders-section">
         <div class="row">
             <div class="col-md-12">
                 <div class="table-responsive">
                     <table class="table">
                         <thead>
                             <tr>
                                 <th>Order ID</th>
                                 <th>
                                     <div class="with-sort-order">
                                         Client
                                         <a href="{{route('home') . '/?' . $sUrlQueryString . '&sort=c_name&dir=asc'}}"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
                                         <a href="{{route('home') . '/?' . $sUrlQueryString . '&sort=c_name&dir=desc'}}"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                     </div>
                                 </th>
                                 <th>
                                     <div class="with-sort-order">
                                         Product
                                         <a href="{{route('home') . '/?' . $sUrlQueryString . '&sort=p_name&dir=asc'}}"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
                                         <a href="{{route('home') . '/?' . $sUrlQueryString . '&sort=p_name&dir=desc'}}"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                     </div>

                                 </th>
                                 <th>Total</th>
                                 <th>
                                     <div class="with-sort-order">
                                         Date
                                         <a href="{{route('home') . '/?' . $sUrlQueryString . '&sort=order_date&dir=asc'}}"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
                                         <a href="{{route('home') . '/?' . $sUrlQueryString . '&sort=order_date&dir=desc'}}"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                     </div>

                                 </th>
                                 <th>Actions</th>
                             </tr>
                         </thead>
                         <tbody>
                         @foreach ($orders as $order)
                             <tr>
                                 <td>{{$order->id}}</td>
                                 <td>{{$order->client_name}}</td>
                                 <td>{{$order->product_name}}</td>
                                 <td>$ {{$order->total_amount}}</td>
                                 <td>{{$order->order_date}}</td>
                                 <td><a target="_blank" href="{{route('edit_order', $order->id)}}">Edit</a>&nbsp;|&nbsp;<a class="areYouSure" href="{{route('delete_order', $order->id)}}">Delete</a></td>
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

    <script>
        $( document ).ready(function() {
            $('.areYouSure').click(function(e){
                return confirm('Are you sure you want to delete this order?');
            });
        });
    </script>

@endsection
