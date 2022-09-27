<?php
class M_Kategori extends CI_Model
{

    public function tampilData()
    {
        return $this->db->get_where("kategori");
    }

    public function fungsiTambah($data)
    {
        $this->db->insert('kategori', $data);
    }

    public function halamanUpdate($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function fungsiUpdate($id_kategori, $data)
    {
        $this->db->where('id_kategori', $id_kategori);
        $this->db->update('kategori', $data);
    }

    function fungsiDelete($id_kategori)
    {
        $this->db->where('id_kategori', $id_kategori);
        $this->db->delete('kategori');
    }
}
