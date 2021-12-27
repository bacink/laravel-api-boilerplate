<?php

namespace App\Http\Controllers;

use App\Http\Resources\PendidikanSekolahResource;
use App\Models\PendidikanSekolah;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as DefaultController;

class PendidikanSekolahController extends DefaultController
{
    public function getAll()
    {
        $data = PendidikanSekolah::paginate();
        return PendidikanSekolahResource::collection($data);
    }

    public function search(Request $request)
    {
        $keyword = $request->nama;
        $filter = $request->id_tingkat;
        $data = PendidikanSekolah::search($keyword, true,  $filter, true)->limit(10)->get();
        return PendidikanSekolahResource::collection($data);
    }
}
