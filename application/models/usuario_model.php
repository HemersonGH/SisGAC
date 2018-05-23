<?php

class Usuario_model extends CI_Model
{
  function __contruct()
  {
    parent::__construct();
  }

  public function cadastrar($data)
  {
    return $this->db->insert('usuario', $data);
  }

  public function get_Usuario($id=null)
  {
    $this->db->where('idUsuario', $id);
    return $this->db->get('usuario')->result();
  }

  public function get_Usuarios()
  {
    $this->db->select('*');
    $this->db->join('cidade', 'cidade_idCidade = idCidade', 'inner');

    return $this->db->get('usuario')->result();
  }

  public function get_Usuarios_Like($termo)
  {
    $this->db->select('*');
    $this->db->join('cidade', 'cidade_idCidade = idCidade', 'inner');
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
