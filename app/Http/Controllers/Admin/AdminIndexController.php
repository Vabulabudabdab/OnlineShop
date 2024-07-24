<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminIndexController {

    public function __invoke() {

        $data['users'] = User::all()->count();
        $data['categories'] = Category::all()->count();
        $data['tags'] = Tag::all()->count();
        $data['posts'] = Post::all()->count();
        return view('admin.index', compact('data'));
    }


}
