
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Berita extends CI_Model
{
    private $table = 'berita';

    //validasi form, method ini akan mengembailkan data berupa rules validasi form       
    public function rules()
    {
        return [
            [
                'field' => 'judul',  //samakan dengan atribute name pada tags input
                'label' => 'judul',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'link',  //samakan dengan atribute name pada tags input
                'label' => 'link',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'deskripsi',
                'label' => 'deskripsi',
                'rules' => 'trim|required'
            ]
        ];
    }

    //menampilkan data tberita berdasarkan id tberita
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["idberita" => $id])->row();
        //query diatas seperti halnya query pada mysql 
        //select * from tberita where idberita='$id' 
    }

    //menampilkan semua data tberita
    public function getAll()
    {
        $this->db->from($this->table);
        $this->db->order_by("idberita", "desc");
        $query = $this->db->get();
        return $query->result();
        //fungsi diatas seperti halnya query 
        //select * from tberita order by idberita desc
    }

    //menyimpan data tberita
    public function save()
    {
        $data = array(
            "judul" => $this->input->post('judul'),
            "link" => $this->input->post('link'),
            "deskripsi" => $this->input->post('deskripsi')
        );
        return $this->db->insert($this->table, $data);
    }

    //edit data tberita
    public function update()
    {
        $data = array(
            "judul" => $this->input->post('judul'),
            "link" => $this->input->post('link'),
            "deskripsi" => $this->input->post('deskripsi')
        );
        return $this->db->update($this->table, $data, array('idberita' => $this->input->post('idberita')));
    }

    //hapus data tberita
    public function delete($id)
    {
        return $this->db->delete($this->table, array("idberita" => $id));
    }
}
