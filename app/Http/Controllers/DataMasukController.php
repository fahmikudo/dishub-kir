<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataMasuk;

class DataMasukController extends Controller
{
    public function index()
    {
        $data = DataMasuk::paginate(5);
        return view('datamasuk.index', [
            'datamasuk' => $data
        ]);
    }

    public function byId($idDataMasuk)
    {
        $data = DataMasuk::getById($idDataMasuk);
        return json_encode($data);
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $no_kontrol = $data['no_kontrol'];
        $no_kendaraan = $data['no_kendaraan'];
        $no_mesin = $data['no_mesin'];
        $no_rangka = $data['no_rangka'];
        $tgl_masuk = $data['tanggal_masuk'];
        $jumlah_biaya = $data['jumlah_biaya'];
        $val = 'BD-';

        $rest = DataMasuk::Add([
            'no_kontrol' => $val.$no_kontrol,
            'no_kendaraan' => $no_kendaraan,
            'no_mesin' => $no_mesin,
            'no_rangka' => $no_rangka,
            'tanggal_masuk' => $tgl_masuk,
            'jumlah_biaya' => $jumlah_biaya
        ]);

        if($rest)
        {
            return redirect(route('data-masuk-index'));
        }
        else
        {
            return redirect(route('errors/404'));
        }

    }

    public function update(Request $request)
    {
        $idDataMasuk = $request['id-data-masuk'];
        $no_kontrol = $request['no_kontrol'];
        $no_kendaraan = $request['no_kendaraan'];
        $no_mesin = $request['no_mesin'];
        $no_rangka = $request['no_rangka'];
        $tgl_masuk = $request['tanggal_masuk'];
        $jumlah_biaya = $request['jumlah_biaya'];

        $data = [
            'no_kontrol' => $no_kontrol,
            'no_kendaraan' => $no_kendaraan,
            'no_mesin' => $no_mesin,
            'no_rangka' => $no_rangka,
            'tanggal_masuk' => $tgl_masuk,
            'jumlah_biaya' => $jumlah_biaya
        ];

        $rest = DataMasuk::Edit($data, $idDataMasuk);

        if($rest)
        {
            return redirect(route('data-masuk-index'));
        }
        else
        {
            return redirect(route('errors/404'));
        }

    }

    public function removeAjax(Request $request)
    {
        $idDataMasuk = $request['id-data-masuk'];
        $rest = DataMasuk::find($idDataMasuk);
        $rest = $rest->delete();
        if($rest)
        {
            return json_encode([
                'status' => 'success',
                'message' => 'Sukses Menghapus Data !'
            ]);
        }
        else
        {
            return json_encode([
                'status' => 'error',
                'message' => 'Gagal Menghapus Data !'
            ]);
        }
    }

    public function search()
    {
        $keyword = $_GET['keyword'];
        $data = DataMasuk::Search($keyword, 5);
        return view('datamasuk.index', [
            'datamasuk' => $data
        ]);
    }


}
