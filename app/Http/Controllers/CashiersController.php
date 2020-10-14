<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CashiersController extends Controller
{
    public function cashiers()
    {

        $s = Carbon::now()->startOfWeek()->format('Y-m-d');
        $e = Carbon::now()->endOfWeek()->format('Y-m-d');

        $all_cashiers = DB::select("SELECT `id` ,`username` FROM `cashiers`");
        $count_cashiers_of_today = DB::select("SELECT COUNT(*) AS 'count',`orders`.`cashier_id` FROM `orders`
                                        WHERE date(`created_at`) = :created_at
                                        GROUP BY `cashier_id`",['created_at'=>Carbon::today()->toDateString()]);

        $orders_today = DB::select("SELECT SUM(`products`.`sale_price`) 'sum' ,`orders`.`cashier_id` FROM `order_products`
                                            JOIN `products` ON `products`.`id` = `order_products`.`product_id`
                                            JOIN `orders` ON `orders`.`id` = `order_products`.`order_id`
                                            WHERE date(`orders`.`created_at`) = :created_at
                                        GROUP BY `orders`.`cashier_id`",['created_at'=>Carbon::today()->toDateString()]);

        $count_cashiers_of_yesterday = DB::select("SELECT COUNT(*) AS 'count',`orders`.`cashier_id`FROM `orders`
                                        WHERE date(`created_at`) = :created_at
                                        GROUP BY `cashier_id`",['created_at'=>Carbon::yesterday()->toDateString()]);

        $orders_yesterday = DB::select("SELECT SUM(`products`.`sale_price`) 'sum' ,`orders`.`cashier_id` FROM `order_products`
                                            JOIN `products` ON `products`.`id` = `order_products`.`product_id`
                                            JOIN `orders` ON `orders`.`id` = `order_products`.`order_id`
                                            WHERE date(`orders`.`created_at`) = :created_at
                                        GROUP BY `orders`.`cashier_id`",['created_at'=>Carbon::yesterday()->toDateString()]);


        $count_cashiers_of_week = DB::select("SELECT COUNT(*) AS 'count',`orders`.`cashier_id` FROM `orders`
                                        WHERE date(`created_at`) > :week_begin AND date(`created_at`) < :week_end
                                        GROUP BY `cashier_id`", ['week_begin'=>$s, 'week_end'=>$e]);

        $orders_week = DB::select("SELECT SUM(`products`.`sale_price`) 'sum' ,`orders`.`cashier_id` FROM `order_products`
                                            JOIN `products` ON `products`.`id` = `order_products`.`product_id`
                                            JOIN `orders` ON `orders`.`id` = `order_products`.`order_id`
                                            WHERE date(`orders`.`created_at`) > :week_begin AND date(`orders`.`created_at`) < :week_end
                                          GROUP BY `orders`.`cashier_id`",['week_begin'=>$s, 'week_end'=>$e]);


        return view('cashiers', compact(['all_cashiers','count_cashiers_of_today','count_cashiers_of_yesterday','count_cashiers_of_week','orders_today','orders_yesterday','orders_week']));

    }
}
