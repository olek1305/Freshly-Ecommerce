<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $post = Post::create([
            'title' => 'this is from mass assign',
            'description' => 'this is from mass assign',
            'status' => 1,
            'publish_date' => now(),
            'user_id' => 2
        ]);

        return $post;

    }
}
