<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        /* Standard Libraries of codeigniter are required */
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
        //$this->matricula = $this->session->userdata('matricula');
    }

    function registro_usuarios()
    {   

        if ($this->session->userdata('logged_in'))
        {
                $crud = new grocery_CRUD();
                //$crud->where('Alumno_Matricula', $this->matricula);
                $crud->set_table('usuarios');
                
                $output = $crud->render();
                $this->_example_output($output);
        } 
        else { 
                redirect('login');
                }    
    }
    

    function _example_output($output = null)
    {
        $output->titulo_tabla = "Registro de Libros";
        $output->barra_navegacion = " <li><a href='principal'> Menú principal </a></li>  |  <li> <a href='alumno'> Menú CVU </a></li>";
        $datos_plantilla['contenido'] =  $this->load->view('output_view', $output, TRUE);
        $this->load->view('plantilla_admin', $datos_plantilla);
    }
}

