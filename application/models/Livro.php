<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Modolo de livro
 * Esta classe é um Model de livro projetado para o o aplicativo de biblioteca
 */
class Livro extends CI_Model {
    public function __construct()
    {
                // Call the CI_Model constructor
        parent::__construct();
    }




    /**
     * Registra um livro no banco de dados
     * @param  date $data_registro Data do registro
     * @param  String $titulo        Titulo do livro
     * @param  String $edicao        Edição da livro
     * @param  int $ano           Ano do lançamento
     * @param  String $local_        Local da publicação
     * @param  String $obs           Observação sobre o livro
     * @param  String $editora       Editora que publico o livro
     * @param  String $autor         Autor principal do livro
     */
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





    /**
     * Obtem todas as informação do livro
     * @param  int $id Numero de identificação do livro
     * @return objeto     Retorna uma objeto com as informação do livro
     */
    public function getById($id=null){
        if($id!=null){
            $this->db->where('idlivros', $id);
            return $this->db->get('livros');
        }
    }





    /**
     * Retorna todos os livros
     * @return objeto Retorna um objeto com todos os livro
     */
    public function getLivros(){
        return $this->db->get('livros');
    }
    /**
     * Atualiza os dados de um livro
     * @param  int $id   Identificação do livro
     * @param  array $dado Lista com as Atualizaçãoes
     */
    public function update($id,$dado){
        $this->db->where('idlivros', $id);
        $this->db->update('livros',$dado);
    }




    
}
