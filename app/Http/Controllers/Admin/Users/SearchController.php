<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Requests\User\SearchRequest;

class SearchController extends BaseController {

    public function __invoke(SearchRequest $request) {

        $data = $request->validated();

        $users = $this->service->search($request);

        return view('admin.users.search', compact('users'));
    }

}
