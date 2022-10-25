<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use View;

class AuthorController extends Controller
{
    public function show(Request $request, User $user) {
        $articles = $user->articles()->published()->get();

        return View('author.show', [
            'author' => $user,
            'articles' => $articles,
        ]);
    }
}
