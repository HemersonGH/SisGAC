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
			$this->session->sess_destroy();

			redirect('usuario/login');
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

	public function get_Cod_Disciplina($idDisciplina=null)
	{
		$this->verificar_sessao();
		$this->load->model('aluno_model','aluno');

		$this->aluno->get_Cod_Disciplina($idDisciplina);
	}

	public function get_Status_Disciplina($idDisciplina=null)
	{
		$this->verificar_sessao();
		$this->load->model('aluno_model','aluno');

		$this->aluno->get_Status_Disciplina($idDisciplina);
	}

	public function matricular_disciplina($indice=null)
	{
		$this->verificar_sessao();
		$this->load->model('aluno_model','aluno');

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');

		$disciplinas['disciplinas'] = $this->aluno->get_Disciplinas();
		$solicitacoes['solicitacoes'] = $this->aluno->get_Solicitacoes($this->session->userdata('idUsuario'));

		switch ($indice) {
			case 1:
			$msg['msg'] = "Solicitacao enviada com sucesso.";
			$this->load->view('includes/msg_sucesso', $msg);
			break;

			case 2:
			$msg['msg'] = "Não foi possível enviar a solicitação.";
			$this->load->view('includes/msg_erro', $msg);
			break;

			case 3:
			$msg['msg'] = "Solicitacao excluída com sucesso.";
			$this->load->view('includes/msg_sucesso', $msg);
			break;

			case 4:
			$msg['msg'] = "Não foi possível excluír a solicitação.";
			$this->load->view('includes/msg_erro', $msg);
			break;

			case 5:
			$msg['msg'] = "Solicitacao atualizada com sucesso.";
			$this->load->view('includes/msg_sucesso', $msg);
			break;

			case 6:
			$msg['msg'] = "Não foi possível atualizar a solicitação.";
			$this->load->view('includes/msg_erro', $msg);
			break;
		}

		$this->load->view('aluno/menu_lateral');
		$this->load->view('aluno/matricular_disciplina', $disciplinas);
		$this->load->view('aluno/solicitacoes_enviadas', $solicitacoes);
		$this->load->view('includes/html_footer');
	}

	public function solicitar_matricula()
	{
		$this->verificar_sessao();
		$this->load->model('aluno_model','aluno');

		$disciplina['disciplina'] = $this->aluno->get_Disciplina($this->input->post('idDisciplina'));

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('aluno/menu_lateral');
		$this->load->view('aluno/solicitar_matricula', $disciplina);
		$this->load->view('includes/html_footer');
	}

	public function salvar_solicitacao_disciplina()
	{
		$this->verificar_sessao();
		$this->load->model('aluno_model','aluno');

		$solicitacao['idDisciplina'] = $this->input->post('idDisciplina');
		$solicitacao['idAluno'] = $this->session->userdata('idUsuario');
		$solicitacao['idProfessor'] = $this->input->post('idProfDisciplina');
		$solicitacao['justificativa_aluno'] = $this->input->post('justificativa_aluno');

		if ($this->aluno->salvar_solicitacao_disciplina($solicitacao)) {
			redirect('aluno/matricular_disciplina/1');
		} else {
			redirect('aluno/matricular_disciplina/2');
		}
	}

	public function excluir_solicitacao()
	{
		$this->verificar_sessao();
		$this->load->model('aluno_model','aluno');

		if ($this->aluno->excluir_solicitacao($this->input->post('idSolicitacao'))) {
			redirect('aluno/matricular_disciplina/3');
		} else {
			redirect('aluno/matricular_disciplina/4');
		}
	}

	public function visualizar_solicitacao($idSolicitacao=null)
	{
		$this->verificar_sessao();
		$this->load->model('aluno_model','aluno');

		$solicitacao['solicitacao'] = $this->aluno->get_Solicitacao($idSolicitacao);

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('aluno/menu_lateral');
		$this->load->view('aluno/visualizar_solicitacao', $solicitacao);
		$this->load->view('includes/html_footer');
	}

	public function editar_solicitacao($idSolicitacao=null)
	{
		$this->verificar_sessao();
		$this->load->model('aluno_model','aluno');

		$solicitacao['solicitacao'] = $this->aluno->get_Solicitacao($idSolicitacao);

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('aluno/menu_lateral');
		$this->load->view('aluno/editar_solicitacao', $solicitacao);
		$this->load->view('includes/html_footer');
	}

	public function salvar_atualizacao_solicitacao($idSolicitacao=null)
	{
		$this->verificar_sessao();
		$this->load->model('aluno_model','aluno');

		$solicitacao['idSolicitacao'] = $this->input->post('idSolicitacao');
		$solicitacao['justificativa_aluno'] = $this->input->post('justificativa_aluno');

		if ($this->aluno->salvar_atualizacao_solicitacao($this->input->post('idSolicitacao'), $solicitacao)) {
			redirect('aluno/matricular_disciplina/5');
		} else {
			redirect('aluno/matricular_disciplina/6');
		}
	}

	public function atividades_disciplina($idDisciplina=null)
	{
		$this->verificar_sessao();
		$this->load->model('aluno_model','aluno');

		$disciplina = $this->aluno->get_Disciplina($idDisciplina);
		$conjuntos_disciplina['conjuntos_disciplina'] = $this->aluno->get_Conjuntos_Da_Disciplinas($disciplina[0]->id_professor, $idDisciplina);
		$nomeDisciplina['nomeDisciplina'] = $disciplina[0]->nome_disciplina;

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('aluno/menu_lateral');
		$this->load->view('aluno/cabecalho_disciplina', $nomeDisciplina);
		$this->load->view('aluno/atividades_disciplina', $conjuntos_disciplina);
		$this->load->view('includes/html_footer');
	}

	public function get_Atividades($id_conjunto_atividade=null)
	{
		$this->verificar_sessao();
		$this->load->model('aluno_model','aluno');

		$this->aluno->get_Atividades($id_conjunto_atividade);
	}

	public function enviar_atividade($idAtividade=null)
	{
		$this->verificar_sessao();
		$this->load->model('aluno_model','aluno');

		$atividade = $this->aluno->get_Atividade($idAtividade);
		$conjunto = $this->aluno->get_Nome_Conjunto($atividade[0]->idConjuntoAtividade);
		$atividadeEnviar['atividadeEnviar'] = $this->aluno->get_Atividade($idAtividade);
		$atividadeEnviar['idDisciplina'] = $conjunto[0]->id_disciplina_conjunto;
		$nomeConjunto['nomeConjunto'] = $conjunto[0]->nome_conjunto;

		// $idDisciplina['idDisciplina'] =

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('aluno/menu_lateral');
		$this->load->view('aluno/cabecalho_conjunto_atividade', $nomeConjunto);
		$this->load->view('aluno/enviar_atividade', $atividadeEnviar);
		$this->load->view('includes/html_footer');
	}

	public function get_Atividade($idAtividade=null)
	{
		$this->verificar_sessao();
		$this->load->model('aluno_model','aluno');

		$this->aluno->get_Atividades($idAtividade);
	}

}
