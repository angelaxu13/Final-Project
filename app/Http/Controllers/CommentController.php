<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Comment;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Auth;

class CommentController extends Controller
{
    public function index($id)
    {
        $expense = Expense::find($id);

        $comments = Comment::select('comments.*')
            ->with(['user'])
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->where('expense_id', "=", $id)
            ->orderBy('comments.created_at', 'DESC')
            ->get([
                'comments.id AS id',
                'comments.comment AS comment',
                'users.name AS user',
                'comments.created_at AS created_at', 
            ]);

        return view ('comments.index', [
            'expense' => $expense,
            'comments' => $comments,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required',
        ]);

        $user = auth()->user();
    
        $comment = new Comment();
        $comment->comment = $request->input('comment');
        $comment->expense_id = $request->input('expense');
        $comment->user_id = $user->id;
        $comment->save();
    
        return redirect()
            ->route('comments.index', [ 'id' => $comment->expense_id ])
            ->with('success', "{$request->input('comment')} was posted");
    }

    public function edit($id)
    {
        
        $comment = Comment::find($id);

        if (Gate::denies('view-comment', $comment)) {
            abort(403);
        }

        return view ('comments.edit', [
            'comment' => $comment,
        ]);

    }

    public function update($id, Request $request)
    {
        $comment = Comment::find($id);
    
        $request->validate([
            'comment' => 'required',
        ]);

        $user = auth()->user();
    
        $comment->comment = $request->input('comment');
        $comment->save();
    
        return redirect()
            ->route('comments.index', [ 'id' => $comment->expense_id ])
            ->with('success', "{$request->input('comment')} was updated");
    }

    public function delete($id)
    {
        $user = auth()->user();

        $comment = Comment::find($id);

        if (Gate::denies('view-comment', $comment)) {
            abort(403);
        }
        
        $comment->delete();

        return redirect()
            ->route('comments.index', [ 'id' => $comment->expense_id ])
            ->with('success', "Your comment was deleted");

    }

}
