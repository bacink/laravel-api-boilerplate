<?php

namespace App\Http\Controllers;

use App\Http\Resources\JabatanAktifResource;
use App\Models\JabatanAktif;
use Illuminate\Routing\Controller as DefaultController;

class JabatanAktifController extends DefaultController
{
    public function getAll()
    {
        $data = JabatanAktif::all();
        return JabatanAktifResource::collection($data);
    }
}
