<?php echo anchor(base_url('user/create'), 'Cadastrar novo Usuário', ['class' => 'btn btn-success mb-3']) ?>
<p>
    <h2 class="pesquisar">Pesquisar</h2>

    <?php echo form_open('user/index') ?>
        <input type="text" name="pesquisa" size="50" placeholder="Digite aqui">
        <input type="submit" value="Buscar" class="btn btn-primary">
        
    <?php echo form_close(); ?>

    </div>
</p>
<div class="container mt-5">
    <table class="table">
        <tr align="center">
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
                <td align="left"><?php echo $user['nome'] ?></td>
                <td><?php echo $user['crm'] ?></td>
                <td><?php echo $user['especialidades'] ?></td>
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
</script>