<?php

namespace App\Http\Controllers\Admin\Users;

interface UserInterface {
    public function getUser(int $id);
}
