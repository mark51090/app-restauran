<?php
Class Reconocimientos extends CI_controller{

        function __construct()
        {
            parent::__construct();

            /* Standard Libraries */
            $this->load->database();
            $this->load->helper('url');
            /* ------------------ */
            $this->load->library('grocery_CRUD');
            $this->noPersonal = $this->session->userdata('noPersonal');
        }

        function _example_output($output = null)
        {
            $datos_plantilla['titulo'] = "Reconocimientos otorgados";
            $datos_plantilla['contenido'] = $this->load->view('output_view.php',$output, TRUE);
            $this->load->view('plantilla_view', $datos_plantilla);

        }

        function control()
        {
             if ($this->session->userdata('logged_in') == TRUE)
            {
                $crud = new grocery_CRUD();

                $crud->where('Academico_noPersonal',$this->noPersonal);
                $crud->set_table('reconocimiento');
                $crud->unset_columns('Academico_noPersonal');
                $crud->display_as('Academico_noPersonal','Núm. Personal');
                $crud->set_subject('Reconocimiento');
                $crud->required_fields('nombre_reconocimiento','institucion_otorgante','tipo','fecha');
                $crud->field_type('Academico_noPersonal', 'hidden', $this->noPersonal);
                $crud->set_field_upload('documento', 'assets/uploads/academicos/'.$this->noPersonal);
                $crud->set_rules('documento','Documento','max_length[26]');
                $crud->order_by('fecha','Desc');

                $output = $crud->render();
                $output->titulo_tabla = '<div class="alert alert-success"><h4>Reconocimientos</h4></div>';
                $this->_example_output($output);
            }else
            {
                redirect('login');
            }
        }

}
 /*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */