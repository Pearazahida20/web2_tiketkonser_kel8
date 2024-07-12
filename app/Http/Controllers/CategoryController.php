<?php

namespace App\Http\Controllers;

use App\Models\TodoCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = TodoCategory::all();
        return view('todocategory.index', compact('categories'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $todocategories = TodoCategory::where('user_id', 1)->get();
        // dd($todocategories); //var_dump(); die;
        return view('todocategory.create', compact('todocategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $value = [
            'category' => $request->category,
            'user_id' => Auth::user()->id,
        ];

        TodoCategory::create($value);
        return redirect('todocategory');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = TodoCategory::find($id);
        // dd($id, $todo);
        return view('todocategory.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());

        $value = [
            'category' => $request->category,
            'user_id' => Auth::user()->id,
        ];

        TodoCategory::where('id', $id)->update($value);
        return redirect('todocategory');
    }

    public function destroy(string $id)
    {
        $todo = TodoCategory::find($id);

        $todo->delete();
        return redirect('todocategory');

    }
}
