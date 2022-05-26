<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratKeluarModel extends Model
{
    protected $table = 'surat_keluar';
    protected $userTimestamps = true;
    // Karena ditabel surat ada beberapa atribut yg gadipakai misalnya id, updated_at, delete_at
    // Maka harus diberitahu mana fields yg boleh diisi
    protected $allowedFields = ['id', 'nomor_urut', 'alamat', 'perihal', 'tanggal_keluar', 'lampiran', 'nomor_petunjuk', 'keterangan', 'file_keluar', 'status_pengiriman', 'status_persetujuan', 'status_revisi', 'role', 'tanda_tangan', 'created_at', 'updated_at'];

    public function getSuratKeluar()
    {
        return $this->orderBy('nomor_urut ASC')->findAll();
    }

    public function getSuratKeluarDetail($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function getCountSuratKeluar()
    {
        return $this->countAllResults();
        // return $this->where('id', 3)->countAllResults();
    }

    public function getSuratKeluarKepala()
    {
        $query = "SELECT surat_keluar.* FROM `surat_keluar` WHERE surat_keluar.status_pengiriman = 1";
        return $this->db->query($query)->getResultArray();
    }

    public function getSuratKeluarRole($id_role)
    {
        $query = "SELECT surat_keluar.* FROM `surat_keluar` WHERE surat_keluar.role = $id_role";
        return $this->db->query($query)->getResultArray();
    }
}
