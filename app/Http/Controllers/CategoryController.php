<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Construct method
     *
     * @param Category $category
     */
    public function __construct(
        private Category $category
    )
    {
    }

    /**
     * Create new category
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request): \Illuminate\Http\JsonResponse
    {
        $fields = $request->validate([
            'name' => 'required|string'
        ]);

        $this->category->name = $fields['name'];
        $this->category->save();

        return response()->json(['data' => $this->category], 201);
    }

    /**
     * Get all categories
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(): \Illuminate\Http\JsonResponse
    {
        return response()->json(['data' => $this->category->all()]);
    }
}
