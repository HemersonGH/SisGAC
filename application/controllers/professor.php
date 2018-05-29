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

		$disciplina['id_Professor'] = $this->input->post('idProfessor');
		$disciplina['nome_disciplina'] = $this->input->post('nome_disciplina');
		$disciplina['codigo_disciplina'] = $this->input->post('codigo_disciplina');
		// $disciplina['status'] = $this->input->post('status');
		$disciplina['descricao_disciplina'] = $this->input->post('descricao_disciplina');

		if ($this->professor->cadastrar_disciplina($disciplina)) {
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

		if ($this->input->post('status') == "NULL") {
			$disciplina['status'] = null;
		} else {
			$disciplina['status'] = $this->input->post('status');
		}

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

	public function adicionar_iteracao($idDisciplina=null)
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

	public function criar_iteracao($idDisciplina=null)
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

	public function atividades($indice=null)
	{
		$this->verificar_sessao();

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('professor/menu_lateral');

		$this->load->model('professor_model','professor');

		$conjunto_atividades['conjunto_atividades'] = $this->professor->get_Conjuntos($this->session->userdata('idUsuario'));

		switch ($indice) {
			case 1:
			$data['msg'] = "Conjunto cadastrado com sucesso.";
			$this->load->view('includes/msg_sucesso', $data);
			break;

			case 2:
			$data['msg'] = "Não foi possível cadastrar o conjunto.";
			$this->load->view('includes/msg_erro', $data);
			break;

			case 3:
			$data['msg'] = "Conjunto atualizado com sucesso.";
			$this->load->view('includes/msg_sucesso', $data);
			break;

			case 4:
			$data['msg'] = "Não foi possível atualizar o conjunto.";
			$this->load->view('includes/msg_erro', $data);
			break;

		}

		$this->load->view('professor/conjuntos_atividades', $conjunto_atividades);
		$this->load->view('includes/html_footer');
	}

	public function cadastrar_conjunto_atividades()
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		$data['id_professor'] = $this->input->post('id_professor');
		$data['nome_conjunto'] = $this->input->post('nome_conjunto');

		if ($this->professor->cadastrar_conjunto_atividades($data)) {
			redirect('professor/atividades/1');
		} else {
			redirect('professor/atividades/2');
		}
	}

	public function salvar_atualizacao_conjunto_atividades()
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		$conjunto_atividade['id_professor'] = $this->input->post('id_professor');
		$conjunto_atividade['nome_conjunto'] = $this->input->post('nome_conjunto');

		if ($this->professor->salvar_atualizacao_conjunto_atividades($id_conjunto_atividade, $conjunto_atividade)) {
			redirect('professor/atividades/3');
		} else {
			redirect('professor/atividades/4');
		}
	}

	public function excluir_conjunto_atividades($id_conjunto_atividade=null)
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		if ($this->professor->excluir_conjunto_atividades($id_conjunto_atividade)) {
			redirect('professor/atividades/5');;
		} else {
			redirect('professor/atividades/6');
		}
	}

	public function atividades_conjunto($idConjuntoAtividade=null, $indice=null)
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('professor/menu_lateral');

		$conjunto_atividade['conjunto_atividade'] = $this->professor->get_Conjunto($idConjuntoAtividade);
		$atividades['atividades'] = $this->professor->get_Atividades($idConjuntoAtividade);

		switch ($indice) {
			case 1:
			$data['msg'] = "Atividade cadastrada com sucesso.";
			$this->load->view('includes/msg_sucesso', $data);
			break;

			case 2:
			$data['msg'] = "Não foi possível cadastrar a atividade.";
			$this->load->view('includes/msg_erro', $data);
			break;

			case 3:
			$data['msg'] = "Atividade atualizada com sucesso.";
			$this->load->view('includes/msg_sucesso', $data);
			break;

			case 4:
			$data['msg'] = "Não foi possível atualizar a atividade.";
			$this->load->view('includes/msg_erro', $data);
			break;

			case 5:
			$data['msg'] = "Atividade excluída com sucesso.";
			$this->load->view('includes/msg_sucesso', $data);
			break;

			case 6:
			$data['msg'] = "Não foi possível excluír a atividade.";
			$this->load->view('includes/msg_erro', $data);
			break;
		}

		$this->load->view('professor/cabecalho_atividade', $conjunto_atividade);
		$this->load->view('professor/atividades_conjunto', $atividades);
		$this->load->view('includes/html_footer');
	}

	public function adicionar_atividade($id_conjunto_atividade=null)
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		$conjunto_atividade['conjunto_atividade'] = $this->professor->get_Conjunto($id_conjunto_atividade);

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('professor/menu_lateral');
		$this->load->view('professor/criar_atividade', $conjunto_atividade);
		$this->load->view('includes/html_footer');
	}

	public function cadastrar_atividades()
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		$atividade['nome_atividade'] = $this->input->post('nome_atividade');
		$atividade['descricao_atividade'] = $this->input->post('descricao_atividade');
		$atividade['prazo_entrega'] = $this->input->post('data');
		$atividade['idConjuntoAtividade'] = $this->input->post('id_conjunto');
		$atividade['id_professor'] = $this->input->post('idProfessor');
		$atividade['pontos'] = $this->input->post('valor_atividade');

		if ($this->professor->cadastrar_atividades($atividade)) {
			redirect('professor/atividades_conjunto/'.$this->input->post('id_conjunto').'/1');
		} else {
			redirect('professor/atividades_conjunto/'.$this->input->post('id_conjunto').'/2');
		}
	}

	public function atualizar_atividade($idAtividade=null)
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		$atividade['atividade'] = $this->professor->get_Atividade($idAtividade);

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('professor/menu_lateral');
		$this->load->view('professor/editar_atividade', $atividade);
		$this->load->view('includes/html_footer');
	}


	public function salvar_atualizacao_atividade()
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		$atividade['idAtividade'] = $this->input->post('idAtividade');
		$atividade['nome_atividade'] = $this->input->post('nome_atividade');
		$atividade['descricao_atividade'] = $this->input->post('descricao_atividade');
		$atividade['prazo_entrega'] = $this->input->post('data');
		$atividade['idConjuntoAtividade'] = $this->input->post('id_conjunto');
		$atividade['id_professor'] = $this->input->post('idProfessor');
		$atividade['pontos'] = $this->input->post('valor_atividade');

		if ($this->professor->salvar_atualizacao_atividade($this->input->post('idAtividade'), $atividade)) {
			redirect('professor/atividades_conjunto/'.$this->input->post('id_conjunto').'/3');
		} else {
			redirect('professor/atividades_conjunto/'.$this->input->post('id_conjunto').'/4');
		}
	}

	public function excluir_atividades($idAtividade=null, $idConjuntoAtividade=null)
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		if ($this->professor->excluir_atividade($idAtividade)) {
			redirect('professor/atividades_conjunto/'.$idConjuntoAtividade.'/5');
		} else {
			redirect('professor/atividades_conjunto/'.$idConjuntoAtividade	.'/6');
		}
	}

	public function get_Qtd_Atividades($idConjuntoAtividade=null)
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		return ($this->professor->get_Qtd_Atividades($idConjuntoAtividade))[0]->total;
	}

	public function get_Qtd_Conjunto_Atividades($idDisciplina=null)
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		return ($this->professor->get_Qtd_Conjunto_Atividades($idDisciplina))[0]->total;
	}

}
