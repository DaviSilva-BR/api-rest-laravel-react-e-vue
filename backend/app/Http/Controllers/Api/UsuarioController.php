<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Exception;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;



class UsuarioController extends Controller
{


    public function index()
    {
        try {
            $data = Usuario::all();
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json(['code' => $e]);
        }
    }

    public function show($id)
    {
        try {
            $data = Usuario::find($id);
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json(['code' => $e]);
        }
    }

    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                'nome' => 'required|max:50'
            ]);

            $data = new Usuario();
            $data->nome = $request->nome;
            $data->save();
            return response()->json(['code' => '200']);
        } catch (Exception $e) {
            return response()->json(['code' => '401', 'message' => $e]);
        }
    }

    public function update(Request $request, $id)
    {

        try {
            $data = Usuario::find($id);
            $validate  = $request->validate([
                'nome' => 'required|max:50'
            ]);
            $data->nome = $request->nome;
            $data->update();
            return response()->json(['code' => '200']);
        } catch (Exception $e) {
            return response()->json(['code' => '401', 'message' => $e]);
        }
    }

    public function destroy($id)
    {
        try {
            $data = Usuario::find($id);
            $data->delete();
            return response()->json(['code' => '200']);
        } catch (Exception $e) {
            return response()->json(['code' => '401', 'message' => $e]);
        }
    }
}
