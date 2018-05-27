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
		$this->load->model('professor_model','professor');

		$disciplinas['disciplinas'] = $this->professor->get_Disciplinas($this->session->userdata('idUsuario'));

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

			case 5:
			$data['msg'] = "Disciplina atualizada com sucesso.";
			$this->load->view('includes/msg_sucesso', $data);
			break;

			case 6:
			$data['msg'] = "Não foi possível atualizar a disciplina.";
			$this->load->view('includes/msg_erro', $data);
			break;

			case 7:
			$data['msg'] = "Disciplina excluída com sucesso.";
			$this->load->view('includes/msg_sucesso', $data);
			break;

			case 8:
			$data['msg'] = "Não foi possível excluir a disciplina.";
			$this->load->view('includes/msg_erro', $data);
			break;

		}

		$this->load->view('professor/menu_lateral');
		$this->load->view('professor/disciplinas', $disciplinas);
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

		$this->load->model('professor_model','professor');

		$data['id_Professor'] = $this->input->post('idProfessor');
		$data['nome_disciplina'] = $this->input->post('nome_disciplina');
		$data['codigo_disciplina'] = $this->input->post('codigo_disciplina');
		$data['descricao_disciplina'] = $this->input->post('descricao_disciplina');

		if ($this->professor->cadastrar_disciplina($data)) {
			redirect('professor/3');
		} else {
			redirect('professor/4');
		}
	}

	public function atualizar_disciplina($idDisciplina=null)
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		$disciplina['disciplina'] = $this->professor->get_Disciplina($idDisciplina);

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('professor/menu_lateral');
		$this->load->view('professor/editar_disciplina', $disciplina);
		$this->load->view('includes/html_footer');
	}

	public function salvar_atualizacao_disciplina()
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		$idDisciplina = $this->input->post('idDisciplina');
		$disciplina['nome_disciplina'] = $this->input->post('nome_disciplina');
		$disciplina['codigo_disciplina'] = $this->input->post('codigo_disciplina');
		$disciplina['descricao_disciplina'] = $this->input->post('descricao_disciplina');

		if ($this->professor->salvar_atualizacao_disciplina($idDisciplina, $disciplina)) {
			redirect('professor/5');
		} else {
			redirect('professor/6');
		}
	}

	public function excluir_disciplina($idDisciplina=null)
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		if ($this->professor->excluir_disciplina($idDisciplina)) {
			redirect('professor/7');
		} else {
			redirect('professor/8');
		}
	}

	public function adicionar_atividade($idDisciplina=null)
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		$disciplina['disciplina'] = $this->professor->get_Disciplina($idDisciplina);

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('professor/menu_lateral');
		$this->load->view('professor/adicionar_atividade', $disciplina);
		$this->load->view('includes/html_footer');
	}


}
