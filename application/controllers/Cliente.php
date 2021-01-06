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
        $this->load->view('templates/modal');
        $this->load->view('templates/footer');
        $this->load->view('ajax/clientesListagem');
    }

    public function formulario_cadastro() {
        $data['title'] = "CRMALL - Cadastro de clientes";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('telas/view_chamado_cadastro');
        $this->load->view('templates/modal');
        $this->load->view('templates/footer');
        $this->load->view('ajax/clientesCadastro');
    }

    public function listagemClientes() {
        $this->load->model('cliente_models');

        $data = $this->cliente_models->listaClientes();

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
        $arquivos = json_decode($dados['arquivos']);

        $tarefa = array(
            'cod_empresa' => $dados['cod_empresa'],
            'nome' => $dados['nome']
        );

        // UPDATE OU INSERT DA TAREFA
        if ($dados['codigo_chamado'] == 0) {
            $cod_tarefa = $this->chamado_models->insertChamadoModels($tarefa);
        } else {
            if ($tarefa['prioridade'] == 'Resolvido') {
                $tarefa['data_fechamento'] = date('Y-m-d H:i:s');
            }
            // UPDATE RETORNANDO O CÓDIGO DA TAREFA.
            $this->chamado_models->updateChamado($tarefa, $dados['codigo_chamado']);
        }

        echo json_encode($result);
    }

}
