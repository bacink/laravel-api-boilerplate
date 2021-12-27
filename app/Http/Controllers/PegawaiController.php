<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Resources\PegawaiResource;
use Illuminate\Routing\Controller as DefaultController;

class PegawaiController extends DefaultController
{
    public function getAll()
    {
        $data = Pegawai::whereJenis('pns')->paginate();
        return PegawaiResource::collection($data);
    }

    public function get(Request $request, $pegawaiId)
    {
        $data = Pegawai::whereJenis('pns')->findOrfail($pegawaiId);
        return new PegawaiResource($data);
    }

    public function search(Request $request)
    {
        $data = Pegawai::search($request->nama)->limit(10)->get();
        return PegawaiResource::collection($data);
    }
}
