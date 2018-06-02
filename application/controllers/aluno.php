<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aluno extends CI_Controller {

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
		$this->load->model('aluno_model','aluno');

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');

		$disciplinas_matriculado['disciplinas_matriculado'] = $this->aluno->get_Disciplinas_Matriculado($this->session->userdata('idUsuario'));

		switch ($indice) {
			case 1:
			$msg['msg'] = "Dados atualizados com sucesso.";
			$this->load->view('includes/msg_sucesso', $msg);
			break;

			case 2:
			$msg['msg'] = "Não foi possível atualizar os dados.";
			$this->load->view('includes/msg_erro', $msg);
			break;

		}

		$this->load->view('aluno/menu_lateral');
		$this->load->view('aluno/disciplinas', $disciplinas_matriculado);
		$this->load->view('includes/html_footer');
	}

	public function get_Nome_Professor($idProfessor=null)
	{
		$this->verificar_sessao();
		$this->load->model('aluno_model','aluno');

		$this->aluno->get_Nome_Professor($idProfessor);
	}

	public function get_Nome_Disciplina($idDisciplina=null)
	{
		$this->verificar_sessao();
		$this->load->model('aluno_model','aluno');

		$this->aluno->get_Nome_Disciplina($idDisciplina);
	}

	public function get_Status_Disciplina($idDisciplina=null)
	{
		$this->verificar_sessao();
		$this->load->model('aluno_model','aluno');

		$this->aluno->get_Status_Disciplina($idDisciplina);
	}

}
