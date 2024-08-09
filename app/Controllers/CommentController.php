<?php

namespace App\Controllers;

use App\Models\Comment;
use App\Application\Auth\Auth;
use App\Application\Request\Request;
use App\Application\Router\Redirect;


class CommentController
{
    public function submit(Request $request)
    {
        $comment = new Comment();
        $comment->setPostId($request->post("post_id"));
        $comment->setComment($request->post("comment"));
        $comment->setUserId(Auth::id());
        $comment->store();
        Redirect::Referer();
    }
}
