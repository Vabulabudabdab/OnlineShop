<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Requests\Tag\UpdateRequest;
use App\Models\Tag;

class UpdateController extends BaseController {
    public function __invoke(Tag $tag, UpdateRequest $request) {

        $data = $request->validated();

        $this->service->update($data, $tag);

        return redirect()->route('admin.tags.show', compact('tag'));
    }
}
