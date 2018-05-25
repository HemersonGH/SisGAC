<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professor extends CI_Controller {

	/**
	* Index Page for this controller.
	*
	* Maps to the following URL
	* 		http://example.com/index.php/welcome
	*	- or -
	* 		http://example.com/index.php/welcome/index
	*	- or -
	* Since this controller is set as the default controller in
	* config/routes.php, it's displayed at http://example.com/
	*
	* So any other public methods not prefixed with an underscore will
	* map to /index.php/welcome/<method_name>
	* @see https://codeigniter.com/user_guide/general/urls.html
	*/

	public function verificar_sessao()
	{
		if (!($this->session->userdata('logado'))) {
			redirect('usuario');
		}
	}

	public function index($indice=null)
	{
		$this->verificar_sessao();

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');

		if ($indice == 1) {
			$data['msg'] = "Dados atualizados com sucesso.";
			$this->load->view('includes/msg_sucesso_login', $data);
		} else if ($indice == 2) {
			$data['msg'] = "Não foi possível atualizar os dados.";
			$this->load->view('includes/msg_erro_login', $data);
		}

		$this->load->view('professor/menu_lateral');
		$this->load->view('professor/pagina_principal');
		$this->load->view('includes/html_footer');
	}

}
