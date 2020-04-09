CREATE DATABASE UAB_Plataforma

USE UAB_Plataforma


/*---------------------------------------------------------------------------------------------------------------------------------------
------------------------------ Tabela Endereco ----------------------------------------------------------------------------------------

	A tabela "Endereco" tem por finalidade armazenar as informações de localização dos usuários.
	Uma linha nessa tabela pode ser criada por um aluno, professor ou administrador durante o processo de cadastro.
*/

CREATE TABLE Endereco (

    Id_Endereco int(5) NOT NULL, 	
    Estado ENUM('Acre (AC)', 'Alagoas (AL)', 'Amapá (AP)', 'Amazonas (AM)', 'Bahia (BA)', 'Ceará (CE)', 'Distrito Federal (DF)','Espírito Santo (ES)', 'Goiás (GO)', 'Maranhão (MA)', 'Mato Grosso (MT)', 'Mato Grosso do Sul (MS)', 'Minas Gerais (MG)', 'Pará (PA)', 'Paraíba (PB)', 'Paraná (PR)', 'Pernambuco (PE)', 'Piauí (PI)', 'Rio de Janeiro (RJ)', 'Rio Grande do Norte (RN)', 'Rio Grande do Sul (RS)', 'Rondônia (RO)', 'Roraima (RR)', 'Santa Catarina (SC)', 'São Paulo (SP)', 'Sergipe (SE)', 'Tocantins (TO)'),
    Logadouro varchar(200) NOT NULL,
	Cidade varchar(100) NOT NULL,
    Bairro varchar(50) NOT NULL,
    CEP varchar(8) NOT NULL,
    Descricao varchar(500) NOT NULL	
    
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE Endereco ADD PRIMARY KEY (Id_Endereco);

ALTER TABLE Endereco MODIFY Id_Endereco int(5) NOT NULL AUTO_INCREMENT;

/*---------------------------------------------------------------------------------------------------------------------------------------
------------------------------ Tabela Plataforma --------------------------------------------------------------------------------------

	A tabela "Plataforma" tem por finalidade armazenar as informações gerais da plataforma.
*/

CREATE TABLE Plataforma ( 

    Id_Plataforma int(11) NOT NULL,
    Id_Endereco int(5) NOT NULL,
    Nome varchar(100) NOT NULL,
    Email varchar(50) NOT NULL,
    Senha varchar(25) NOT NULL,
    Descricao varchar(500) NOT NULL,
    ComoFunciona varchar(500) NOT NULL,
    Primeiro_Telefone varchar(12) NOT NULL,
	Link_Facebook varchar(200) DEFAULT NULL,
	Link_Instagram varchar(200) DEFAULT NULL,
	Link_Site varchar(200) DEFAULT NULL,

    CONSTRAINT UC_Administrador UNIQUE (email, Primeiro_Telefone)
	
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE Plataforma ADD PRIMARY KEY (Id_Plataforma);

ALTER TABLE Plataforma MODIFY Id_Plataforma int(5) NOT NULL AUTO_INCREMENT;

ALTER TABLE Plataforma ADD CONSTRAINT fk_Plataforma_IdEndereco FOREIGN KEY (Id_Endereco) REFERENCES Endereco (Id_Endereco)  ON UPDATE CASCADE ON DELETE CASCADE;


/*---------------------------------------------------------------------------------------------------------------------------------------
------------------------------ Tabela Noticia -------------------------------------------------------------------------------------------

	
*/

CREATE TABLE Noticia ( 

    Id_Noticia int(5) NOT NULL,
    Titulo varchar(50) NOT NULL,
    BreveDescricao varchar(100) NOT NULL,
    CorpoNoticia varchar(1000) NOT NULL,
	DataPublicacao varchar(200) NOT NULL,
	FotoNoticia varchar(200) DEFAULT NULL,

    CONSTRAINT UC_Noticia UNIQUE (Titulo)
	
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE Noticia ADD PRIMARY KEY (Id_Noticia);

ALTER TABLE Noticia MODIFY Id_Noticia int(5) NOT NULL AUTO_INCREMENT;


/*---------------------------------------------------------------------------------------------------------------------------------------
------------------------------ Tabela Colaborador ---------------------------------------------------------------------------------------

	
*/

CREATE TABLE Colaborador ( 

    CPF_Colaborador varchar(11) NOT NULL,
    Id_Endereco int(5) NOT NULL,
    Nome varchar(100) NOT NULL,
    Email varchar(50) NOT NULL,
    Primeiro_Telefone varchar(12) NOT NULL,
	Funcao varchar(100) NOT NULL,
	BreveDescricao varchar(500) NOT NULL,
	FotoColaborador varchar(200) NOT NULL,

    CONSTRAINT UC_Colaborador UNIQUE (CPF_Colaborador, email, Primeiro_Telefone, FotoColaborador)
	
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE Colaborador ADD PRIMARY KEY (CPF_Colaborador);

ALTER TABLE Colaborador ADD CONSTRAINT fk_Colaborador_IdEndereco FOREIGN KEY (Id_Endereco) REFERENCES Endereco (Id_Endereco)  ON UPDATE CASCADE ON DELETE CASCADE;

/*---------------------------------------------------------------------------------------------------------------------------------------
------------------------------ Tabela Administrador -----------------------------------------------------------------------------------

	A tabela "Administrador" tem por finalidade armazenar as informações de um administrador da plataforma.
	O sitema não deve permitir que sejam criados administradores por pessoas não autorizadas.
*/

CREATE TABLE Administrador ( 

    CPF_Administrador varchar(11) NOT NULL,
    Id_Endereco int(5) NOT NULL,
    Nome varchar(100) NOT NULL,
    Email varchar(50) NOT NULL,
    Senha varchar(25) NOT NULL,
    Primeiro_Telefone varchar(12) NOT NULL,
    Bloqueado bit NOT NULL DEFAULT 0,

    CONSTRAINT UC_Administrador UNIQUE (CPF_Administrador, email, Primeiro_Telefone)
	
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE Administrador ADD PRIMARY KEY (CPF_Administrador);

ALTER TABLE Administrador ADD CONSTRAINT fk_Administrador_IdEndereco FOREIGN KEY (Id_Endereco) REFERENCES Endereco (Id_Endereco)  ON UPDATE CASCADE ON DELETE CASCADE;

/*---------------------------------------------------------------------------------------------------------------------------------------
------------------------------ Tabela Aluno -------------------------------------------------------------------------------------------

	A tabela "Aluno" tem por finalidade armazenar as informações de um aluno cadastrado na plataforma.
	Pode ser criado por um visitante da plataforma.
*/

CREATE TABLE Aluno ( 

    CPF_Aluno varchar(11) NOT NULL,
    Id_Endereco int(5) NOT NULL,
    Nome varchar(100) NOT NULL,
    Email varchar(50) NOT NULL,
    Senha varchar(25) NOT NULL,
    Primeiro_Telefone varchar(12) NOT NULL,
    Bloqueado bit NOT NULL DEFAULT 0,

    CONSTRAINT UC_Aluno UNIQUE (CPF_Aluno, email, Primeiro_Telefone)
	
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE Aluno ADD PRIMARY KEY (CPF_Aluno);

ALTER TABLE Aluno ADD CONSTRAINT fk_Aluno_IdEndereco FOREIGN KEY (Id_Endereco) REFERENCES Endereco (Id_Endereco)  ON UPDATE CASCADE ON DELETE CASCADE;

/*---------------------------------------------------------------------------------------------------------------------------------------
------------------------------ Tabela Professor ---------------------------------------------------------------------------------------
 
	A tabela "Professor" tem por objetivo armazenas as informações dos professores cadastrados na plataforma. 
	Uma linha nessa tabela pode ser criada por um administrador da plataforma.
*/

CREATE TABLE Professor ( 

    CPF_Professor varchar(11),
    Id_Endereco int(5) NOT NULL,
    Nome varchar(100) NOT NULL,
    Email varchar(50) NOT NULL,
    Senha varchar(25) NOT NULL,
    Primeiro_Telefone varchar(12) NOT NULL,
    Bloqueado bit NOT NULL DEFAULT 0,
	FotoProfessor varchar(200) NOT NULL,

    CONSTRAINT UC_Professor UNIQUE (CPF_Professor, email, Primeiro_Telefone)
	
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE Professor ADD PRIMARY KEY (CPF_Professor);

ALTER TABLE Professor ADD CONSTRAINT fk_Professor_IdEndereco FOREIGN KEY (Id_Endereco) REFERENCES Endereco (Id_Endereco)  ON UPDATE CASCADE ON DELETE CASCADE;

/*---------------------------------------------------------------------------------------------------------------------------------------
------------------------------ Tabela Curso -------------------------------------------------------------------------------------------

	A tabela "Curso" tem por objetivo armazenar as informações relacionadas a um curso.
	Uma nova linha nessa tabela pode ser criada por um professor cadastrado.
*/

CREATE TABLE Curso (

    Id_Curso int(5) NOT NULL,
    Nome varchar(100) NOT NULL,
    Descricao varchar(500) NOT NULL,
    Nivel_Dificuldade ENUM('Fácil', 'Moderado', 'Dificil') NOT NULL, 
    Carga_Horaria ENUM('20h','40h','60h','80h','100h','120h') NOT NULL,
    Pre_Requisitos varchar(200) DEFAULT 'Sem pré-requisitos.' NOT NULL,	
    Modalidade ENUM('Presencial', 'Semipresencial', 'EaD') NOT NULL,
	FotoCurso varchar(200) NOT NULL
	

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE Curso ADD PRIMARY KEY (Id_Curso);

ALTER TABLE Curso MODIFY Id_Curso int(5) NOT NULL AUTO_INCREMENT;

/*---------------------------------------------------------------------------------------------------------------------------------------
------------------------------ Tabela Responsaveis_Curso ------------------------------------------------------------------------------

	A tabela "Responsaveis_Curso" tem por objetivo armazenar informações sobre os criadores dos cursos.
	Uma nova linha nessa tabela pode ser criada por professores cadastrados que criam cursos.
*/

CREATE TABLE Responsaveis_Curso (

    Id_Curso int(5) NOT NULL,
    CPF_Professor varchar(11) NOT NULL

)  ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE Responsaveis_Curso ADD CONSTRAINT fk_ResponsaveisCurso_IdCurso FOREIGN KEY (Id_Curso) REFERENCES Curso (Id_Curso)  ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE Responsaveis_Curso ADD CONSTRAINT fk_ResponsaveisCurso_CPF_Professor FOREIGN KEY (CPF_Professor) REFERENCES Professor (CPF_Professor)  ON UPDATE CASCADE ON DELETE CASCADE;

/*---------------------------------------------------------------------------------------------------------------------------------------
------------------------------ Tabela Pergunta ----------------------------------------------------------------------------------------

	A tabela "Pergunta" tem por objetivo armazenar as perguntas realizadas por alunos matriculados em cursos.
	Uma nova linha nessa tabela pode ser criada por alunos matriculados no curso correspondente a chave estrangeira.
*/

CREATE TABLE Pergunta (

    Id_Pergunta int(5) NOT NULL,
    Id_Curso int(5) NOT NULL,
    Texto_Pergunta VARCHAR(500) NOT NULL,
    Data_Pergunta DATE NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE Pergunta ADD PRIMARY KEY (Id_Pergunta);

ALTER TABLE Pergunta MODIFY Id_Pergunta int(5) NOT NULL AUTO_INCREMENT;

ALTER TABLE Pergunta ADD CONSTRAINT fk_Pergunta_IdCurso FOREIGN KEY (Id_Curso) REFERENCES Curso (Id_Curso)  ON UPDATE CASCADE ON DELETE CASCADE;


/*-------------------------------------------------------------------------------------------------------------------------------
------------------------------ Tabela Resposta --------------------------------------------------------------------------------

	A tabela "Resposta" tem por objetivo armazenar as respostas de uma pergunta presente na tabela "Pergunta".
	Uma linha nessa tabela pode ser criada por alunos matriculados no curso a qual a pergunta relacionada pertence. 
*/

CREATE TABLE Resposta(

    Id_Resposta int(5) NOT NULL,
    Id_Pergunta int(5) NOT NULL,
    Texto_Resposta VARCHAR(500) NOT NULL,
    Data_Resposta DATE NOT NULL
	
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE Resposta ADD PRIMARY KEY (Id_Resposta);

ALTER TABLE Resposta MODIFY Id_Resposta int(5) NOT NULL AUTO_INCREMENT;

ALTER TABLE Resposta ADD CONSTRAINT fk_Resposta_IdPergunda FOREIGN KEY (Id_Pergunta) REFERENCES Pergunta (Id_Pergunta);

/*-------------------------------------------------------------------------------------------------------------------------------
------------------------------ Tabela Modulo ----------------------------------------------------------------------------------

	A tabela "Modulo" tem por objetivo armazenar as informações de um módulo de determinado curso.
	Uma linha nessa tabela pode ser criada por professores criadores do curso. 
*/

CREATE TABLE Modulo(

    Id_Modulo int(5) NOT NULL,
    Id_Curso int(5) NOT NULL,
    Nome_Modulo VARCHAR(50) NOT NULL
	
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE Modulo ADD PRIMARY KEY (Id_Modulo);

ALTER TABLE Modulo MODIFY Id_Modulo int(5) NOT NULL AUTO_INCREMENT;

ALTER TABLE Modulo ADD CONSTRAINT fk_Modulo_IdCurso FOREIGN KEY (Id_Curso) REFERENCES Curso (Id_Curso);

/*-------------------------------------------------------------------------------------------------------------------------------
------------------------------ Tabela Aula ------------------------------------------------------------------------------------

	A tabela "Aula" tem por objetivo armazenar as informações de determinado módulo que por sua vez pertence a determinado curso.
	Uma linha nessa tabela pode ser criada por professores criadores do curso. 
*/

CREATE TABLE Aula(
	
    Id_Aula int(5) NOT NULL,
    Id_Modulo int(5) NOT NULL,
    Nome_Aula VARCHAR(50) NOT NULL	
	
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE Aula ADD PRIMARY KEY (Id_Aula);

ALTER TABLE Aula MODIFY Id_Aula int(5) NOT NULL AUTO_INCREMENT;

ALTER TABLE Aula ADD CONSTRAINT fk_Aula_IdModulo FOREIGN KEY (Id_Modulo) REFERENCES Modulo (Id_Modulo);

/*-------------------------------------------------------------------------------------------------------------------------------
------------------------------ Tabela Material --------------------------------------------------------------------------------

	A tabela "Material" tem por objetivo armazenar as informações de um módulo de determinado curso.
	Uma linha nessa tabela pode ser criada por professores criadores do curso. 
*/

CREATE TABLE Material(

    Id_Material int(5) NOT NULL,
    Id_Aula int(5) NOT NULL,
    Nome_Material VARCHAR(50) NOT NULL, 
    Tipo_Material VARCHAR (10),
    Arquivo LONGBLOB NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE Material ADD PRIMARY KEY (Id_Material);

ALTER TABLE Material MODIFY Id_Material int(5) NOT NULL AUTO_INCREMENT;

ALTER TABLE Material ADD CONSTRAINT fk_Material_IdAula FOREIGN KEY (Id_Aula) REFERENCES Aula (Id_Aula);

/*-------------------------------------------------------------------------------------------------------------------------------
------------------------------ Tabela Matricula -------------------------------------------------------------------------------

	A tabela "Matricula" tem por objetivo armazenar as informações de um aluno matriculado em determinado curso.
	Uma linha nessa tabela pode ser criada por alunos cadastrados. 
*/

CREATE TABLE Matricula(

    Id_Matricula int(5) NOT NULL,
    Id_Curso int(5) NOT NULL,
    CPF_Aluno varchar(11) NOT NULL,
    Data_Matricula DATE NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE Matricula ADD PRIMARY KEY (Id_Matricula);

ALTER TABLE Matricula MODIFY Id_MAtricula int(5) NOT NULL AUTO_INCREMENT;

ALTER TABLE Matricula ADD CONSTRAINT fk_Matricula_IdCurso FOREIGN KEY (Id_Curso) REFERENCES Curso (Id_Curso);

ALTER TABLE Matricula ADD CONSTRAINT fk_Matricula_CPFAluno FOREIGN KEY (CPF_Aluno) REFERENCES Aluno (CPF_Aluno);


/*----------------------------------------------------------------------------------------------------------------------------
------------------------------ Tabela Prova --------------------------------------------------------------------------------

	A tabela "Prova" tem por objetivo representar uma avaliação de determinado curso.
	Uma linha nessa tabela pode ser criada pelo professor que criou o curso.
*/

CREATE TABLE Prova(
    
    Id_Prova int(5) NOT NULL,
    Id_Curso int(5) NOT NULL
	
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE Prova ADD PRIMARY KEY (Id_Prova);

ALTER TABLE Prova MODIFY Id_Prova int(5) NOT NULL AUTO_INCREMENT;

ALTER TABLE Prova ADD CONSTRAINT fk_Prova_IdProva FOREIGN KEY (Id_Curso) REFERENCES Curso (Id_Curso);

/*----------------------------------------------------------------------------------------------------------------------------
------------------------------ Tabela Avaliacao ----------------------------------------------------------------------------

	A tabela "Avaliacao" tem por objetivo armazenar as avaliações de um aluno matriculado em um curso.
*/

CREATE TABLE Avaliacao(

    Id_Avaliacao int(5) NOT NULL,
    Id_Matricula int(5) NOT NULL,
    Id_Prova int(5) NOT NULL,
    Nota int(4) NOT NULL
	
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE Avaliacao ADD PRIMARY KEY (Id_Avaliacao);

ALTER TABLE Avaliacao MODIFY Id_Avaliacao int(5) NOT NULL AUTO_INCREMENT;

ALTER TABLE Avaliacao ADD CONSTRAINT fk_Avaliacao_IdMatricula FOREIGN KEY (Id_Matricula) REFERENCES Matricula (Id_Matricula);

ALTER TABLE Avaliacao ADD CONSTRAINT fk_Avaliacao_IdProva FOREIGN KEY (Id_Prova) REFERENCES Prova (Id_Prova);


/*----------------------------------------------------------------------------------------------------------------------------
------------------------------ Tabela Questoes_Prova -----------------------------------------------------------------------

	A tabela "Questoes_Prova" tem por objetivo armazenar o conteudo de determinada questão de uma prova.
	Uma linha nessa tabela pode ser criada pelo professor que criou o curso.
*/

CREATE TABLE Questoes_Prova(

    Id_Questao int(5) NOT NULL,
    Id_Prova int(5) NOT NULL,
    Pergunta_Questao VARCHAR(500) NOT NULL,
    Alternativa_Correta VARCHAR(100) NOT NULL,
    Alternativa_Incorreta_1 VARCHAR(100) NOT NULL,
    Alternativa_Incorreta_2 VARCHAR(100) NOT NULL,
    Alternativa_Incorreta_3 VARCHAR(100) NOT NULL,
    Alternativa_Incorreta_4 VARCHAR(100) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE Questoes_Prova ADD PRIMARY KEY (Id_Questao);

ALTER TABLE Questoes_Prova MODIFY Id_Questao int(5) NOT NULL AUTO_INCREMENT;

ALTER TABLE Questoes_Prova ADD CONSTRAINT fk_QuestoesProva_IdProva FOREIGN KEY (Id_Prova) REFERENCES Prova (Id_Prova);

