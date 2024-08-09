<?php

namespace App\Controllers;

use App\Models\Post;
use App\Application\Auth\Auth;
use App\Application\Request\Request;
use App\Application\Router\Redirect;

class PostController
{
    public function submit(Request $request)
    {
        $post = new Post();
        $post->setTitle($request->post("title"));
        $post->setAuthor(Auth::id());
        $post->setDescription($request->post("description"));
        $post->setMessage($request->post("message"));
        $post->store();
        Redirect::to("/home");
    }

    public function update(Request $request)
    {
        $postData = [
            "author" => Auth::id(),
            "title" => $request->post("title"),
            "description" => $request->post("description"),
            "message" => $request->post("message"),
        ];
        $post = (new Post())->find("id", $request->post("id"));
        $post->update($postData);
        Redirect::to("/post/" . $request->post("id"));
    }
}
