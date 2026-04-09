<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\Cliente;


class ClienteController extends Controller
{
    //
    public function index()
    {
        $clientes = Cliente::all();
        return response()->json($clientes);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $cliente = Cliente::create([
            'nombre' => $request->nombre,
        ]);
        return response()->json($cliente, 201);
    }
}


