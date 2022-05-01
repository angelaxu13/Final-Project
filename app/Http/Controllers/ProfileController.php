<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Models\User;
use Auth;
use App\Models\Expense;
use App\Models\Comment;
use App\Models\Category;

class ProfileController extends Controller
{
    public function index()
    {
        $expenses = auth()->user()->expenses()->orderBy('created_at', 'DESC')->get();

        return view('profile.index', [
            'user' => Auth::user(),
            'expenses' => $expenses,
        ]);
    }
}
