<div class="container mt-5">
    <p>
        <h2 class="pesquisar">Pesquisar</h2>

        <?php echo form_open('user/index') ?>
            <input type="text" name="pesquisa" size="50" placeholder="Digite aqui">
            <input type="submit" value="Buscar" class="btn btn-primary">
            
        <?php echo form_close(); ?>
        
        </p>
        </div>
    
    <?php echo anchor(base_url('user/create'), 'Cadastrar novo Usuário', ['class' => 'btn btn-success mb-3 float-right']) ?>
</div>



<div class="container mt-5">
    <table class="table">
        <tr align="center">
            <th>ID</th>
            <th>Nome</th>
            <th>CRM</th>
            <th>Especialidades</th>
            <th>Telefone Fixo</th>
            <th>Telefone Celular</th>
            <th>CEP</th>
            <th>Rua</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>UF</th>
            <th>Ações</th>
        </tr>
        <?php foreach($users as $user): ?>
            <tr align="center">
                <?php if($user['deleted_at'] === NULL): ?>
                    <td><?php echo $user['id'] ?></td>
                    <td align="left"><?php echo $user['nome'] ?></td>
                    <td><?php echo $user['crm'] ?></td>
                    
                    <?php if(!$specs === NULL): ?>
                        <?php foreach($specs as $spec): ?>
                            <td><?php echo $spec['nome'] ?></td>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <td><?php echo " " ?></td>
                    <?php endif; ?>

                    <td class="telefone"><?php echo $user['telefone_fixo'] ?></td>
                    <td class="telefone"><?php echo $user['telefone_celular'] ?></td>
                    <td class="cep"><?php echo $user['cep'] ?></td>
                    <td class="cep"><?php echo $user['rua'] ?></td>
                    <td class="cep"><?php echo $user['bairro'] ?></td>
                    <td class="cep"><?php echo $user['cidade'] ?></td>
                    <td class="cep"><?php echo $user['uf'] ?></td>
                    <td><?php echo anchor('user/edit/'.$user['id'], 'Editar') ?>
                    -
                    <?php echo anchor('user/delete/'.$user['id'], 'Excluir', ['onclick' => 'return confirma()']) ?>
                    </td>
                
                <?php endif; ?>
       
            </tr>
        <?php endforeach; ?>
    </table>
    
    <?php echo $pager->links(); ?>
</div>

<script>
    function confirma(){
        if (!confirm('Tem certeza que deseja apagar o cadastro?')){
            return false;
        }
        return true;
    }

    function returnEspecialidades()
    {
        $this->especialidadesModel->select('nome');
        $this->especialidadesModel->from("especialidades AS specs");
        $this->especialidadesModel->join()
    }
</script>