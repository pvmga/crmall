<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cliente_models extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function listaClientes() {

        $sql = "select 
                    t.codigo,
                    t.nome,
                    t.data_nascimento,
                    t.sexo,
                    t.cep,
                    t.endereco,
                    t.numero,
                    t.complemento,
                    t.bairro,
                    t.estado,
                    t.cidade
            from clientes t";

        $query = $this->db->query($sql);


        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $cliente) {

                $excluirCliente = 'visualizarChamado(' . $cliente['codigo'] . ')';
                $alterarCliente = base_url().'formulario_cadastro/' . $cliente['codigo'];

                $data['data'][] = [
                    'codigo' => $cliente['codigo'],
                    'nome' => $cliente['nome'],
                    'data_nascimento' => $cliente['data_nascimento'],
                    'sexo' => $cliente['sexo'],
                    'alterar' => "<a href=". $alterarCliente ." class='btn btn-warning btn-circle' title='Alterar cliente'><i class='fas fa-exclamation-triangle'></i></a>",
                    'excluir' => "<button class='btn btn-danger btn-circle' title='Excluir cliente' onclick=" . $excluirCliente . "><i class='fas fa-info-circle'></i></button>",
                ];
            }
            return $data;
        } else {
            return false;
        }
    }

    

    public function insertChamadoModels($cliente) {
        $this->db->insert('clientes', $cliente);
        return $this->db->insert_id();
    }
   
    public function updateChamado($dados, $cod_chamado) {
        $this->db->where('codigo', $cod_chamado);
        $query = $this->db->update('clientes', $dados);
        return $query;
    }
    
}
