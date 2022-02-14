# Introdução
Esse webapp é um CRUD (Create, Read, Update, Delete) para um hipotético gerenciamento de cadastro de médicos. Essa versão utiliza o framework PHP codeigniter versão 4.

# Ferramentas Utilizadas
* Visual Studio Code;
* Docker e DockerHUB;
* Git e GitHUB;
* phpMyAdmin;
* Miro;

## Linguagens de programação
* HTML;
* PHP + codeigniter4;
* CSS;
* MySQL;
* Javascript;

# Instalação e Execução

Para rodar a aplicação voce precisa ter o docker e docker-compose instados na sua maquina. Depois de instalados, voce pode rodar:

- git clone https://github.com/luinal/cInfomed.git
- cd cinfomed
- docker-compose up -d
- Accessar a applicação via `<IP_HOST_DOCKER>:8000`

# Limitações conhecidas
* O campo especialidades não está sendo carregado corretamente. Apesar da database conectar e o querry ser executado, por algum motivo ele retorna NULO. 
