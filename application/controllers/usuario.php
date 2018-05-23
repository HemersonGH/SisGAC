<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

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
			redirect('dashboard/login');
		}
	}

	public function index($indice=null)
	{
		$this->verificar_sessao();
		$this->load->model('usuario_model','usuario');

		$dados['usuarios'] = $this->usuario->get_Usuarios();

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');

		switch ($indice) {
			case '1':
			$data['msg'] = "Usuário cadastrado com sucesso.";
			$this->load->view('includes/msg_sucesso', $data);
			break;
			case '2':
			$data['msg'] = "Não foi possível cadastrar o usuário.";
			$this->load->view('includes/msg_erro', $data);
			break;
			case '3':
			$data['msg'] = "Usuário excluído com sucesso.";
			$this->load->view('includes/msg_sucesso', $data);
			break;
			case '4':
			$data['msg'] = "Não foi possível exclui o usuário.";
			$this->load->view('includes/msg_erro', $data);
			break;
			case '5':
			$data['msg'] = "Usuário atualizado com sucesso.";
			$this->load->view('includes/msg_sucesso', $data);
			break;
			case '6':
			$data['msg'] = "Não foi possível atualizar o usuário.";
			$this->load->view('includes/msg_erro', $data);
			break;
		}

		$this->load->view('listar_usuario', $dados);
		$this->load->view('includes/html_footer');
	}

	public function cadastro()
	{
		$this->verificar_sessao();
		$this->load->model('usuario_model','usuario');

		$dados['cidades'] = $this->usuario->get_Cidades();

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('cadastro_usuario', $dados);
		$this->load->view('includes/html_footer');
	}

	public function cadastrar()
	{
		$this->verificar_sessao();

		$data['nome'] = $this->input->post('name');
    $data['cpf'] = $this->input->post('cpf');
    $data['email'] = $this->input->post('email');
    $data['senha'] = md5($this->input->post('password'));
    $data['status'] = $this->input->post('status');
    $data['nivel'] = $this->input->post('nivel');
    $data['endereco'] = $this->input->post('endereco');
    $data['cidade_idCidade'] = $this->input->post('cidade');
    $data['dataNasc'] = $this->input->post('data');

		$this->load->model('usuario_model','usuario');

		if ($this->usuario->cadastrar($data)) {
			redirect('usuario/1');
		} else {
			redirect('usuario/2');
		}
	}

	public function atualizar($id=null, $indice=null)
	{
		$this->verificar_sessao();
		$this->load->model('usuario_model','usuario');

		$data['cidades'] = $this->usuario->get_Cidades();
		$data['usuario'] = $this->usuario->get_Usuario($id);

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');

		if ($indice == 1) {
			$data['msg'] = 	"Senha atualizada com sucesso.";
			$this->load->view('includes/msg_sucesso', $data);
		} else if ($indice == 2) {
			$data['msg'] = 	"Não foi possível atualizar a senha do usuário.";
			$this->load->view('includes/msg_erro', $data);
		}

		$this->load->view('editar_usuario', $data);
		$this->load->view('includes/html_footer');
	}

	public function excluir($id=null)
	{
		$this->verificar_sessao();
		$this->load->model('usuario_model','usuario');

		if ($this->usuario->excluir($id)) {
			redirect('usuario/3');
		} else {
			redirect('usuario/4');
		}
	}

	public function salvar_atualizacao()
	{
		$this->verificar_sessao();

		$id = $this->input->post('idUsuario');

    $data['nome'] = $this->input->post('name');
    $data['cpf'] = $this->input->post('cpf');
    $data['email'] = $this->input->post('email');
    $data['status'] = $this->input->post('status');
    $data['nivel'] = $this->input->post('nivel');
    $data['endereco'] = $this->input->post('endereco');
    $data['cidade_idCidade'] = $this->input->post('cidade');
    $data['dataNasc'] = $this->input->post('data');

		$this->load->model('usuario_model','usuario');

		if ($this->usuario->salvar_atualizacao($id, $data)) {
			redirect('usuario/5');
		} else {
			redirect('usuario/6');
		}
	}

	public function salvar_senha()
	{
		$this->verificar_sessao();

		$id = $this->input->post('idUsuario');

    $senha_antiga = md5($this->input->post('senha_antiga'));
    $senha_nova = md5($this->input->post('senha_nova'));

		$this->load->model('usuario_model','usuario');

		$id = $this->input->post('idUsuario');

		if ($this->usuario->salvar_senha($id, $senha_antiga, $senha_nova)) {
			redirect('usuario/atualizar/'.$id.'/1');
		} else {
			redirect('usuario/atualizar/'.$id.'/2');
		}
	}

	public function pesquisar()
	{
		$this->verificar_sessao();

		$termo = $this->input->post('pesquisar');

		$this->load->model('usuario_model','usuario');

		$dados['usuarios'] = $this->usuario->get_Usuarios_Like($termo);

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('listar_usuario', $dados);
		$this->load->view('includes/html_footer');
	}

	public function pag($value=null)
	{
		$this->verificar_sessao();
		$this->load->model('usuario_model','usuario');

		if ($value == null) {
			$value = 1;
		}

		$reg_p_pag = 10;

		if ($value <= $reg_p_pag) {
			$data['btnA'] = 'disabled';
		} else {
			$data['btnA'] = '';
		}

		$u = $this->usuario->getQtdUsuarios();

		if (($u[0]->total - $value) < $reg_p_pag) {
			$data['btnP'] = 'disabled';
		} else {
			$data['btnP'] = '';
		}

		$dados['usuarios'] = $this->usuario->get_Usuarios_Pag($value, $reg_p_pag);

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('listar_usuario', $dados);
		$this->load->view('includes/html_footer');

	}
}
