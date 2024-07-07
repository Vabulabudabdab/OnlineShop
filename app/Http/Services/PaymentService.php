<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentService {

    public function account_store($data) {

        $user = Auth::user();
        $current_user_balance = Auth::user()->balance;
        $replenishment_balance = $data['replenishment'];

        $replenishment = $current_user_balance + $replenishment_balance;

        try {
            DB::beginTransaction();

            $user->update([
               'balance' => $replenishment
            ]);

            DB::commit();
        } catch (\Exception $exception) {
            dd($exception);
            abort(500);
            DB::rollback();
        }

    }

}
