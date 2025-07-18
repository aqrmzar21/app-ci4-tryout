<?php

namespace App\Controllers;

// use App\Models\KategoriData;

class Pengguna extends BaseController
{
    public function index()
    {
        $builder = $this->db->table('pengguna');
        $query   = $builder->get();

        $data = [
            'user' => $query,
            'judul' => 'Pengaturan Akun | SIMPLEN'
        ];
        return view('user/index', $data);
    }
    public function edit($id = null)
    {
        // $builder = $this->db->table('pengguna');
        // $query   = $builder->get();


        $data = [
            // 'user' => $query,
            'judul' => 'Edit Pengguna | SIMPLEN'
        ];
        // dd($query);
        return view('user/_edit', $data);
    }
    public function update($id)
    {
        // $builder = $this->db->table('pengguna');
        // $query   = $builder->get();


        $data = [
            // 'user' => $query,
            'judul' => 'Edit Pengguna | SIMPLEN'
        ];
        // dd($query);
        return view('user/_edit', $data);
    }
    public function destroy($id)
    {
        $this->db->table('pengguna')->where(['id_pengguna' => $id])->delete();
        return redirect()->to('user/index')->with('success', 'Data berhasil di hapus');
    }
}
