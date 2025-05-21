<?php

use App\Models\Category;
use App\Models\Client;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/test', function () {
    return response()->json(['message' => 'API jalan!']);
});

Route::get('/api/category', function () {
    return response()->json(
        Category::all()
    );
});

Route::get('/api/category', function () {
    $category = Category::all();

    if ($category->isEmpty()) {
        return response()->json([
            'status' => false,
            'message' => 'No category found.',
            'data' => []
        ], 404); 
    }

    return response()->json([
        'status' => true,
        'message' => 'Category retrieved successfully.',
        'data' => $category
    ]);
});

Route::get('/api/clients/{category_name}', function ($category) {
    $clients = Client::where('category_name', $category)
    ->orderBy('date', 'desc')
    ->get();

    if ($clients->isEmpty()) {
        return response()->json([
            'status' => false,
            'message' => 'No clients found in this category.',
            'data' => []
        ], 404); 
    }

    return response()->json([
        'status' => true,
        'message' => 'Clients retrieved successfully.',
        'data' => $clients
    ]);
});


Route::get('/api/clients/detail/{client_id}', function ($client_id) {
    $clients = Client::where('client_id', $client_id)->get();

    if ($clients->isEmpty()) {
        return response()->json([
            'status' => false,
            'message' => 'No clients found in this category.',
            'data' => []
        ], 404);
    }

    return response()->json([
        'status' => true,
        'message' => 'Clients retrieved successfully.',
        'data' => $clients
    ]);
});