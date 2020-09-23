<?php

namespace App\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = (new Post)->all();

        return $this->json($posts);
    }
}
