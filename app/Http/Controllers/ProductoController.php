<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Productos::query()->latest()->get());
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'descripcion' => ['nullable', 'string'],
            'precio' => ['required', 'numeric', 'min:0'],
            'cantidad' => ['required', 'integer', 'min:0'],
        ]);

        $producto = Productos::query()->create($validated);

        return response()->json($producto, 201);
    }

    public function show(Productos $producto): JsonResponse
    {
        return response()->json($producto);
    }

    public function update(Request $request, Productos $producto): JsonResponse
    {
        $validated = $request->validate([
            'nombre' => ['sometimes', 'required', 'string', 'max:255'],
            'descripcion' => ['nullable', 'string'],
            'precio' => ['sometimes', 'required', 'numeric', 'min:0'],
            'cantidad' => ['sometimes', 'required', 'integer', 'min:0'],
        ]);

        $producto->update($validated);

        return response()->json($producto);
    }

    public function destroy(Productos $producto): JsonResponse
    {
        $producto->delete();

        return response()->json(['message' => 'Producto eliminado']);
    }
}
