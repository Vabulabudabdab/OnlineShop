<?php

namespace App\Http\Services;

use App\DataTransferObject\SendMailToUserDTO;
use App\Models\Subscribe;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class MailService {

    public function sending(SendMailToUserDTO $dto) {

        try {
            DB::beginTransaction();

            Subscribe::Create(
                [
                    $dto->email,
                    $dto->status
                ],
            );

            DB::commit();
        } catch (Exception $exception) {
            abort(500);
            DB::rollBack();
        }

    }

}
