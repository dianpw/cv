<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Education_model extends CI_Model
{
    private $_table = "education";

    public $education_id;
    public $nama;
    public $tahun;
    public $keterangan;
    public $perubahan;

    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'tahun',
            'label' => 'Tahun',
            'rules' => 'required'],

            ['field' => 'keterangan',
            'label' => 'Keterangan',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        $hasil = $this->db->order_by('tahun', 'DESC');
        $hasil = $this->db->get($this->_table);       
        return $hasil->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["education_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->education_id = uniqid();
        $this->nama         = $post["nama"];
        $this->tahun        = $post["tahun"];
        $this->keterangan   = $post["keterangan"];
        $this->db->insert($this->_table, $this);
    }

    public function update($id = null)
    {
        $post = $this->input->post();
        $this->education_id = $post["id"];
        $this->nama         = $post["nama"];
        $this->tahun        = $post["tahun"];
        $this->keterangan   = $post["keterangan"];
        $this->db->update($this->_table, $this, array('education_id' => $post['id']));        
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("education_id" => $id));
    }

}