CREATE TABLE especialidades (
  id int(11) NOT NULL PRIMARY KEY,
  usuario_id int(11) NOT NULL,
  nome text COLLATE utf8_unicode_ci NOT NULL,
  created_at timestamp NOT NULL DEFAULT current_timestamp(),
  updated_at timestamp NOT NULL DEFAULT current_timestamp(),
  deleted_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE usuaria (
  id int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nome varchar(120) NOT NULL,
  crm varchar(7) NOT NULL,
  especialidades varchar(255) NOT NULL,
  telefone_fixo varchar(10) DEFAULT NULL,
  telefone_celular varchar(10) DEFAULT NULL,
  cep VARCHAR(9) NOT NULL,
  rua text NOT NULL,
  bairro text NOT NULL,
  cidade text NOT NULL,
  uf text NOT NULL,
  created_at timestamp NOT NULL DEFAULT current_timestamp(),
  updated_at timestamp NOT NULL DEFAULT current_timestamp(),
  deleted_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
