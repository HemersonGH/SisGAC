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

  public function get_Status_Disciplina($idDisciplina=null)
  {
    $this->db->where('idDisciplina', $idDisciplina);

    $disciplina = $this->db->get('disciplina')->result();

    return $disciplina[0]->status_disciplina;
  }


}

?>
