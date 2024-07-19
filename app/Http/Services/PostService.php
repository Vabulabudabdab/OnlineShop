<?php

namespace App\Http\Services;

use App\DataTransferObject\CreatePostDTO;
use App\DataTransferObject\UpdatePostDTO;
use App\Models\Category;
use App\Models\Post;
use App\Models\Post_Tag;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService {

    /**
     * Test dev pattern
     */
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index() {
        $posts = Post::paginate(9);

        $path = view('admin.posts.index', compact('posts'));

        return $path;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create() {
        $categories = Category::all();
        $tags = Tag::all();

        $path = view('admin.posts.create', compact('categories', 'tags'));

        return $path;
    }

    /**
     * @param Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit(Post $post) {
        $categories = Category::all();
        $tags = Tag::all();
        $relatedTags = $post->tags()->pluck('tag_id')->toArray();

        $path = view('admin.posts.edit', compact('categories', 'tags', 'post', 'relatedTags'));

        return $path;
    }

    /**
     * @param Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function show(Post $post) {

        $path = view('admin.posts.show', compact('post'));

        return $path;
    }

    public function store(CreatePostDTO $DTO) {

        $user = Auth::user()->id;

        $tag_ids = $DTO->tag_ids;

        try {
            DB::beginTransaction();

            $post = Post::create([
               'title' => $DTO->title,
               'user_id' => $user,
               'category_id' => $DTO->category_id,
               'description' => $DTO->description,
               'content' => $DTO->content,
               'preview_image' => $DTO->preview_image,
               'main_image' => $DTO->main_image
            ]);

            $post->tags()->attach($tag_ids);

            $path = redirect()->route('admin.posts.index');

            DB::commit();
        } catch (\Exception $exception) {
            dd($exception);
            abort(500);
            DB::rollBack();
        }
        return $path;
    }

    public function update(UpdatePostDTO $DTO, Post $post) {

        $tag_ids = $DTO->tag_ids;

        try {
            DB::beginTransaction();

            $post->update([
                'title' => $DTO->title,
                'category_id' => $DTO->category_id,
                'description' => $DTO->description,
                'content' => $DTO->content,
                'preview_image' => $DTO->preview_image,
                'main_image' => $DTO->main_image
            ]);

            $post->tags()->sync($tag_ids);

            $path = redirect()->route('admin.posts.index');

            DB::commit();
        } catch (\Exception $exception) {
            dd($exception);
            abort(500);
            DB::rollBack();
        }

        return $path;
    }

    /**
     * @param Post $post
     * @return void
     */

    public function delete(Post $post) : void {

        try {
            DB::beginTransaction();

            $post->delete();

            DB::commit();
        } catch (\Exception $exception) {
            abort(500);
            DB::rollBack();
        }

    }

    /**
     * @param $image
     * @return bool|void
     */

    public function getMainImage($image) {

        if(!empty($image)) {

            try {
                DB::beginTransaction();

                $main_image_path = Storage::disk('public')->put('/images', $image);

                DB::commit();
            } catch (\Exception $exception) {
                dd($exception);
                abort(500);
                DB::rollBack();
            }

            return $main_image_path;
        }
    }

    /**
     * @param $image
     * @return bool|void
     */
    public function getPreviewImage($image) {

        if(!empty($image)) {

            try {
                DB::beginTransaction();

                $preview_image_path = Storage::disk('public')->put('/images', $image);

                DB::commit();
            } catch (\Exception $exception) {
                dd($exception);
                abort(500);
                DB::rollBack();
            }

            return $preview_image_path;
        }
    }

}
