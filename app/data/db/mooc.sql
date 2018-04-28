
CREATE TABLE usuario ( id int(11) not null auto_increment,
  nome varchar(120),
  cpf varchar(15),
  email varchar(120),
  senha varchar(50) not null,
  tipo int(2), primary key(id),
  unique key email (email),
  unique key cpf (cpf)
);

CREATE TABLE curso ( id int(11) not null auto_increment,
  nome varchar(120),
  descricao varchar(256),
  idProfessor int(11),
  primary key(id)
);

CREATE TABLE aula ( id int(11) not null auto_increment,
  nome varchar(120),
  descricao varchar(256),
  idCurso int(11),
  video varchar(128),
  videoLibras varchar(128),
  primary key(id),
  FOREIGN KEY (idCurso) REFERENCES curso(id)
);
