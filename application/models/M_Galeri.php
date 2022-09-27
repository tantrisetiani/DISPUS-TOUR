<?php
class M_Galeri extends CI_Model
{

    public function get_data_db()
    {
        $this->db->order_by('id_galeri', 'asc');
        return $this->db->get('galeri')->result_array();
    }

    public function add_data($data, $tabel)
    {
        $this->db->insert($tabel, $data);
    }

    public function getDataById($id)
    {
        return $this->db->get_where('galeri', ['id_galeri' => $id])->row_array();
    }
    public function update_data($id)
    {
        $data['galeri'] = $this->db->get_where('galeri', ['id_galeri' => $id])->row_array();

        // cek jika ada foto galeri yang di upload
        $upload_image = $_FILES['foto_galeri'];

        if ($upload_image) {
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/Galeri';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_galeri')) {
                $old_image = $data['galeri']['foto_galeri'];
                $path = './assets/img/galeri/';

                if ($old_image != 'default.jpeg') {
                    unlink(FCPATH . $path . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('foto_galeri', $new_image);
            } else {
                $this->upload->display_errors();
            }
        }
        $data = [
            "keterangan_galeri" => $this->input->post('keterangan_galeri', true),
        ];
        $this->db->where('id_galeri', $this->input->post('id_galeri'));
        $this->db->update('galeri', $data);
    }

    public function delete_data($id)
    {
        $this->db->where($id);
        return $this->db->delete('galeri');
    }
}
