<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;

class CommentController extends Controller
{
    public function index()
    {
        $data = Comment::get();
        return view('list2', compact('data'));
    }

    public function add2()
    {
        $data = User::get();
        return view('add2', compact('data'));
    }

    public function save(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $details = $request->details;
        $user = $request->user;

        $comment = new Comment();
        $comment->commentID = $request->id;
        $comment->commentName = $request->name;
        $comment->commentDetails = $request->details;
        $comment->userID = $request->user;
        $comment->save();

        return redirect()->back()->with('Success', 'You have added your feedback successfully!');
    }

    public function edit2($id)
    {
        $users = User::get();
        $data = Comment::where('commentID', '=', $id)->first();
        return view('edit2', compact('data', 'users'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        Comment::where('commentID', '=', $id)->update([
            'commentName'=>$request->name,
            'commentDetails'=>$request->details,
            'customerID'=>$request->user
        ]);
        return redirect()->back()->with('success', 'The feedback has been updated successfully!');
    }

    public function delete($id)
    {
        Comment::where('commentID', '=', $id)->delete();
        return redirect()->back()->with('success', 'You have just deleted the feedback!');
    }
}

