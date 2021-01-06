<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['title'] = "CRMALL - Cliente listagem";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('telas/view_cliente_listagem');
        $this->load->view('templates/footer');
        $this->load->view('ajax/clientesListagem');
    }

    public function formulario_cadastro() {
        $data['title'] = "CRMALL - Cadastro de clientes";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('telas/view_cliente_cadastro');
        $this->load->view('templates/footer');
        $this->load->view('ajax/clientesCadastro');
    }

    public function listagemClientes() {
        $this->load->model('cliente_models');

        $data = $this->cliente_models->listaClientes(0);

        if ($data == NULL) {
            $data['data'] = array();
            $data['data'][] = [
                'codigo' => '',
                'nome' => 'Não existe registros...',
                'data_nascimento' => '',
                'sexo' => '',
                'alterar' => '',
                'excluir' => '',
            ];
        }

        echo json_encode($data);
    }

    public function salvarCliente() {
        $this->load->model('cliente_models');

        $dados = $this->input->post('dados');
        $cliente = array(
            'codigo' => $dados['codigo_cliente'],
            'nome' => $dados['nome'],
            'data_nascimento' => $this->formatarData($dados['data_nascimento_cliente']),
            'sexo' => $dados['sexo_cliente'],
            'cep' => $dados['cep_cliente'],
            'endereco' => $dados['endereco_cliente'],
            'numero' => $dados['numero_cliente'],
            'complemento' => $dados['complemento_cliente'],
            'bairro' => $dados['bairro_cliente'],
            'estado' => $dados['estado_cliente'],
            'cidade' => $dados['cidade_cliente'],
        );

        

        if ($dados['codigo_cliente'] == 0) {
            $res = $this->cliente_models->insertClienteModels($cliente);
        } else {
            $res = $this->cliente_models->updateCliente($cliente, $dados['codigo_cliente']);
        }

        echo json_encode($res);
    }

    public function buscarCliente() {
        $this->load->model('cliente_models');

        $codigoCliente = $this->input->post('codigo_cliente');

        $data['dadosCliente'] = $this->cliente_models->listaClientes($codigoCliente);
        echo json_encode($data);
    }

}
