<?php

namespace App\Transformers;

class PengajuanTransformer extends BaseTransformer
{
    public function transform($object)
    {
        $transformed =  parent::transform($object);
        // Your own added logic
        return $transformed;
    }
}
