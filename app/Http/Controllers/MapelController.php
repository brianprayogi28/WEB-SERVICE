<?php

namespace App\Http\Controllers;


use App\Models\mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index','show']]);
    }

    public function index()
    {
        $mapels = Mapel::all();
        return response()->json($mapels);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'kode' => 'required',
            'nama_pelajaran' => 'required',
            'jam' => 'required'
        ]);
        if ($validate->passes()) {
        $mapels = mapel::create($request->all());
        return response()->json([
        'message' => 'Data Berhasil Disimpan',
        'data' => $mapels
        ]);
        }else{

        return response()->json([
        'message' => 'Data Gagal Disimpan',
        'data' => $validate->errors()->all()
        ]);              
    }
}

    
    public function show($mapels)
    {
        $mapels = mapel::where('id', $id)->first();
        if (!empty($mapels)) {
            return $mapels;
}
return response()->json(['message' => 'data tidak ditemukan'], 404);
    }

   
    public function edit(mapel $mapel)
    {
        //
    }

    
    public function update(Request $request, mapel $mapel)
    {
        $mapels = mapel::where('id', $mapels)->first();
                if (!empty($siswas)) {
                    $validate = Validator::make($request->all(), [
                            'nama_pelajaran' => 'required',
                            'jam' => 'required'
        ]);

        if ($validate->passes()) {
            $mapels->update($request->all());
            return response()->json([
                'message' => 'Data Berhasil Disimpan',
                'data' => $mapels
            ]);
        }else{
        return response()->json([
            'message' => 'Data Gagal Disimpan',
            'data' => $validate->errors()->all()
        ]);

        }
        }
        return response()->json(['message' => 'data tidak ditemukan'], 404);
    }

    
    public function destroy(mapel $mapel)
    {
        $mapels = mapel::where('id', $mapels)->first();
            if (empty($mapels)) {
                return response()->json(['message' => 'data tidak ditemukan'], 404);
            }
            $mapels->delete();
            return response()->json([
    
                'message' => 'data berhasil dihapus'
            ], 200);
         }
    }
