<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PendidikanTingkat;
use App\Http\Resources\PendidikanTingkatResource;

class PendidikanTingkatController extends Controller
{
    public function getAll()
    {
        $data = PendidikanTingkat::paginate();
        return PendidikanTingkatResource::collection($data);
    }
}
