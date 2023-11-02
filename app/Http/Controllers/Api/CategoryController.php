<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function index(): JsonResponse
    {
        $cateogories = Category::with(['products', 'recursiveProducts'])->get();

        return response()->json($cateogories);
    }

    public function tree()
    {
        $categories = Category::tree()->get();
        return response()->json($categories->toTree());
    }
}
