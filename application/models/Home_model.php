<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model
{
    private $_table = "biodata";

    public $biodata_id;
    public $name;
    public $place;
    public $date;
    public $address;
    public $email;
    public $location;
    public $phone;
    public $religion;
    public $resume;
    public $sex;
    public $foto = "default.jpg";
    public $perubahan;

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["biodata_id" => $id])->row();
    }

}