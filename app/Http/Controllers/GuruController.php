<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index','show']]);
    }

    public function index()
    {
        $gurus = guru::all();
        $gurus = guru::with('mapel','siswa')->get();
        return response()->json($gurus);
    }

    
    public function create()
    {
        //
    }

 
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nip' => 'required',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'jk' => 'required',
             ]);
                    if ($validate->passes()) {
                    $gurus = guru::create($request->all());
                    return response()->json([
                    'message' => 'Data Berhasil Disimpan',
                    'data' => $gurus
                    ]);

        }else{

            return response()->json([
                'message' => 'Data Gagal Disimpan',
                'data' => $validate->errors()->all()
            ]);
            }
        }

    

    public function show($gurus)
        {
        $gurus = guru::with('mapel','siswa')->where('id', $gurus)->first();
                if (!empty($gurus)) {
                    return $gurus;
        }
        return response()->json(['message' => 'data tidak ditemukan'], 404);
    }
    
    public function edit(guru $gurus)
    {
        //
    }

    
    public function update(Request $request, guru $gurus)
    {
        $gurus = guru::where('id', $gurus)->first();
        if (!empty($gurus)) {
            $validate = Validator::make($request->all(), [
                    'nip' => 'required',
                    'nama' => 'required',
                    'tgl_lahir' => 'required',
                    'jk' => 'required',
]);

if ($validate->passes()) {
    $gurus->update($request->all());
    return response()->json([
        'message' => 'Data Berhasil Disimpan',
        'data' => $gurus
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

    
    public function destroy(guru $gurus)
    {
          $gurus = guru::where('id', $gurus)->first();
             if (empty($gurus)) {
             return response()->json(['message' => 'data tidak ditemukan'], 404);
         }
         $gurus->delete();
            return response()->json([

               'message' => 'data berhasil dihapus'
              ], 200);
        }
    }

