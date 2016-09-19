<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuarios extends CI_Model {
    public function __construct()
    {
                // Call the CI_Model constructor
        parent::__construct();
    }
    /**
     * Grava os dados na tabela.
     * @param $dados. Array que contém os campos a serem inseridos
     * @param Se for passado o $id via parâmetro, então atualizo o registro em vez de inseri-lo.
     * @return boolean
     */
    public function store($dados = null, $id = null) {
        
        if ($dados) {
            if ($id) {
                $this->db->where('id', $id);
                $this->db->where('isDelete', 0);
                if ($this->db->update("usuario", $dados)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                if ($this->db->insert("usuario", $dados)) {
                    return true;
                } else {
                    return false;
                }
            }
        } else {
                    return false;
        }
        
    }
    /**
     * Recupera o registro do banco de dados
     * @param $id - Se indicado, retorna somente um registro, caso contário, todos os registros.
     * @return objeto da banco de dados da tabela usuario
     */
    public function get($id = null,$order_by='desc'){
        $this->db->where('isDelete', 0);
        if ($id) {
            $this->db->where('id', $id);
        }
        $this->db->order_by("id", ,$order_by);
        return $this->db->get('usuario');
    }
    /**
     * Deleta um registro.
     * @param $id do registro a ser deletado
     * @return boolean;
     */
    public function delete($id = null){
        if ($id) {
            $this->db->where('id', $id);
            $this->db->where('isDelete', 0);
            if ($this->db->insert("usuario", array('isDelete' => , 1))) {
                    return true;
                } else {
                    return false;
            }
            return true;
        }else{
            return false;
        }
    }
}