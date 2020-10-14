<?php

namespace App\Http\Controllers;

use App\Cashier;
use App\Order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class BranchesController extends Controller
{
    public function calc_sum ($orders){
        $sum = 0;
        foreach ($orders as $order){
            $products = $order->products;
            foreach ($products as $product)
                $sum += $product->sale_price;
        }
        return $sum;
    }

    public function sales()
    {

        $allbranches = DB::select("SELECT `id` ,`name` FROM `branches`");

        $now = Carbon::now();
        $weekStartDate = $now->startOfWeek()->format('Y-m-d');
        $weekEndDate = $now->endOfWeek()->format('Y-m-d');


        $count_sales_of_today =  Order::whereDate('created_at', '=', Carbon::today()->toDateString())
                                        ->count();

        $orders_today = Order::whereDate('created_at', '=', Carbon::today()->toDateString())
                            ->with(['products:sale_price'])
                            ->get();
        $sum_of_today = $this->calc_sum($orders_today);

        $count_sales_of_yesterday =  Order::whereDate('created_at', '=', Carbon::yesterday()->toDateString())
                                            ->count();
        $orders_yesterday = Order::whereDate('created_at', '=', Carbon::yesterday()->toDateString())
                                ->with('products:sale_price')
                                ->get();
        $sum_of_yesterday = $this->calc_sum($orders_yesterday);


        $count_sales_of_week =  Order::whereBetween('created_at', [$weekStartDate, $weekEndDate])
            ->count();
        $orders_week =Order::whereBetween('created_at', [$weekStartDate, $weekEndDate])
            ->with('products:sale_price')
            ->get();
        $sum_of_week = $this->calc_sum($orders_week);


        return view('sales', compact(['allbranches','count_sales_of_today','count_sales_of_yesterday','count_sales_of_week','sum_of_today','sum_of_yesterday','sum_of_week']));

    }
}
