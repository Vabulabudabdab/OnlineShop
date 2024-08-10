<?php

namespace App\Http\Services;

use App\Jobs\SendPaymentNotificationToUserJob;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class OrderService {

    /**
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */

    public function createOrder(Product $product) {

        $product_id = $product->id;
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $waiting = 2;

        $afterBuyBalance = $user->balance - $product->price;

        if($user->balance > $product->price) {
            try {
                DB::beginTransaction();

                $order = Order::create([
                    'product' => $product_id,
                    'user' => $user_id,
                    'status' => $waiting
                ]);

                $path = redirect()->route('admin.orders.show', $order);

                DB::commit();
            } catch (Exception $exception) {
                dd($exception);
                abort(500);
                DB::rollBack();
            }
        } else {
            $path = redirect()->route('admin.orders.index')->with('not_enough_money', 'У вас недостаточно средств');
        }

        return $path;

    }

    /**
     * @param Order $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function pay(Order $order) {

        $user = Auth::user();
        $email = $user->email;
        $product_price = $order->products->price;
        $bonuses_for_payment = $product_price / 100 * 1;
        $success = 3;
        $afterBuyBalance = $user->balance - $product_price;

        if($user->balance > $product_price) {
            try {
                DB::beginTransaction();

                $order->update([
                    'status' => $success
                ]);

                $user->update([
                   'balance' => $afterBuyBalance,
                   'bonuses' => $bonuses_for_payment
                ]);

                SendPaymentNotificationToUserJob::dispatch($order, $email); // В имени должно быть Notification, if it not password or  email

                $path = redirect()->route('admin.orders.show', $order)->with('success_payment', 'Ваш заказ успешно оплачен!');

                DB::commit();
            } catch (Exception $exception) {
                dd($exception);
                abort(500);
                DB::rollBack();
            }
        } else {
            $path = redirect()->route('admin.orders.index')->with('not_enough_money', 'У вас недостаточно средств');
        }

        return $path;
    }

}
