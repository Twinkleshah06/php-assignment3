<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Display comments
    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', compact('comments'));
    }

    // Show form for creating a new comment
    public function create()
    {
        return view('comments.create');
    }

    // Store a newly created comment
    public function store(Request $request)
    {
        $request->validate([
            'author' => 'required|max:255',
            'comment' => 'required',
        ]);

        Comment::create($request->all());

        return redirect()->route('comments.index')->with('success', 'Comment added successfully.');
    }

    // Show form to edit a comment
    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    // Update a comment
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'author' => 'required|max:255',
            'comment' => 'required',
        ]);

        $comment->update($request->all());

        return redirect()->route('comments.index')->with('success', 'Comment updated successfully.');
    }

    // Delete a comment
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('comments.index')->with('success', 'Comment deleted successfully.');
    }
}

