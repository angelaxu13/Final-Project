<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Comment;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::with(['category', 'user', 'comments'])->orderBy('created_at', 'DESC')->get();
        return view ('expenses.index', [
            'expenses' => $expenses,
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view ('expenses.create', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'item' => 'required',
            'cost' => 'required|numeric',
            'category' => 'required|exists:categories,id',
        ]);

        $user = auth()->user();
    
        $expense = new Expense();
        $expense->name = $request->input('item');
        $expense->amount = $request->input('cost');
        $expense->category_id = $request->input('category');
        $expense->user_id = $user->id;
        $expense->save();
    
        return redirect()
            ->route('profile.index')
            ->with('success', "{$request->input('item')} was added");
    }

    public function edit($id)
    {
        $expense = Expense::find($id);

        if (Gate::denies('view-expense', $expense)) {
            abort(403);
        }

        $categories = Category::all();

        return view ('expenses.edit', [
            'expense' => $expense,
            'categories' => $categories,
        ]);
    }

    public function update($id, Request $request)
    {
        $expense = Expense::find($id);
    
        $request->validate([
            'item' => 'required',
            'cost' => 'required|numeric',
            'category' => 'required|exists:categories,id',
        ]);

        $user = auth()->user();
    
        $expense->name = $request->input('item');
        $expense->amount = $request->input('cost');
        $expense->category_id = $request->input('category');
        $expense->save();
    
        return redirect()
            ->route('profile.index')
            ->with('success', "{$request->input('item')} was updated");
    }

    public function delete($id)
    {
        $user = auth()->user();

        $expense = Expense::find($id);

        if (Gate::denies('view-expense', $expense)) {
            abort(403);
        }

        $expensename = $expense->name;
        $expense->delete();

        return redirect()
            ->route('profile.index')
            ->with('success', "{$expensename} was deleted");
    }

}
