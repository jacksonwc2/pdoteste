ALTER TABLE Filme DROP CONSTRAINT FKFilme461385;
ALTER TABLE Filme DROP CONSTRAINT FKFilme508143;
ALTER TABLE Filme DROP CONSTRAINT FKFilme974045;
ALTER TABLE Usuario DROP CONSTRAINT FKUsuario980722;
DROP TABLE IF EXISTS Categoria CASCADE;
DROP TABLE IF EXISTS Filme CASCADE;
DROP TABLE IF EXISTS Genero CASCADE;
DROP TABLE IF EXISTS Tipo_Usuario CASCADE;
DROP TABLE IF EXISTS Usuario CASCADE;