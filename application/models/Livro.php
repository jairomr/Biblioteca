<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Livro extends CI_Model {
    public function __construct()
    {
                // Call the CI_Model constructor
        parent::__construct();
    }
    public function registrar($data_registro ,$titulo, $edicao, $ano, $local_, $obs ,$editora,$autor ){
    	$dados=array(
    		'data_registro '=>$data_registro, 
    		'titulo'=>$titulo,
    		'edicao'=>$edicao,
    		'ano'=>$ano, 
    		'local_'=>$local_, 
    		'obs' => $obs, 
    		'editora'=>$editora, 
    		'autor'=>$autor 
    		);
    	$this->db->insert('livros',$dados);
    }
    public function getById($id=null){
        if($id!=null){
        $this->db->where('idlivros', $id);
        return $this->db->get('livros');
        }
    }
    public function getLivros(){
        return $this->db->get('livros');
    }
    public function update($id,$data){
        $this->db->where('idlivros', $id);
        $this->db->update('livros',$data);

    }




}