<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cliente_models extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    public function listaClientes($codigoCliente) {
        $where = ($codigoCliente == 0) ? '' : " where codigo = {$codigoCliente}";
        $sql = "select *
            from clientes
            $where";

        $query = $this->db->query($sql);


        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $cliente) {

                $excluirCliente = 'excluirCliente(' . $cliente['codigo'] . ')';
                $alterarCliente = base_url().'formulario_cadastro/' . $cliente['codigo'];

                $data['data'][] = [
                    'codigo' => $cliente['codigo'],
                    'nome' => $cliente['nome'],
                    'data_nascimento' => $this->formatarDataModel($cliente['data_nascimento']),
                    'sexo' => $cliente['sexo'],
                    'cep' => $cliente['cep'],
                    'endereco' => $cliente['endereco'],
                    'numero' => $cliente['numero'],
                    'complemento' => $cliente['complemento'],
                    'bairro' => $cliente['bairro'],
                    'estado' => $cliente['estado'],
                    'cidade' => $cliente['cidade'],
                    'alterar' => "<a href=". $alterarCliente ." class='btn btn-warning btn-circle' title='Alterar cliente'><i class='fas fa-exclamation-triangle'></i></a>",
                    'excluir' => "<button class='btn btn-danger btn-circle' title='Excluir cliente' onclick=" . $excluirCliente . "><i class='fas fa-info-circle'></i></button>",
                ];
            }
            return $data;
        } else {
            return false;
        }
    }

    

    public function insertClienteModels($cliente) {
        $this->db->insert('clientes', $cliente);
        return $this->db->insert_id();
    }
   
    public function updateCliente($dados, $cod_cliente) {
        $this->db->where('codigo', $cod_cliente);
        $query = $this->db->update('clientes', $dados);
        return $query;
    }

    public function excluirCliente($codigoCliente) {
        $sql = "delete from clientes
                where
                    codigo = {$codigoCliente}";
        return $this->db->query($sql);
    }
    
}
