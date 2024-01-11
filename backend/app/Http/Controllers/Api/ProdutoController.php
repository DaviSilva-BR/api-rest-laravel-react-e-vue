<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Exception;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        try {
            $produtos = Produto::all();
            return response()->json($produtos);
        } catch (Exception $e) {
            return response()->json(['code' => 401, 'message' => $e]);
        }
    }

    public function show($id)
    {
        try {
            $produtos = Produto::find($id);
            return response()->json($produtos);
        } catch (Exception $e) {
            return response()->json(['code' => 401, 'message' => $e]);
        }
    }

    public function store(Request $request)
    {
        try {
            $produtos = new Produto();
            $validate = $request->validate([
                'produto' => 'required|max:100|min:3',
                'valor' => 'required'
            ]);
            $produtos->produto = $request->produto;
            $produtos->valor = $request->valor;

            $produtos->save();
            return response()->json($produtos);
        } catch (Exception $e) {
            return response()->json(['code' => 401, 'message' => $e]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $produtos = Produto::find($id);
            $validate = $request->validate([
                'produto' => 'required|max:100|min:3',
                'valor' => 'required'
            ]);

            $produtos->produto = $request->produto;
            $produtos->valor = $request->valor;
            $produtos->update();
            return response()->json(['code' => 200]);
        } catch (Exception $e) {
            return response()->json(['code' => 401, 'message' => $e]);
        }
    }

    public function destroy($id)
    {
        try {
            $produtos = Produto::find($id);
            $produtos->delete();
            return response()->json(['code' => 200]);
        } catch (Exception $e) {
            return response()->json(['code' => 401, 'message' => $e]);
        }
    }
}
