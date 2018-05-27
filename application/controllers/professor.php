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

		switch ($indice)
		{
			case 1:
			$data['msg'] = "Dados atualizados com sucesso.";
			$this->load->view('includes/msg_sucesso_login', $data);
			break;

			case 2:
			$data['msg'] = "Não foi possível atualizar os dados.";
			$this->load->view('includes/msg_erro_login', $data);
			break;

			case 3:
			$data['msg'] = "Disciplina criada com sucesso.";
			$this->load->view('includes/msg_sucesso', $data);
			break;

			case 4:
			$data['msg'] = "Não foi possível criar a disciplina.";
			$this->load->view('includes/msg_erro', $data);
			break;

		}

		$this->load->view('professor/menu_lateral');
		$this->load->view('professor/disciplinas');
		$this->load->view('includes/html_footer');
	}

	public function criar_disciplina()
	{
		$this->verificar_sessao();

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('professor/menu_lateral');
		$this->load->view('professor/criar_disciplina');
		$this->load->view('includes/html_footer');
	}

	public function cadastrar_disciplina()
	{
		$this->verificar_sessao();

		$data['id_Professor'] = $this->input->post('idProfessor');
		$data['nome_disciplina'] = $this->input->post('nome_disciplina');
		$data['codigo_disciplina'] = $this->input->post('codigo_disciplina');
		$data['descricao_disciplina'] = $this->input->post('descricao_disciplina');

		$this->load->model('professor_model','professor');

		if ($this->professor->cadastrar_disciplina($data)) {
			redirect('professor/3');
		} else {
			redirect('professor/4');
		}
	}

}
