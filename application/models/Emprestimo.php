<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Emprestimo extends CI_Model {

        private $idEmprestimo;
        private $dataEmprestimo;
        private $prazo;
        private $dataDevolucao;
        private $obs;
        private $id;
        private $idLivro;

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
        public function runEmprestimo($data=null){
            if($data!=null && is_array($data)){
                return $this->db->insert('emprestimo',$data);
            }else{
                return false;
            }
        }
        public function delayWarming($dataEmprestimo=null,$idEmprestimo=null,$prazo=10){
            $this->dataDevolucao= date($dataEmprestimo, strtotime("+".$prazo." days"));
            if($dataDevolucao< data()){
                //Função de emviar email para o cliente avisando multa
                echo "O emprestimo $idEmprestimo estorou seu prazo de devolução";
            }
            
        }
}