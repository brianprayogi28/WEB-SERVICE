<?php

namespace App\Http\Controllers;


use App\Models\siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index','show']]);
    }

    public function index()
    {
        $siswas = siswa::all();
        return response()->json($siswas);
    }

    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nis' => 'required',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'jk' => 'required',
        ]);
        if ($validate->passes()) {
        $siswas = siswa::create($request->all());
        return response()->json([
        'message' => 'Data Berhasil Disimpan',
        'data' => $siswas
        ]);
        }else{

        return response()->json([
        'message' => 'Data Gagal Disimpan',
        'data' => $validate->errors()->all()
        ]);
    }
}
    
    public function show($siswas)
    {
        $siswas = siswa::with('guru','mapel')->where('id', $siswas)->first();
                if (!empty($siswas)) {
                    return $siswas;
        }
        return response()->json(['message' => 'data tidak ditemukan'], 404);
    }
    

    
    public function edit(siswa $siswa)
    {
        //
    }

   
    public function update(Request $request, siswa $siswa)
    {
        $siswas = siswa::where('id', $siswas)->first();
                if (!empty($siswas)) {
                    $validate = Validator::make($request->all(), [
                            'nis' => 'required',
                            'nama' => 'required',
                            'tgl_lahir' => 'required',
                            'jk' => 'required',
                            'telepon' => 'required'
        ]);

        if ($validate->passes()) {
            $siswas->update($request->all());
            return response()->json([
                'message' => 'Data Berhasil Disimpan',
                'data' => $siswas
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
    

    
    public function destroy(siswa $siswa)
    {
        $siswas = siswa::where('id', $siswas)->first();
        if (empty($siswas)) {
            return response()->json(['message' => 'data tidak ditemukan'], 404);
        }
        $siswas->delete();
        return response()->json([

            'message' => 'data berhasil dihapus'
        ], 200);
    }
}
