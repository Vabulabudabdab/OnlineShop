<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Models\Tag;

class DeleteController extends BaseController {
    public function __invoke(Tag $tag) {

        $this->service->delete($tag);

        return redirect()->route('admin.tags.index');
    }
}
