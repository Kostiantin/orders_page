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

    public static $aPossibleSortOrders = [
        'order_date' => 'o.order_date',
        'p_name' => 'p.name',
        'c_name' => 'c.name'
    ];

    /*
     Home Page. All orders + filters on them, sort order
    */
    public function index()
    {

        $key_word = request()->get('key_word');
        $search_type = request()->get('search_type');

        // $querystringArray will be used to add url params to pagination links
        $querystringArray = [];

        // Assign Sort By values (default or coming from url)
        $tmp_sort = request()->get('sort');
        $sort_direction = request()->get('dir');

        if (!empty($tmp_sort) && in_array($tmp_sort, array_keys(self::$aPossibleSortOrders)) && !empty($sort_direction) && in_array($sort_direction, ['asc', 'desc'])) {
            $sort = self::$aPossibleSortOrders[$tmp_sort];
            $querystringArray['sort'] = $tmp_sort;
            $querystringArray['dir'] = $sort_direction;
        }
        else {
            $sort = 'o.order_date';
            $sort_direction = 'asc';
        }

        $chart = new OrdersChart;

        // Get All Orders
        $query = DB::table('orders as o');
        $query->join('clients as c', 'o.client_id', '=', 'c.id');
        $query->join('products as p', 'o.product_id', '=', 'p.id');

        // Apply Filters
        if (!empty($key_word) && isset($search_type)) {

            $querystringArray['key_word'] = $key_word;
            $querystringArray['search_type'] = $search_type;

            switch (self::$aSearchTypes[$search_type]) {

                case 'All':
                    $query->where('c.name', 'like', '%'.request()->get('key_word').'%')->orWhere('c.name', 'like', '%'.request()->get('key_word').'%')->orWhere('p.name', 'like', '%'.request()->get('key_word').'%')->orWhere('o.total_amount', '=', request()->get('key_word'))->orWhere('o.order_date', '=', date('Y-m-d', strtotime(request()->get('key_word'))));
                    break;
                case 'Client':
                    $query->where('c.name', 'like', '%'.request()->get('key_word').'%');
                    break;
                case 'Product':
                    $query->where('p.name', 'like', '%'.request()->get('key_word').'%');
                    break;
                case 'Total':
                    $query->where('o.total_amount', '=', request()->get('key_word'));
                    break;
                case 'Date':
                    $query->where('o.order_date', '=', date('Y-m-d', strtotime(request()->get('key_word'))));
                    break;
            }

        }

        $query->select('o.*', 'c.name as client_name', 'p.name as product_name');
        $query->orderBy($sort, $sort_direction);
        $orders = $query->paginate(10);

        // Fetch Data for Chart
        $aOrdersForChart = [];
        $date_labels = [];
        $date_amounts = [];

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

        // add query string to links
        $orders->appends($querystringArray);

        //Special fixes for sorting links (Client, Product, Date)
        unset($querystringArray['sort']);
        unset($querystringArray['dir']);
        if (!empty(request()->get('page'))) {
            $querystringArray['page'] = request()->get('page');
        }
        $sUrlQueryString = http_build_query($querystringArray);

        return view('orders.index', compact(['chart', 'orders', 'aSearchTypes', 'querystringArray', 'sUrlQueryString']));
    }

    /*
     Delete Order
    */
    public function deleteOrder($orderId)
    {
        Order::where(['id' => $orderId])->delete();

        return back();
    }

    /*
    Edit Order
    */
    public function editOrder($orderId)
    {
        $order = Order::with(['product','client'])->where(['id' => $orderId])->first();

        return view('orders.edit', compact(['order']));
    }

    /*
     Update Order
    */
    public function updateOrder()
    {
        if (request()->isMethod('post')) {

            $order_id = request()->get('orderId');
            $order_date = request()->get('order_date');
            $total_amount = request()->get('total_amount');

            if (!empty($order_id) && !empty($order_date) && !empty($total_amount)) {

                $order = Order::find($order_id);

                $order->order_date = $order_date;
                $order->total_amount = $total_amount;

                $order->save();
            }
        }

        return redirect()->route('home');
    }
}
