<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Info_model extends CI_Model
{
    private $_table = "info";

    public $info_id;
    public $judul;
    public $icon;
    public $value;
    public $perubahan;

    public function rules()
    {
        return [
            ['field' => 'judul',
            'label' => 'Judul',
            'rules' => 'required'],

            ['field' => 'icon',
            'label' => 'Icon',
            'rules' => 'required'],

            ['field' => 'value',
            'label' => 'Value',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        $hasil = $this->db->get($this->_table);       
        return $hasil->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["info_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->info_id = uniqid();
        $this->judul   = $post["judul"];
        $this->icon    = $post["icon"];
        $this->value   = $post["value"];
        $this->db->insert($this->_table, $this);
    }

    public function update($id = null)
    {
        $post = $this->input->post();
        $this->info_id = $post["id"];
        $this->judul   = $post["judul"];
        $this->icon    = $post["icon"];
        $this->value   = $post["value"];
        $this->db->update($this->_table, $this, array('info_id' => $post['id']));        
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("info_id" => $id));
    }

}