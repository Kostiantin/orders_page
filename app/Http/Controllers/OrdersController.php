<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Order;

use App\Charts\OrdersChart;

class OrdersController extends Controller
{

    public static $aSearchTypes = [
        'All',
        'Client',
        'Product',
        'Total',
        'Date',
    ];

    public function index()
    {

        //request()->get('message')

        $key_word = request()->get('key_word');
        $search_type = request()->get('search_type');

        $aForWithCondition = ['client', 'product'];

        if (!empty($key_word) && isset($search_type)) {

            switch (self::$aSearchTypes[$search_type]) {
                case 'All':
                    $aForWithCondition = ['client' => function ($query) {
                        $query->where('name', 'like', '%'.request()->get('key_word').'%');
                    }, 'product' => function ($query) {
                        //$query->where('name', 'like', '%'.request()->get('key_word').'%');
                    }];
                    break;
                case 'Client':
                    $aForWithCondition = ['client' => function ($query) {
                        $query->where('name', 'like', '%'.request()->get('key_word').'%');
                    }, 'product'];
                    break;
                case 'Product':

                    break;
                case 'Total':

                    break;
                case 'Date':

                    break;
            }

        }

        // Get All Orders
        $chart = new OrdersChart;
        $orders = Order::with($aForWithCondition)->orderBy('order_date', 'asc')->paginate(15);
//dd($orders);
        $aOrdersForChart = [];
        $date_labels = [];
        $date_amounts = [];

        // Fetch Data for Chart
        if (!empty($orders)) {

            foreach ($orders as $order) {
                $aOrdersForChart[$order->order_date] = (!empty($aOrdersForChart[$order->order_date]) ? $aOrdersForChart[$order->order_date] + $order->total_amount : $order->total_amount);
            }

            $date_labels = array_keys($aOrdersForChart);
            $date_amounts = array_values($aOrdersForChart);
        }

        $chart->labels($date_labels);
        $chart->dataset('All Orders', 'line', $date_amounts);

        $aSearchTypes = self::$aSearchTypes;

        return view('orders.index', compact(['chart', 'orders', 'aSearchTypes']));
    }
}
