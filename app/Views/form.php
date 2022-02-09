<body>
    <div class="container mt-5">

        <?php echo form_open('user/store') ?>
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" value="<?php echo isset($user['nome']) ? $user['nome'] : '' ?>" name="nome" id="nome" class="form-control" required maxlength="120">
        </div>
        <div class="form-group">
            <label for="crm">CRM</label>
            <input type="text" value="<?php echo isset($user['crm']) ? $user['crm'] : '' ?>" name="crm" id="crm" class="form-control" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" / maxlength="7">
        </div>
        <div class="form-group">
            <label for="telefone_fixo">Telefone Fixo</label>
            <input type="text" value="<?php echo isset($user['telefone_fixo']) ? $user['telefone_fixo'] : '' ?>" name="telefone_fixo" class="form-control telefone" maxlength="9">
        </div>
        <div class="form-group">
            <label for="telefone_celular">Telefone Celular</label>
            <input type="text" value="<?php echo isset($user['telefone_celular']) ? $user['telefone_celular'] : '' ?>" name="telefone_celular" class="form-control telefone" maxlength="9" required>
        </div>

        <div class="form-group">
            <label for="especialidades">Especialidades</label>
                <select id="especialidade" name="especialidades[]" required class="form-control" multiple>
                    <option value="" selected invalid>- Selecione pelo menos 2 opções -</option>
                    <option value="Alergologia">Alergologia</option>
                    <option value="Angiologia">Angiologia</option>
                    <option value="Buco Maxilo">Buco Maxilo</option>
                    <option value="Cardiologia Clinica">Cardiologia Clínica</option>
                    <option value="Cardiologia Infantil">Cardiologia Infantil</option>
                    <option value="Cirugia cabeça e pescoço">Cirurgia Cabeça e Pescoço</option>
                    <option value="Cirurgia Cardíaca">Cirurgia Cardíaca</option>
                    <option value="Cirurgia de Tórax">Cirurgia de Tórax</option>
                </select>
        </div>


        <div class="form-group">
            <label>Cep:</label>
                <input name="cep" type="text" id="cep" value="<?php echo isset($user['cep']) ? $user['cep'] : '' ?>" size="10" maxlength="9" class="form-control" required onload="pesquisacep(this.value)" onblur="pesquisacep(this.value);" /></label><br />
                <label>Rua:</label>
                <input name="rua" type="text" id="rua" size="60" class="form-control" value="<?php echo isset($user['rua']) ? $user['rua'] : '' ?>"/></label><br />
                <label>Bairro:</label>
                <input name="bairro" type="text" id="bairro" size="40" class="form-control" value="<?php echo isset($user['bairro']) ? $user['bairro'] : '' ?>"/></label><br />
                <label>Cidade:</label>
                <input name="cidade" type="text" id="cidade" size="40" class="form-control" value="<?php echo isset($user['cidade']) ? $user['cidade'] : '' ?>"/></label><br />
                <label>Estado:</label>
                <input name="uf" type="text" id="uf" size="2" class="form-control" value="<?php echo isset($user['uf']) ? $user['uf'] : '' ?>"/></label><br />
        </div>
        

        <input type="submit" value="Salvar" class="btn btn-primary">
        <input type="hidden" name="id" value="<?php echo isset($user['id']) ? $user['id'] : '' ?>">
        <?php echo form_close(); ?>
        

    </div>
</body>

<script> 
    //Script IDE correios.
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };
    

</script>