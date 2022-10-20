<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index() {
        $tags = Tag::query()->select('id', 'title')->orderBy('title')->get();
        return View('tag.index', [
            'tags' => $tags,
        ]);
    }
}
