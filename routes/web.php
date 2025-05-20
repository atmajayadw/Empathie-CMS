<?php

use App\Models\Client;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/test', function () {
    return response()->json(['message' => 'API jalan!']);
});

Route::get('/api/clients/{category_name}', function ($category) {
    $clients = Client::where('category_name', $category)->get();

    if ($clients->isEmpty()) {
        return response()->json([
            'status' => false,
            'message' => 'No clients found in this category.',
            'data' => []
        ], 404); // atau bisa 200 juga tergantung style kamu
    }

    return response()->json([
        'status' => true,
        'message' => 'Clients retrieved successfully.',
        'data' => $clients
    ]);
});

Route::get('/api/clients/detail/{client_id}', function ($client_id) {
    return response()->json(
        Client::where('client_id', $client_id)->get()
    );
});


Route::get('/api/clients/detail/{client_id}', function ($client_id) {
    $clients = Client::where('client_id', $client_id)->get();

    if ($clients->isEmpty()) {
        return response()->json([
            'status' => false,
            'message' => 'No clients found in this category.',
            'data' => []
        ], 404); // atau bisa 200 juga tergantung style kamu
    }

    return response()->json([
        'status' => true,
        'message' => 'Clients retrieved successfully.',
        'data' => $clients
    ]);
});