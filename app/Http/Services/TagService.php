<?php

namespace App\Http\Services;

use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class TagService {

    /**
     * create tag
     * @param $data
     * @return mixed
     */

    public function store($data) {

        if(!empty($data['title'])) {
            $title = $data['title'];
        }
        try {
            DB::beginTransaction();

            $tag = Tag::Create([
                'title' => $title
            ], $data['title']);

            DB::commit();
        } catch (\Exception $exception) {
            dd($exception);
            abort(500);
            DB::rollback();
        }

        return $tag;
    }

    /**
     * @param $data
     * @param Tag $tag
     * @return tag
     */

    public function update($data, Tag $tag) {

        if(!empty($data['title'])) {
            $title = $data['title'];
        }

        try {
            DB::beginTransaction();

            $tag->update([
                'title' => $title
            ]);

            DB::commit();
        } catch (\Exception $exception) {
            abort(500);
            DB::rollBack();
        }
    }

    /**
     * @param Tag $tag
     * @return void
     */

    public function delete(Tag $tag) {
        $tag->delete();
    }

}
