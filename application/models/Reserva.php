<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reserva extends CI_Model {
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }






    /**
     * Registar a reserva do livro
     * @param  date $data_retirada    data da retriada do livro
     * @param  date $data_volta     data da devolução do livro
     * @param  int $livros_idlivros intetificação do livro
     * @param  int $usuarios_idusuarios intetificação do usuario
     * @param  string $obs           string de observação
     */
    public function registar($data_retirada,$data_volta,$livros_idlivros,$usuarios_idusuarios,$obs=''){
        $d1=new DateTime($data_retirada);
        $d2=new DateTime($data_volta);
        if($d1<$d2){
            $dados =array(
                'data_retirada'   => $data_retirada,
                'data_volta'          => $data_volta,
                'livros_idlivros'  => $livros_idlivros,
                'obs'                 => $obs,
                'usuarios_idusuarios' => $usuarios_idusuarios
                );
            $this->db->insert('reserva',$dados);
        }
    }




    public function getReserva($situacao=null){
        if($situacao===0||$situacao===1){
        $this->db->where('situacao', $situacao);
        }
        return $this->db->get('reserva');
    }





    public function pegarPeloId($id=null){
        if($id!=null){
        $this->db->where('idreserva', $id);
        return $this->db->get('reserva');
        }
    }





    public function setSituacao($id,$situacao){
        if($id!=null&&$situacao===0||$situacao===1){
        $this->db->set('situacao', $situacao);
        $this->db->where('idreserva', $id);
        $this->db->update('reserva');
        }
    }



    
}
