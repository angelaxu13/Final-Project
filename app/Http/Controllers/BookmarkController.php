<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;
use App\Models\Expense;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;


class BookmarkController extends Controller
{
    public function index()
    {
        $bookmarks = DB:: table('bookmarks')
            ->join('expenses', 'bookmarks.expense_id', '=', 'expenses.id')
            ->join('users', 'expenses.user_id', '=', 'users.id')
            ->where('bookmarks.user_id', '=', Auth::user()->id)
            ->orderBy('bookmarks.created_at', 'DESC')
            ->get([
                'bookmarks.id AS id',
                'expenses.amount AS amount',
                'expenses.name AS expense',
                'users.name AS user',
                'bookmarks.created_at AS created_at', 
            ]);

        return view('bookmarks.index', [
            'user' => Auth::user(),
            'bookmarks' => $bookmarks,
        ]);
    }
    
    public function store($id)
    {
        $user = auth()->user();
    
        $bookmark = new Bookmark();
        $bookmark->expense_id = $id;
        $bookmark->user_id = $user->id;
        $bookmark->save();
    
        return redirect()
            ->route('bookmarks.index')
            ->with('success', "Added to bookmarks");
    }

    public function delete($id)
    {
        $user = auth()->user();

        $bookmark = Bookmark::find($id);
        $bookmark->delete();

        return redirect()
            ->route('bookmarks.index')
            ->with('success', "Bookmark was removed");
    }
}
