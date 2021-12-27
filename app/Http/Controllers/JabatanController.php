<?php

namespace App\Http\Controllers;

use App\Http\Resources\JabatanAktifResource;
use App\Models\Jabatan;
use App\Models\JabatanAktif;
use App\Models\SotkJabatan;
use App\Models\SotkSkpd;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as DefaultController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class JabatanController extends DefaultController
{
    public static $model = Jabatan::class;

    public function kepala($skpdId)
    {
        $skpdSotk = SotkSkpd::findOrFail($skpdId);

        if (!$skpdSotk) {
            throw new NotFoundHttpException('Resource \'' . class_basename(static::$model) . '\' with given UUID ' . $skpdId . ' not found');
        }

        $jabatanAktif = JabatanAktif::whereSotkIdJabatan($skpdSotk->id_jabatan_kepala)->first();

        if (!$jabatanAktif) {
            throw new NotFoundHttpException('Resource \'' . class_basename(static::$model) . '\' with given UUID ' . $skpdId . ' not found');
        }
        return redirect()->route('pegawai.detail', [$jabatanAktif->id_pegawai]);
    }
}
