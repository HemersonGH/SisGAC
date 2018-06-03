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
			$this->session->sess_destroy();
			
			redirect('usuario/login');
		}
	}

	public function index($indice=null)
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		$disciplinas['disciplinas'] = $this->professor->get_Disciplinas($this->session->userdata('idUsuario'));
		$quantidadeSolicitacoesPendentes['quantidadeSolicitacoesPendentes'] =	$this->professor->get_Solicitacoes($this->session->userdata('idUsuario'));

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('professor/menu_lateral', $quantidadeSolicitacoesPendentes);

		switch ($indice)
		{
			case 1:
			$msg['msg'] = "Dados atualizados com sucesso.";
			$this->load->view('includes/msg_sucesso', $msg);
			break;

			case 2:
			$msg['msg'] = "Não foi possível atualizar os dados.";
			$this->load->view('includes/msg_erro', $msg);
			break;

			case 3:
			$msg['msg'] = "Disciplina cadastrada com sucesso.";
			$this->load->view('includes/msg_sucesso', $msg);
			break;

			case 4:
			$msg['msg'] = "Não foi possível cadastrar a disciplina.";
			$this->load->view('includes/msg_erro', $msg);
			break;

			case 5:
			$msg['msg'] = "Disciplina atualizada com sucesso.";
			$this->load->view('includes/msg_sucesso', $msg);
			break;

			case 6:
			$msg['msg'] = "Não foi possível atualizar a disciplina.";
			$this->load->view('includes/msg_erro', $msg);
			break;

			case 7:
			$msg['msg'] = "Disciplina excluída com sucesso.";
			$this->load->view('includes/msg_sucesso', $msg);
			break;

			case 8:
			$msg['msg'] = "Não foi possível excluir a disciplina.";
			$this->load->view('includes/msg_erro', $msg);
			break;
		}

		$this->load->view('professor/disciplinas', $disciplinas);
		$this->load->view('includes/html_footer');
	}

	public function criar_disciplina()
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		$quantidadeSolicitacoesPendentes['quantidadeSolicitacoesPendentes'] =	$this->professor->get_Solicitacoes($this->session->userdata('idUsuario'));

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('professor/menu_lateral', $quantidadeSolicitacoesPendentes);
		$this->load->view('professor/criar_disciplina');
		$this->load->view('includes/html_footer');
	}

	public function cadastrar_disciplina()
	{
		$this->verificar_sessao();

		$this->load->model('professor_model','professor');

		// $disciplina['status'] = $this->input->post('status');
		$disciplina['id_Professor'] = $this->input->post('idProfessor');
		$disciplina['nome_disciplina'] = $this->input->post('nome_disciplina');
		$disciplina['codigo_disciplina'] = $this->input->post('codigo_disciplina');
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
		$quantidadeSolicitacoesPendentes['quantidadeSolicitacoesPendentes'] =	$this->professor->get_Solicitacoes($this->session->userdata('idUsuario'));

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('professor/menu_lateral', $quantidadeSolicitacoesPendentes);
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
		$disciplina['status_disciplina'] = $this->input->post('status');

		$disciplina['descricao_disciplina'] = $this->input->post('descricao_disciplina');

		if ($this->professor->salvar_atualizacao_disciplina($idDisciplina, $disciplina)) {
			redirect('professor/5');
		} else {
			redirect('professor/6');
		}
	}

	public function excluir_disciplina()
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		$idDisciplina = $this->input->post('idDisciplina');

		if ($this->professor->excluir_disciplina($idDisciplina)) {
			redirect('professor/7');
		} else {
			redirect('professor/8');
		}
	}

	public function adicionar_conjunto_atividade($idDisciplina=null, $indice=null)
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		$disciplina['disciplina'] = $this->professor->get_Disciplina($idDisciplina);
		$conjunto_atividades_sem_disciplina['conjunto_atividades_sem_disciplina'] = $this->professor->get_Conjuntos_Sem_Disciplinas($this->session->userdata('idUsuario'));
		$conjunto_atividades_da_disciplina['conjunto_atividades_da_disciplina'] = $this->professor->get_Conjuntos_Da_Disciplinas($this->session->userdata('idUsuario'), $idDisciplina);
		$quantidadeSolicitacoesPendentes['quantidadeSolicitacoesPendentes'] =	$this->professor->get_Solicitacoes($this->session->userdata('idUsuario'));

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('professor/menu_lateral', $quantidadeSolicitacoesPendentes);

		switch ($indice) {
			case 1:
			$msg['msg'] = "Conjunto adicionado para a disciplina com sucesso.";
			$this->load->view('includes/msg_sucesso', $msg);
			break;

			case 2:
			$msg['msg'] = "Não foi possível adicionar o conjunto para a disciplina.";
			$this->load->view('includes/msg_erro', $msg);
			break;

			case 3:
			$msg['msg'] = "Conjunto removido da disciplina com sucesso.";
			$this->load->view('includes/msg_sucesso', $msg);
			break;

			case 4:
			$msg['msg'] = "Não foi possível remover o conjunto da disciplina.";
			$this->load->view('includes/msg_erro', $msg);
			break;
		}

		$this->load->view('professor/cabecalho_disciplina', $disciplina);
		$this->load->view('professor/adicionar_conjunto_atividade', $conjunto_atividades_sem_disciplina);
		$this->load->view('professor/conjuntos_atividades_disciplina', $conjunto_atividades_da_disciplina);
		$this->load->view('includes/html_footer');
	}

	public function cadastrar_conjAtiv_disciplina()
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		$conjunto_atividade['id_disciplina_conjunto'] = $this->input->post('idDisciplina');
		$conjunto_atividade['idConjuntoAtividade'] = $this->input->post('idConjuntoAtividade');

		if ($this->professor->cadastrar_conjAtiv_disciplina($conjunto_atividade)) {
			redirect('professor/adicionar_conjunto_atividade/'.$conjunto_atividade['id_disciplina_conjunto'].'/1');
		} else {
			redirect('professor/adicionar_conjunto_atividade/'.$conjunto_atividade['id_disciplina_conjunto'].'/2');
		}
	}

	public function remove_conjunto_atividade_disciplina()
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		$conjunto_atividade = $this->professor->get_Conjunto($this->input->post('idConjuntoAtividadeRemover'));
		$conjunto_atividade[0]->id_disciplina_conjunto = null;

		if ($this->professor->remove_conjunto_atividade_disciplina($this->input->post('idConjuntoAtividadeRemover'), $conjunto_atividade[0])) {
			redirect('professor/adicionar_conjunto_atividade/'.$this->input->post('idDisciplinaRemover').'/3');
		} else {
			redirect('professor/adicionar_conjunto_atividade/'.$this->input->post('idDisciplinaRemover').'/4');
		}
	}

	public function atividades($indice=null)
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		$quantidadeSolicitacoesPendentes['quantidadeSolicitacoesPendentes'] =	$this->professor->get_Solicitacoes($this->session->userdata('idUsuario'));

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('professor/menu_lateral', $quantidadeSolicitacoesPendentes);

		$conjunto_atividades['conjunto_atividades'] = $this->professor->get_Conjuntos($this->session->userdata('idUsuario'));

		switch ($indice) {
			case 1:
			$msg['msg'] = "Conjunto cadastrado com sucesso.";
			$this->load->view('includes/msg_sucesso', $msg);
			break;

			case 2:
			$msg['msg'] = "Não foi possível cadastrar o conjunto.";
			$this->load->view('includes/msg_erro', $msg);
			break;

			case 3:
			$msg['msg'] = "Conjunto atualizado com sucesso.";
			$this->load->view('includes/msg_sucesso', $msg);
			break;

			case 4:
			$msg['msg'] = "Não foi possível atualizar o conjunto.";
			$this->load->view('includes/msg_erro', $msg);
			break;

			case 5:
			$msg['msg'] = "Conjunto excluído com sucesso.";
			$this->load->view('includes/msg_sucesso', $msg);
			break;

			case 6:
			$msg['msg'] = "Não foi possível excluír o conjunto.";
			$this->load->view('includes/msg_erro', $msg);
			break;
		}

		$this->load->view('professor/conjuntos_atividades', $conjunto_atividades);
		$this->load->view('includes/html_footer');
	}

	public function cadastrar_conjunto_atividades()
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		$dadosProfessorConjunto['id_professor'] = $this->session->userdata('idUsuario');
		$dadosProfessorConjunto['nome_conjunto'] = $this->input->post('nome_conjunto');

		if ($this->professor->cadastrar_conjunto_atividades($dadosProfessorConjunto)) {
			redirect('professor/atividades/1');
		} else {
			redirect('professor/atividades/2');
		}
	}

	public function salvar_atualizacao_conjunto_atividades()
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		$conjunto_atividade['id_professor'] = $this->session->userdata('idUsuario');
		$conjunto_atividade['nome_conjunto'] = $this->input->post('idNomeConjuntoEditar');
		$conjunto_atividade['idConjuntoAtividade'] = $this->input->post('idConjuntoAtividadeEditar');

		if ($this->professor->salvar_atualizacao_conjunto_atividades($this->input->post('idConjuntoAtividadeEditar'), $conjunto_atividade)) {
			redirect('professor/atividades/3');
		} else {
			redirect('professor/atividades/4');
		}
	}

	public function excluir_conjunto_atividades()
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		if ($this->professor->excluir_conjunto_atividades($this->input->post('idConjuntoAtividadeExcluir'))) {
			redirect('professor/atividades/5');;
		} else {
			redirect('professor/atividades/6');
		}
	}

	public function atividades_conjunto($idConjuntoAtividade=null, $indice=null)
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		$quantidadeSolicitacoesPendentes['quantidadeSolicitacoesPendentes'] =	$this->professor->get_Solicitacoes($this->session->userdata('idUsuario'));

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('professor/menu_lateral', $quantidadeSolicitacoesPendentes);

		$conjunto_atividade['conjunto_atividade'] = $this->professor->get_Conjunto($idConjuntoAtividade);
		$atividades['atividades'] = $this->professor->get_Atividades($idConjuntoAtividade);

		switch ($indice) {
			case 1:
			$msg['msg'] = "Atividade cadastrada com sucesso.";
			$this->load->view('includes/msg_sucesso', $msg);
			break;

			case 2:
			$msg['msg'] = "Não foi possível cadastrar a atividade.";
			$this->load->view('includes/msg_erro', $msg);
			break;

			case 3:
			$msg['msg'] = "Atividade atualizada com sucesso.";
			$this->load->view('includes/msg_sucesso', $msg);
			break;

			case 4:
			$msg['msg'] = "Não foi possível atualizar a atividade.";
			$this->load->view('includes/msg_erro', $msg);
			break;

			case 5:
			$msg['msg'] = "Atividade excluída com sucesso.";
			$this->load->view('includes/msg_sucesso', $msg);
			break;

			case 6:
			$msg['msg'] = "Não foi possível excluír a atividade.";
			$this->load->view('includes/msg_erro', $msg);
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
		$quantidadeSolicitacoesPendentes['quantidadeSolicitacoesPendentes'] =	$this->professor->get_Solicitacoes($this->session->userdata('idUsuario'));

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('professor/menu_lateral', $quantidadeSolicitacoesPendentes);
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
		$quantidadeSolicitacoesPendentes['quantidadeSolicitacoesPendentes'] =	$this->professor->get_Solicitacoes($this->session->userdata('idUsuario'));

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('professor/menu_lateral', $quantidadeSolicitacoesPendentes);
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

	public function excluir_atividade()
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		if ($this->professor->excluir_atividade($this->input->post('idAtividadeExcluir'))) {
			redirect('professor/atividades_conjunto/'.$this->input->post('idConjuntoAtividadeExcluir').'/5');
		} else {
			redirect('professor/atividades_conjunto/'.$this->input->post('idConjuntoAtividadeExcluir').'/6');
		}
	}

	public function get_Qtd_Atividades($idConjuntoAtividade=null)
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		$this->professor->get_Qtd_Atividades($idConjuntoAtividade);
		// Estava implementado desse jeito antes, a view chamava a model direto
		// $this->professor->get_Qtd_Conjunto_Atividades($disciplina->idDisciplina);
	}

	public function get_Qtd_Conjunto_Atividades($idDisciplina=null)
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		$this->professor->get_Qtd_Conjunto_Atividades($idDisciplina);
		// Estava implementado desse jeito antes, a view chamava a model direto
		// $this->professor->get_Qtd_Atividades($conjunto_atividade->idConjuntoAtividade);
	}

	public function visualizar_disciplina($idDisciplina=null)
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		$disciplina['disciplina'] = $this->professor->get_Disciplina($idDisciplina);
		$conjunto_atividades_da_disciplina['conjunto_atividades_da_disciplina'] = $this->professor->get_Conjuntos_Da_Disciplinas($this->session->userdata('idUsuario'), $idDisciplina);
		$quantidadeSolicitacoesPendentes['quantidadeSolicitacoesPendentes'] =	$this->professor->get_Solicitacoes($this->session->userdata('idUsuario'));

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('professor/menu_lateral', $quantidadeSolicitacoesPendentes);
		$this->load->view('professor/cabecalho_disciplina', $disciplina);
		$this->load->view('professor/visualizar_disciplina', $conjunto_atividades_da_disciplina);
		$this->load->view('includes/html_footer');
	}

	public function get_Atividades($id_conjunto_atividade=null)
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		$this->professor->get_Atividades($id_conjunto_atividade);
	}

	public function solicitacoes_disciplinas($indice=null)
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		$solicitacoes_disciplinas['solicitacoes_disciplinas'] = $this->professor->get_Solicitacoes_Disciplinas($this->session->userdata('idUsuario'));
		$quantidadeSolicitacoesPendentes['quantidadeSolicitacoesPendentes'] =	$this->professor->get_Solicitacoes($this->session->userdata('idUsuario'));

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('professor/menu_lateral', $quantidadeSolicitacoesPendentes);

		switch ($indice) {
			case 1:
			$msg['msg'] = "Solicitação avaliada com sucesso, agora o usuário poderá reliazar as atividades dessa disciplina.";
			$this->load->view('includes/msg_sucesso', $msg);
			break;

			case 2:
			$msg['msg'] = "Não foi possível avaliar a solicitação.";
			$this->load->view('includes/msg_erro', $msg);
			break;

			case 3:
			$msg['msg'] = "Solicitação excluída com sucesso.";
			$this->load->view('includes/msg_sucesso', $msg);
			break;

			case 4:
			$msg['msg'] = "Não foi possível excluída a solicitação.";
			$this->load->view('includes/msg_erro', $msg);
			break;

			case 5:
			$msg['msg'] = "Solicitação avaliada com sucesso, o usuário não poderá reliazar as atividades dessa disciplina.";
			$this->load->view('includes/msg_sucesso', $msg);
			break;

			case 6:
			$msg['msg'] = "O aluno já está participando dessa disciplina.";
			$this->load->view('includes/msg_alerta', $msg);
			break;
		}

		$this->load->view('professor/solicitacoes_disciplinas', $solicitacoes_disciplinas);
		$this->load->view('includes/html_footer');
	}

	public function get_Nome_Aluno($idAluno=null)
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		$this->professor->get_Nome_Aluno($idAluno);
	}

	public function get_Nome_Disciplina($idDisciplina=null)
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		$this->professor->get_Nome_Disciplina($idDisciplina);
	}

	public function excluir_solicitacao()
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		if ($this->professor->excluir_solicitacao($this->input->post('idSolicitacao'))) {
			redirect('professor/solicitacoes_disciplinas/3');
		} else {
			redirect('professor/solicitacoes_disciplinas/4');
		}
	}

	public function avaliar_solicitacao($idSolicitacao=null)
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		$solicitacao['solicitacao'] = $this->professor->get_Solicitacao($idSolicitacao);
		$quantidadeSolicitacoesPendentes['quantidadeSolicitacoesPendentes'] =	$this->professor->get_Solicitacoes($this->session->userdata('idUsuario'));

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('professor/menu_lateral', $quantidadeSolicitacoesPendentes);
		$this->load->view('professor/avaliar_solicitacao', $solicitacao);
		$this->load->view('includes/html_footer');
	}

	public function salvar_avaliacao_solicitacao()
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		$solicitacao_avaliada['idSolicitacao'] = $this->input->post('idSolicitacao');
		$solicitacao_avaliada['status_solicitacao'] = $this->input->post('status_solicitacao');
		$solicitacao_avaliada['justificativa_professor'] = $this->input->post('justificativa_professor');

		$solicitacao_anterior = $this->professor->get_Solicitacao($this->input->post('idSolicitacao'));

		if ($this->professor->salvar_avaliacao_solicitacao($this->input->post('idSolicitacao'), $solicitacao_avaliada)) {
			$participacao_disciplina['idAluno'] = $solicitacao_anterior[0]->idAluno;
			$participacao_disciplina['idDisciplina'] = $solicitacao_anterior[0]->idDisciplina;
			$participacao_disciplina['idProfessor'] = $this->session->userdata('idUsuario');
			$status_avaliacao;

			$verifica_participacao['participacao_disciplina'] = $this->professor->get_Participacao($participacao_disciplina);

			if (count($verifica_participacao['participacao_disciplina']) == 1) {
				redirect('professor/solicitacoes_disciplinas/6');
			} else {
				if ($solicitacao_anterior[0]->status_solicitacao == 1) {
					if ($this->input->post('status_solicitacao') == 2) {
						$participacao_disciplina['status_participacao'] = 1;
						$status_avaliacao = 1;
					} else if ($this->input->post('status_solicitacao') == 3) {
						$participacao_disciplina['status_participacao'] = 0;
						$status_avaliacao = 5;
					}

					$this->professor->salvar_participacao_disciplina($participacao_disciplina);
				} else {
					if ($this->input->post('status_solicitacao') == 2) {
						$participacao_disciplina['status_participacao'] = 1;
						$status_avaliacao = 1;
					} else if ($this->input->post('status_solicitacao') == 3) {
						$participacao_disciplina['status_participacao'] = 0;
						$status_avaliacao = 5;
					}

					$this->professor->atualiza_participacao_disciplina($participacao_disciplina);
				}

				redirect('professor/solicitacoes_disciplinas/'.$status_avaliacao);
			}
		} else {
			redirect('professor/solicitacoes_disciplinas/2');
		}
	}

	public function get_Solicitacoes($idProfessor=null)
	{
		$this->verificar_sessao();
		$this->load->model('professor_model','professor');

		$this->professor->get_Solicitacoes($idProfessor);
	}
}
