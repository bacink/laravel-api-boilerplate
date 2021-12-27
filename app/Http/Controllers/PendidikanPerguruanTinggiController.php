<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PendidikanPerguruanTinggi;
use App\Http\Resources\PendidikanPerguruanTinggiResource;
use Illuminate\Routing\Controller as DefaultController;

class PendidikanPerguruanTinggiController extends DefaultController
{
    public function getAll()
    {
        $data = PendidikanPerguruanTinggi::paginate();
        return PendidikanPerguruanTinggiResource::collection($data);
    }

    public function search(Request $request)
    {
        $data = PendidikanPerguruanTinggi::search($request->nama)->limit(10)->get();
        return PendidikanPerguruanTinggiResource::collection($data);
    }
}
