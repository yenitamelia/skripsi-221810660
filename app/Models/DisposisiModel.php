<?php

namespace App\Models;

use CodeIgniter\Model;

class DisposisiModel extends Model
{
    protected $table = 'disposisi';
    protected $userTimestamps = true;
    // Karena ditabel surat ada beberapa atribut yg gadipakai misalnya id, updated_at, delete_at
    // Maka harus diberitahu mana fields yg boleh diisi
    protected $allowedFields = ['isi_disposisi', 'id_surat', 'gambar'];

    public function getDisposisi($id = false)
    {
        return $this->findAll();
    }

    public function getIdRole($id)
    {
        $builder = $this->db->table('disposisi');
        $builder->join('role', 'disposisi.id_role=role.id');
        $builder->select('disposisi.*,role.description');
        $builder->where('disposisi.id_surat', $id);
        return $builder->get()->getResultArray();
    }

    public function getSuratByDisposisiId($id_disposisi)
    {
        $this->where('disposisi.id', $id_disposisi);
        $this->join('surat_masuk', 'surat_masuk.id=disposisi.id_surat');
        $this->select('*');
        return $this->first();
    }
    // public function getSurat($id = false)
    // {
    //     if ($id == false) {
    //         return $this->findAll();
    //     }

    //     return $this->where(['id' => $id])->first();
    // }
}
