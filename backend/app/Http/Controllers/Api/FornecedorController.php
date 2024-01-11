<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Fornecedores;
use Exception;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     title="My First API",
 *     version="0.1"
 * )
 */
class FornecedorController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v4/fornecedor/",
     *     @OA\Response(
     *         response="200",
     *         description="The data"
     *     )
     * )
     */
    public function index()
    {
        try {
            $fornecedores = Fornecedores::all();
            return response()->json($fornecedores);
        } catch (Exception $e) {
            return response()->json(['code' => '401', 'message' => $e]);
        }
    }

    public function show($id)
    {
        try {
            $fornecedor = Fornecedores::find($id);
            return response()->json($fornecedor);
        } catch (Exception $e) {
            return response()->json(['code' => '401', 'message' => $e]);
        }
    }

    public function store(Request $request)
    {
        try {
            $fornecedores = new Fornecedores();
            $validate = $request->validate([
                'empresa' => 'required|min:3|max:50'
            ]);

            $fornecedores->empresa = $request->empresa;
            $fornecedores->save();

            return response()->json(['code' => 200]);
        } catch (Exception $e) {
            return response()->json(['code' => '401', 'message' => $e]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $fornecedores = Fornecedores::find($id);
            $validate = $request->validate([
                'empresa' => 'required|min:3|max:50'
            ]);
            $fornecedores->empresa = $request->empresa;
            $fornecedores->update();
            return response()->json(['code' => '200']);
        } catch (Exception $e) {
            return response()->json(['code' => '401', 'message' => $e]);
        }
    }

    public function destroy($id)
    {
        try {
            $fornecedores = Fornecedores::find($id);
            $fornecedores->delete();
            return response()->json(['code' => '200']);
        } catch (Exception $e) {
            return response()->json(['code' => '401', 'message' => $e]);
        }
    }
}
