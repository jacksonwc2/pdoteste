CREATE TABLE Categoria (
  codcat SERIAL NOT NULL, 
  descat varchar(20) NOT NULL, 
  PRIMARY KEY (codcat));
COMMENT ON COLUMN Categoria.codcat IS 'Código da categoria.';
COMMENT ON COLUMN Categoria.descat IS 'Descrição da categoria.';
CREATE TABLE Filme (
  codfil    SERIAL NOT NULL, 
  titfil    varchar(100) NOT NULL, 
  imgfil    bytea, 
  vidfil    varchar(200), 
  stafil    numeric(1, 0) DEFAULT 0 NOT NULL, 
  codgen    int4 NOT NULL, 
  codcat    int4 NOT NULL, 
  codusu    int4 NOT NULL, 
  obsfil    text, 
  datcadfil timestamp DEFAULT current_timestamp NOT NULL, 
  PRIMARY KEY (codfil));
COMMENT ON COLUMN Filme.codfil IS 'Código do Filme.';
COMMENT ON COLUMN Filme.titfil IS 'Título do Filme.';
COMMENT ON COLUMN Filme.imgfil IS 'Imagem do filme(banner).';
COMMENT ON COLUMN Filme.vidfil IS 'Trailer do filme(link do video).';
COMMENT ON COLUMN Filme.stafil IS 'Status do Filme: 0 - Não Assistido, 1 - Assistido.';
COMMENT ON COLUMN Filme.codgen IS 'Código do gênero.';
COMMENT ON COLUMN Filme.codcat IS 'Código da categoria.';
COMMENT ON COLUMN Filme.codusu IS 'Código do usuário que cadastrou.';
COMMENT ON COLUMN Filme.obsfil IS 'Observações sobre o filme.';
COMMENT ON COLUMN Filme.datcadfil IS 'Data de cadastro.';
CREATE TABLE Genero (
  codgen SERIAL NOT NULL, 
  nomgen varchar(30) NOT NULL, 
  PRIMARY KEY (codgen));
COMMENT ON TABLE Genero IS 'Cadastro dos gêneros.';
COMMENT ON COLUMN Genero.codgen IS 'Código do gênero.';
COMMENT ON COLUMN Genero.nomgen IS 'Nome do gênero.';
CREATE TABLE Tipo_Usuario (
  codtipusu SERIAL NOT NULL, 
  destipusu varchar(20) NOT NULL, 
  PRIMARY KEY (codtipusu));
COMMENT ON TABLE Tipo_Usuario IS 'Cadastro dos tipos de usuários: 1 - Admin, 2 - Operador, 3 - Consulta.';
COMMENT ON COLUMN Tipo_Usuario.codtipusu IS 'Código do tipo de usuário.';
COMMENT ON COLUMN Tipo_Usuario.destipusu IS 'Descrição do tipo de usuário.';
CREATE TABLE Usuario (
  codusu    SERIAL NOT NULL, 
  nomusu    varchar(40) NOT NULL, 
  emausu    varchar(100) NOT NULL UNIQUE, 
  senusu    varchar(32) NOT NULL, 
  codtipusu int4 NOT NULL, 
  PRIMARY KEY (codusu));
COMMENT ON TABLE Usuario IS 'Cadastro de usuários.';
COMMENT ON COLUMN Usuario.codusu IS 'Código do usuário.';
COMMENT ON COLUMN Usuario.nomusu IS 'Nome do usuário.';
COMMENT ON COLUMN Usuario.emausu IS 'E-mail do usuário.';
COMMENT ON COLUMN Usuario.senusu IS 'Senha do usuário.';
COMMENT ON COLUMN Usuario.codtipusu IS 'Código do tipo de usuário.';
ALTER TABLE Filme ADD CONSTRAINT FKFilme461385 FOREIGN KEY (codusu) REFERENCES Usuario (codusu);
ALTER TABLE Filme ADD CONSTRAINT FKFilme508143 FOREIGN KEY (codcat) REFERENCES Categoria (codcat);
ALTER TABLE Filme ADD CONSTRAINT FKFilme974045 FOREIGN KEY (codgen) REFERENCES Genero (codgen);
ALTER TABLE Usuario ADD CONSTRAINT FKUsuario980722 FOREIGN KEY (codtipusu) REFERENCES Tipo_Usuario (codtipusu);
