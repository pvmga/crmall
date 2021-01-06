<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cadastrar Clientes</h1>
    </div>

    <div class="row">
        <div class="col-lg-1">
            <div class="form-group input-group-sm">
                <label>Id: <span style="color: red;">*</span></label>
                <input class="form-control" id="codigo_cliente" value="<?= $this->uri->segment('2') ?>" disabled>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group input-group-sm">
                <label>Nome: <span id="validadorNOME" style="color: red; font-size: 11px">*</span></label>
                <input class="form-control input-lg small" id="nome_cliente" placeholder="Nome do cliente" value="" maxlength="50">
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group input-group-sm">
                <label>Nascimento: <span id="validadorDATANASCIMENTO" style="color: red; font-size: 11px">*</span></label>
                <input class="form-control input-lg small" id="data_nascimento_cliente" placeholder="00/00/0000">
            </div>
        </div>

        <div class="col-lg-2">
            <div class="form-group input-group-sm">
                <label>Sexo: <span id="validadorSEXO" style="color: red; font-size: 11px">*</span></label>
                <select class="form-control" id="sexo_cliente">
                    <option value="0">Selecione...</option>
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                    <option value="o">Outro</option>
                </select>
            </div>
        </div>

        <div class="col-lg-2">
            <div class="form-group input-group-sm">
                <label>CEP: </label>
                <input class="form-control input-lg small" id="cep_cliente" maxlength="9" placeholder="87000-000">
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group input-group-sm">
                <label>Endereço: </label>
                <input class="form-control input-lg small" id="endereco_cliente" maxlength="100" placeholder="Endereço do cliente">
            </div>
        </div>

        <div class="col-lg-2">
            <div class="form-group input-group-sm">
                <label>Número: </label>
                <input class="form-control input-lg small" id="numero_cliente" maxlength="10" placeholder="Número">
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group input-group-sm">
                <label>Complemento: </label>
                <input class="form-control input-lg small" id="complemento_cliente" maxlength="100" placeholder="Complemento do endereço">
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group input-group-sm">
                <label>Bairro: </label>
                <input class="form-control input-lg small" id="bairro_cliente" maxlength="50" placeholder="Bairro">
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group input-group-sm">
                <label>Estado: </label>
                <input class="form-control input-lg small" id="estado_cliente" maxlength="2" placeholder="Estado">
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group input-group-sm">
                <label>Cidade: </label>
                <input class="form-control input-lg small" id="cidade_cliente" maxlength="50" placeholder="Cidade">
            </div>
        </div>
    </div>

    <div class="row text-right">
        <div class="col-lg-12">
            <button class="btn btn-primary" id="salvarCliente" type="button">Salvar</button>
            <a href="<?= base_url('cliente'); ?>" class="btn btn-secondary">Cancelar</a>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
