<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupsModel extends Model
{
    protected $table = 'role';
    protected $userTimestamps = true;
    // Karena ditabel surat ada beberapa atribut yg gadipakai misalnya id, updated_at, delete_at
    // Maka harus diberitahu mana fields yg boleh diisi
    protected $allowedFields = ['name', 'description'];

    public function getGroups($id = false)
    {
        if ($id == false) {
            // $this->join('users', 'auth_gropus.id=users.role_id');
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function getRole($id)
    {
        $query = "SELECT * FROM users WHERE id = $id";
        return $this->db->query($query)->getRow()->role_id;
    }

    public function getCountRole()
    {
        return $this->countAllResults();
        // return $this->where('id', 3)->countAllResults();
    }
}
