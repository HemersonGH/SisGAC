<?php

class Aluno_model extends CI_Model
{
  function __contruct()
  {
    parent::__construct();
  }

  public function get_Disciplinas_Matriculado($idUsuario=null)
  {
    $this->db->select('*');
    $this->db->where('idAluno', $idUsuario);
    $this->db->where('status_participacao', 1);

    return $this->db->get('participa_disciplina')->result();
  }

  public  function get_Disciplinas_Nao_Matriculado($idDisciplina=null)
  {
    $this->db->select('*');
    $this->db->where('idAluno', $idUsuario);
    $this->db->where('status_participacao', 0);

    return $this->db->get('participa_disciplina')->result();
  }

  public function get_Nome_Professor($idProfessor=null)
  {
    $this->db->where('idUsuario', $idProfessor);

    $professor = $this->db->get('usuario')->result();

    return $professor[0]->nome;
  }

  public function get_Nome_Disciplina($idDisciplina=null)
  {
    $this->db->where('idDisciplina', $idDisciplina);

    $disciplina = $this->db->get('disciplina')->result();

    return $disciplina[0]->nome_disciplina;
  }

  public function get_Cod_Disciplina($idDisciplina=null)
  {
    $this->db->where('idDisciplina', $idDisciplina);

    $disciplina = $this->db->get('disciplina')->result();

    return $disciplina[0]->codigo_disciplina;
  }

  public function get_Status_Disciplina($idDisciplina=null)
  {
    $this->db->where('idDisciplina', $idDisciplina);

    $disciplina = $this->db->get('disciplina')->result();

    return $disciplina[0]->status_disciplina;
  }

  public function get_Disciplinas()
  {
    $this->db->select('*');
    $this->db->where('status_disciplina', 2);

    return $this->db->get('disciplina')->result();
  }

  public function get_Disciplina($idDisciplina=null)
  {
    $this->db->select('*');
    $this->db->where('idDisciplina', $idDisciplina);

    return $this->db->get('disciplina')->result();
  }

  public function salvar_solicitacao_disciplina($solicitacao)
  {
    return $this->db->insert('solicitacoes_disciplinas', $solicitacao);
  }

  public function get_Solicitacoes($idAluno=null)
  {
    $this->db->select('*');
    $this->db->where('idAluno', $idAluno);

    return $this->db->get('solicitacoes_disciplinas')->result();
  }

  public function excluir_solicitacao($idSolicitacao=null)
  {
    $this->db->where('idSolicitacao', $idSolicitacao);

    return $this->db->delete('solicitacoes_disciplinas');
  }

  public function get_Solicitacao($idSolicitacao=null)
  {
    $this->db->select('*');
    $this->db->where('idSolicitacao', $idSolicitacao);

    return $this->db->get('solicitacoes_disciplinas')->result();
  }

  public function salvar_atualizacao_solicitacao($idSolicitacao=null, $solicitacao)
  {
    $this->db->where('idSolicitacao', $idSolicitacao);

    return $this->db->update('solicitacoes_disciplinas', $solicitacao);
  }

  public function get_Conjuntos_Da_Disciplinas($idUsuario=null, $idDisciplina)
  {
    $this->db->select('*');
    $this->db->where('id_professor', $idUsuario);
    $this->db->where('id_disciplina_conjunto', $idDisciplina);

    return $this->db->get('conjunto_atividade')->result();
  }

  public function get_Atividades($id_conjunto_atividade=null)
  {
    $this->db->select('*');
    $this->db->where('idConjuntoAtividade', $id_conjunto_atividade);

    return $this->db->get('atividade')->result();
  }


}

?>
