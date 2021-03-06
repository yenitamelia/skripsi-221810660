<?php

namespace App\Controllers;

use App\Models\SuratModel;
use App\Models\SuratKeluarModel;
use DateTime;

class Home extends BaseController
{
	// Memakai construct supaya manggilnya cukup sekali, karena nnti kalau upddate, delete butuh lagi
	public function __construct()
	{
		// Memanggil/menghubungkan dari file SuratModel
		$this->suratModel = new SuratModel();
		$this->suratKeluarModel = new SuratKeluarModel();
	}

	public function indexx()
	{
		// Mengambil semua data dari tabel surat
		// $surat = $this->suratModel->findAll();
		// Diganti dibawah pake method ifelse di file SuratModel

		$data = [
			'title' => 'Daftar Surat',
			'surat' => $this->suratModel->getSurat(),
			'surat_keluar' => $this->suratKeluarModel->getSuratKeluar()
		];

		return view('pages/home', $data);
	}
}
