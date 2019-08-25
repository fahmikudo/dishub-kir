<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataMasuk extends Model
{
    protected $table = 'data_masuk';

    public function scopeGet($query)
    {
        return $this->get();
    }

    public function scopeGetByid($query, $idDataMasuk)
    {
        return $this
                ->where('id', $idDataMasuk)
                ->get();
    }

    public function scopeAdd($query, $data)
    {
        return $this->insert($data);
    }

    public function scopeEdit($query, $data, $idDataMasuk)
    {
        return $this
                ->where('id', $idDataMasuk)
                ->update($data);
    }

    public function scopeDelete($query, $idDataMasuk)
    {
        return $this
                ->where('id', $idDataMasuk)
                ->delete();
    }

    public function scopeSearch($query, $keyword, $limit)
    {
        return $this
                ->where(
                    'no_kontrol','like',"%$keyword%"
                )
                ->simplePaginate($limit);
    }
}
