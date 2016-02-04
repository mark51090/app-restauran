<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cambiar_password extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        /* Standard Libraries */
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('encrypt');
        $this->load->library('form_validation');
        /* ------------------ */
        $this->load->model('usuarios_model');
        $this->id_usuario = $this->session->userdata('id_usuario');
    }

    function index()
    {   $this->form_validation->set_rules('passactual','Contraseña actual','trim|required|min_length[5]');
        $this->form_validation->set_rules('password','Contraseña','trim|required|min_length[5]|matches[passconf]');
        $this->form_validation->set_rules('passconf','Confirmar contraseña','trim|required|min_length[5]');
        $pass_actual = $this->encrypt->sha1($_POST['passactual']);

        if (($this->form_validation->run() == FALSE) || ($this->usuarios_model->cambiar_contrasenia($this->id_usuario, $pass_actual) == FALSE))
            {   
                $datos['mensaje'] ="Verifique que la contraseña actual sea correcta.".'<br>'."Las nuevas contraseñas deben coincidir y tener un mínimo  de 5 carácteres."; 

                if($this->session->userdata('logged_in')&& ($this->session->userdata('tipo_usuario') == 'Administrador'))
                    {
                       
                        $datos_plantilla['contenido'] = $this->load->view('success_login',$datos,TRUE);
                        $this->load->view('plantilla_admin', $datos_plantilla);

                    }
                        else if($this->session->userdata('logged_in')&& ($this->session->userdata('tipo_usuario') == 'Administrador'))
                            {
                                $datos_plantilla['contenido'] = $this->load->view('success_login',$datos,TRUE);
                                $this->load->view('plantilla_caja', $datos_plantilla);

                            }
                }else
                {


                    extract($_POST);
                    $nuevo_pass = array(
                                'contrasenia' => $this->encrypt->sha1($password)
                               );
                    $this->db->where('id_usuario', $this->id_usuario);
                    $this->db->update('usuarios', $nuevo_pass);

                    $datos['mensaje'] = "La contraseña ha sido cambiada con éxito.";
                    $datos_plantilla['contenido'] = $this->load->view('success_cambio_pass', $datos, true);
                    if($this->session->userdata('logged_in')&& ($this->session->userdata('tipo_usuario') == 'Administrador'))
                    {$this->load->view('plantilla_admin', $datos_plantilla); }
                        else if($this->session->userdata('logged_in')&& ($this->session->userdata('tipo_usuario') == 'Administrador'))
                            {$this->load->view('plantilla_caja', $datos_plantilla); }

                }
    }
}
