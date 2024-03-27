<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Display a listing of categories.
     */
    public function index(){
        $categories = Category::all();
        return response()->json($categories);
    }
}
