<?php

namespace App\Http\Controllers\Admin\Post;

use App\DataTransferObject\CreatePostDTO;
use App\Http\Requests\Posts\StoreRequest;
use App\Models\Post;

class IndexController extends BaseController {

    public function index() {
        $path = $this->service->index();
        return $path;
    }

    public function create() {
        $path = $this->service->create();
        return $path;
    }

    public function edit(Post $post) {
        $path = $this->service->edit($post);
        return $path;
    }

    public function show(Post $post) {
        $path = $this->service->show($post);
        return $path;
    }

    public function store(StoreRequest $request) {

        $data = $request->validated();

        $preview_image = $this->service->getPreviewImage($data['preview_image']);
        $main_image = $this->service->getMainImage($data['main_image']);

        $path = $this->service->store(new CreatePostDTO($data['title'],
            $data['description'],
            $data['category_id'],
            $data['tag_ids'],
            $main_image,
            $preview_image,
            $data['content']));

        return $path;
    }

    public function update(Post $post) {
        $this->service->update($post);
        return $path;
    }

    public function delete(Post $post) {
        $this->service->delete($post);
    }

}