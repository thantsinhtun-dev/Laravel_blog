<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create()
    {
        # code...
        $validator=validator(request()->all(),['context'=>'required']);
        if ($validator->fails()) {
            # code...
            return back()->withErrors($validator);

        }

        $comment=new Comment;
        $comment->content=request()->context;
        $comment->article_id=request()->article_id;
        $comment->save();
        return back();

    }
    public function delete($id)
    {
        # code...
        $comment=Comment::find($id);
        $comment->delete();
        return back();
    }
}
