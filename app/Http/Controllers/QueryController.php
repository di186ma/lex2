<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Query;
use App\Models\User;
use App\Models\Admin;
use App\Models\Lawyer;
use Illuminate\Validation\Rule;

class QueryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $queries = Query::with('user', 'admin', 'lawyer')->get();
        return view('queries.index', compact('queries'));
    }

    public function show($id)
    {
        $query = Query::with('user', 'admin', 'lawyer')->findOrFail($id);
        return view('queries.show', compact('query'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $admins = Admin::all();
        $lawyers = Lawyer::all();
        return view('queries.create', compact('users', 'admins', 'lawyers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'admin_id' => 'required|exists:admins,id',
            'lawyer_id' => 'nullable|exists:lawyers,id',
            'query_text' => 'required|string|max:255',
        ]);

        Query::create($validatedData);

        return redirect()->route('queries.index')->with('success', 'Query created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Query $query)
    {
        $users = User::all();
        $admins = Admin::all();
        $lawyers = Lawyer::all();
        return view('queries.edit', compact('query', 'users', 'admins', 'lawyers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Query $query)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'admin_id' => 'required|exists:admins,id',
            'lawyer_id' => 'nullable|exists:lawyers,id',
            'query_text' => 'required|string|max:255',
        ]);

        $query->update($validatedData);

        return redirect()->route('queries.index')->with('success', 'Query updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Query $query)
    {
        $query->delete();

        return redirect()->route('queries.index')->with('success', 'Query deleted successfully!');
    }
}
