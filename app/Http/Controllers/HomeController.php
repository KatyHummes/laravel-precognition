<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

use function Termwind\render;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Welcome');
    }

    public function store(ProductRequest $request)
    {
        // dd($request->all());

        Product::create([
            'name' => $request['name'],
            'creation' => $request['creation'],
            'phone' => $request['phone'],
            'color' => $request['color'],
            'gender' => $request['gender'],
            'file' => $request['file'] ?? 'default_value',
        ]);
    }
}
