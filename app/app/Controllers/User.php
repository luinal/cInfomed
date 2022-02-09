<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\EspecialidadesModel;

class User extends BaseController{
    
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->especialidadesModel = new EspecialidadesModel();
    }

    public function index($page = '', $busca = '')
    {   
        $data['title'] = $page; 

        //Variável 'busca' por algum motivo é convertida para um array.
        $busca = implode(" ", $this->request->getPost());
        
        echo view('templates/header', $data);
        if (!$busca) 
        {
            echo view('users', [
                'users' => $this->userModel->orderBy('nome', 'ASC'),
                'specs' => $this->especialidadesModel->select('nome'),
                'users' => $this->userModel->paginate(10),
                'pager' => $this->userModel->pager
            ]);
        } else 
        {
            echo view('users', [
                'users' => $this->userModel->orderBy('usuarios.nome', 'ASC'),
                'users' => $this->userModel->like('usuarios.nome', $busca),
                'users' => $this->userModel->orLike('crm', $busca),
                'users' => $this->userModel->orLike('telefone_fixo', $busca),
                'users' => $this->userModel->orLike('telefone_celular', $busca),
                'users' => $this->userModel->orLike('cep', $busca),
                //'users' => $this->userModel->orLike('especialidades', $busca),
                'users' => $this->userModel->orLike('rua', $busca),
                'users' => $this->userModel->orLike('bairro', $busca),
                'users' => $this->userModel->orLike('cidade', $busca),
                'users' => $this->userModel->orLike('uf', $busca),
                
                //'specs' => $this->userModel->join('especialidades AS special', 'special.usuario_id = usuarios.id'),
                'specs' => $this->especialidadesModel->select('especialidades.nome'),
                'specs' => $this->especialidadesModel->from('especialidades AS special'),
                'specs' => $this->especialidadesModel->join('usuarios', 'usuarios.id = especialidades.usuario_id'),
                //'specs' => $this->especialidadesModel->where('usuarios.deleted_at == NULL'),
                //'specs' => $this->especialidadesModel->get(),

                //'specs' => $this->especialidadesModel->select('*'),
                //'specs' => $this->especialidadesModel->from('especialidades AS special'),
                
                //'specs' => $this->especialidadesModel->find('usuarios.id'),
                //'specs' => $this->userModel->join("especialidades", "especialidades.seletor_user = usuarios.id"),
                //'specs' => $this->especialidadesModel->where('especialidades.seletor_user', 'usuarios.id'),
                
                //'users' => $this->userModel->get(),
                'users' => $this->userModel->paginate(10),
                'pager' => $this->userModel->pager
            ]);
           
            
        }
        //echo $this->userModel->getNumRows();
        echo view('templates/footer', $data);
    }

    public function delete($id, $page = ''){
        $data['title'] = $page;

        echo view('templates/header', $data);
        if ($this->userModel->delete($id)){
            echo view('messages', ['message' => 'Usuário excluído com sucesso']);
        } else {
            echo "Erro.";
        }
        echo view('templates/footer', $data);
    }

    public function create($page = 'Cadastrar Usuário'){
        $data['title'] = $page;

        echo view('templates/header', $data);
        echo view('form');
        echo view('templates/footer', $data);
    }

    public function store($page = ''){
        $data['title'] = $page;

        //$queryGlobal = ;

        //$specSelection = $this->request->getVar('especialidades');
        //$id = $this->request->getVar('id');

        //$especialidades = $this->request->getPost('especialidades');

        //echo implode("<br><br>", $especialidades).'<br><br>';

        
        /*
        foreach ($this->request->getPost('especialidades') as $especs)
        {
            //echo $especs.'<br>';
            $this->especialidadesModel->save([
                'seletor_user' => $this->request->getVar('id'),
                'nome' => $especs
            ]); 
        }
        */
        
        $queryGlobal = $this->request->getPost([
            'id',
            'nome',
            'crm',
            'telefone_fixo',
            'telefone_celular',
            'cep',
            'rua',
            'bairro',
            'cidade',
            'uf'
        ]);

        echo view('templates/header', $data);
        if ($this->userModel->save($queryGlobal)) {
            echo view("messages", [
                'message' => 'Usuário salvo com sucesso'
            ]);
        } else {
            echo "Ocorreu um erro";
        }
        echo view('templates/footer', $data);
    }

    public function edit($id, $page = 'Editar Cadastro') {
        $data['title'] = $page;

        echo view('templates/header', $data);
        echo view('form', [
            'user' => $this->userModel->find($id)
        ]);
        echo view('templates/footer', $data);
    }
}