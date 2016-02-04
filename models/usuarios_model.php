<?php
//require_once APPPATH.'models/Generic_Dataset_Model.php';

class Usuarios_model extends CI_Model
{
    function __construct()
    {
        parent :: __construct();
        $this->load->database();
    }

    function buscar_en_BD($usuario, $password)
    {
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('id_usuario', $usuario);
        $this->db->where('contrasenia', $password);
        $query = $this->db->get();

        if ($query->num_rows() == 0)
        {
            return FALSE;
        }else
        {
            return $query->row();
        }
     }

     function cambiar_contrasenia($usuario, $password)
    {
        $this->db->select('contrasenia');
        $this->db->from('usuarios');
        $this->db->where('id_usuario', $usuario);
        $this->db->where('contrasenia', $password);
        $query = $this->db->get();

        if ($query->num_rows() == 0)
        {
            return FALSE;
        }else
        {
            return $query->row();
        }
    }
}

