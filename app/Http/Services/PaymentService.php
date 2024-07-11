<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class PaymentService {

    /**
     * @param $data
     * @return void
     */

    public function account_store($data) : void {

        $user_id = $data['user_id'];
        $user = User::where('id', $user_id)->first();
        $current_user_balance = $user->balance;
        $replenishment_balance = $data['replenishment'];
        $bonus = $replenishment_balance / 100 * 3;
        $replenishment = $current_user_balance + $replenishment_balance;

        try {
            DB::beginTransaction();

            $user->update([
               'balance' => $replenishment,
               'bonuses' => $bonus,
            ]);

            DB::commit();
        } catch (\Exception $exception) {
            dd($exception);
            abort(500);
            DB::rollback();
        }

    }

}
