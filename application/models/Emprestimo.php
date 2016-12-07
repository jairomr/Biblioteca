<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Modolo de emprestimo
 * Esta classe é um Model de emprstimo o projetado para o aplicativo de biblioteca
 * @author Anacléia Ferreira
 */
class Emprestimo extends CI_Model {
    public function __construct()
    {
                // Call the CI_Model constructor
        parent::__construct();
    }



    public function registar($data_ida,$data_volta,$livros_idlivros,$usuarios_idusuarios,$obs=''){
        $d1=new DateTime($data_ida);
        $d2=new DateTime($data_volta);
        if($d1<$d2){
            $dados =array(
                'data_ida'            => $data_ida,
                'data_volta'          => $data_volta,
                'livros_idlivros'  => $livros_idlivros,
                'obs'                 => $obs,
                'usuarios_idusuarios' => $usuarios_idusuarios
                );
            $this->db->insert('emprestimo',$dados);
        }
    }




    public function getEmprestimo($situacao=null){
        if($situacao===0||$situacao===1){
        $this->db->where('situacao', $situacao);
        }
        return $this->db->get('emprestimo');
    }




    public function getById($id=null){
        if($id!=null){
        $this->db->where('idEmprestimo', $id);
        return $this->db->get('emprestimo');
        }
    }




    public function setSituacao($id,$situacao){
        if($id!=null&&$situacao===0||$situacao===1){
        $this->db->set('situacao', $situacao);
        $this->db->where('idEmprestimo', $id);
        $this->db->update('emprestimo');
        }
    }




    public function getByVencidos($data=null){
        if($data==null){$data = date('Y-m-d');}
        $this->db->where('data_volta <', $data);
        $this->db->where('situacao', 0);
        return $this->db->get('emprestimo');
    }




}
