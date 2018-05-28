<?php

class Professor_model extends CI_Model
{
  function __contruct()
  {
    parent::__construct();
  }

  public function cadastrar_disciplina($data)
  {
    return $this->db->insert('disciplina', $data);
  }

  public function get_Disciplinas($idUsuario=null)
  {
    // $this->db->join('cidade', 'cidade_idCidade = idCidade', 'inner');
    $this->db->select('*');
    $this->db->where('id_professor', $idUsuario);

    return $this->db->get('disciplina')->result();
  }

  public  function get_Disciplina($idDisciplina=null)
  {
    $this->db->where('idDisciplina', $idDisciplina);
    return $this->db->get('disciplina')->result();
  }

  public function salvar_atualizacao_disciplina($idDisciplina=null, $disciplina)
  {
    $this->db->where('idDisciplina', $idDisciplina);

    return $this->db->update('disciplina', $disciplina);
  }

  public function excluir_disciplina($idDisciplina=null)
	{
		$this->db->where('idDisciplina', $idDisciplina);

    return $this->db->delete('disciplina');
	}

  public function cadastrar_conjunto_atividades($data)
  {
    return $this->db->insert('conjunto_atividade', $data);
  }

  public function get_Conjuntos($idUsuario=null)
  {
    $this->db->select('*');
    $this->db->where('id_professor', $idUsuario);

    return $this->db->get('conjunto_atividade')->result();
  }

  public function get_Conjunto($id_conjunto_atividade=null)
  {
    $this->db->select('*');
    $this->db->where('idConjuntoAtividade', $id_conjunto_atividade);

    return $this->db->get('conjunto_atividade')->result();
  }

  public function salvar_atualizacao_conjunto_atividades($id_conjunto_atividade=null, $conjunto_atividade)
  {
    $this->db->where('id_conjunto_atividade', $id_conjunto_atividade);

    return $this->db->update('conjunto_atividade', $conjunto_atividade);
  }

  public function excluir_conjunto_atividades($id_conjunto_atividade=null)
  {
    $this->db->where('id_conjunto_atividade', $id_conjunto_atividade);

    return $this->db->delete('conjunto_atividade');
  }

  public function cadastrar_atividades($atividade=null)
  {
    return $this->db->insert('atividade', $atividade);
  }

  public function get_Atividades($id_conjunto_atividade=null)
  {
    $this->db->select('*');
    $this->db->where('idConjuntoAtividade', $id_conjunto_atividade);

    return $this->db->get('atividade')->result();
  }

  public function get_Atividade($idAtividade=null)
  {
    $this->db->select('*');
    $this->db->where('idAtividade', $idAtividade);

    return $this->db->get('atividade')->result();
  }

  public function salvar_atualizacao_atividade($idAtividade=null, $atividade)
  {
    $this->db->where('idAtividade', $idAtividade);

    return $this->db->update('atividade', $atividade);
  }

  public function excluir_atividade($idAtividade=null)
  {
    $this->db->where('idAtividade', $idAtividade);

    return $this->db->delete('atividade');
  }

  public function valida_usuario($email, $senha)
  {
    $this->db->where('email', $email);
		$this->db->where('senha', $senha);

    return $this->db->get('usuario')->result();
  }

  public function get_Usuario($id=null)
  {
    $this->db->where('idUsuario', $id);
    return $this->db->get('usuario')->result();
  }


  public function get_Usuarios_Like($termo)
  {
    $this->db->select('*');
    $this->db->like('nome', $termo);

    return $this->db->get('usuario')->result();
  }

  public function excluir($id=null)
  {
    $this->db->where('idUsuario', $id);

    return $this->db->delete('usuario');
  }

  public function salvar_atualizacao($id, $data)
  {
    $this->db->where('idUsuario', $id);

    return $this->db->update('usuario', $data);
  }

  public function salvar_senha($id, $senha_antiga, $senha_nova)
  {
    $this->db->select('senha');
    $this->db->where('idUsuario', $id);
    $data['senha'] = $this->db->get('usuario')->result();
    $dados['senha'] = $senha_nova;

    if ($data['senha'][0]->senha == $senha_antiga) {
      $this->db->where('idUsuario', $id);
      $this->db->update('usuario', $dados);

      return true;
    } else {
      return false;
    }
  }

  public function get_Cidades()
  {
    return $this->db->get('cidade')->result();
  }

  public function getQtdUsuarios()
  {
    $this->db->select('count(*) as total');

		return $this->db->get('usuario')->result();
  }

  public function get_Usuarios_Pag($value, $reg_p_pag)
  {
    $this->db->select('*');
    $this->db->join('cidade', 'cidade_idCidade = idCidade', 'inner');
    $this->db->limit($reg_p_pag, $value);

    return $this->db->get('usuario')->result();
  }

}

?>
