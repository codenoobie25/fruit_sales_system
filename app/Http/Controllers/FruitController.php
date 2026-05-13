<?php

namespace App\Http\Controllers;

use App\Models\Fruit;
use Illuminate\Http\Request;

class FruitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fruits = Fruit::all();
        return view('fruits.index', compact('fruits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ['citrus', 'berry', 'stone fruit', 'tropical', 'pome'];
        $availabilities = ['Available', 'Out of Stock'];

        return view('fruits.create', compact('categories', 'availabilities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fruit_name' => 'validate',
            'category' => 'validate',
            'price_per_kg' => 'validate',
            'stock' => 'validate',
            'description' => 'validate',
            'availability' => 'validate',
        ]);

        Fruit::create($request->all());

        return redirect()->route('fruits.index')->with('success', 'Fruit Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fruit $fruit)
    {
        return redirect()->route('fruits.index', compact('fruit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fruit $fruit)
    {
        return view('fruits.edit', compact('fruit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fruit $fruit)
    {
        $request->validate([
            'fruit_name' => 'validate',
            'category' => 'validate',
            'price_per_kg' => 'validate',
            'stock' => 'validate',
            'description' => 'validate',
            'availability' => 'validate',
        ]);

        $fruit->update($request->all());

        return redirect()->route('fruits.index')->with('Update', 'Fruit Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fruit $fruit)
    {
        $fruit->delete();
        return redirect()->route('fruits.index')->with('Delete', 'Fruit Deleted Successfully');
    }
}
