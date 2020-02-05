<?php

class ConsultasSQL { 

    public static $instance;
    private $schema = "UAB_Plataforma";

    protected function __construct() {
        
    }

    // Usando padrão de projeto Singleton
    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new ConsultasSQL();
        }

        return self::$instance;
    }

//------------------------------ Tabela Endereco ------------------------------------------------------------------------------

    /*
      adicionarNovoEndereco_SQL(endereco_Estado, endereco_Cidade, endereco_Bairro, endereco_CEP, endereco_Descricao)
      buscarEndereco_SQL(endereco_Id)
      alterarEndereco_SQL(endereco_Estado, endereco_Cidade, endereco_Bairro, endereco_CEP, endereco_Descricao)
      deletarEndereco_SQL(endereco_Id)
     */

    private $enderecoTable = "Endereco";
    
    private $endereco_Id = "Id_Endereco";
    private $endereco_Estado = "Estado";
    private $endereco_Cidade = "Cidade";
    private $endereco_Bairro = "Bairro";
    private $endereco_CEP = "CEP";
    private $endereco_Descricao = "Descricao";

    // Script para inserir um novo endereco no banco 
    public function adicionarNovoEndereco_SQL() {
        return "INSERT INTO {$this->schema}.{$this->enderecoTable} ({$this->endereco_Estado}, {$this->endereco_Cidade}, {$this->endereco_Bairro}, {$this->endereco_CEP}, {$this->endereco_Descricao}) VALUES (?, ?, ?, ?, ?)";
    }

    // Script para buscar endereço apartir do código do endereço
    public function buscarEndereco_SQL() {
        return "SELECT * FROM {$this->schema}.{$this->enderecoTable} WHERE {$this->endereco_Id} = ?";
    }

    // Script para alterar um endereço 
    public function alterarEndereco_SQL() {
        return "UPDATE {$this->schema}.{$this->enderecoTable} SET 
		  {$this->endereco_Estado} = ? , {$this->endereco_Cidade} = ?, {$this->endereco_Bairro} = ?, {$this->endereco_CEP} = ?, {$this->endereco_Descricao} = ? WHERE {$this->endereco_Id} = ?";
    }

    // Script para deletar um endereco
    public function deletarEndereco_SQL() {
        return "DELETE FROM {$this->schema}.{$this->enderecoTable} WHERE {$this->endereco_Id} = ?";
    }

//------------------------------ Tabela Plataforma ----------------------------------------------------------------------------

    private $plataformaTable = "Plataforma";
    
    private $plataforma_Id = "Id_Plataforma";
    private $plataforma_IdEndereco = "Id_Endereco";
    private $plataforma_Nome = "Nome";
    private $plataforma_Email = "Email";
    private $plataforma_Descricao = "Descricao";
    private $plataforma_PrimeiroTelefone = "Primeiro_Telefone";
    private $plataforma_SegundoTelefone = "Segundo_Telefone";
    private $plataforma_LinkFacebook = "Link_Facebook";
    private $plataforma_LinkInstagram = "Link_Instagram";
    private $plataforma_LinkSite = "Link_Site";

    // Script para inserir plataforma (Deve ser executado o código de verificação para que não existam duas instâncias) 
    public function adicionarPlataforma_SQL() {
        return "INSERT INTO {$this->schema}.{$this->plataformaTable} ({$this->plataforma_Id},{$this->plataforma_IdEndereco}, {$this->plataforma_Nome}, {$this->plataforma_Email}, {$this->plataforma_SegundoTelefone}, {$this->plataforma_SegundoTelefone}, {$this->plataforma_LinkFacebook}, {$this->plataforma_LinkInstagram}, {$this->plataforma_LinkSite}) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    }

    // Script para buscar dados da plataforma
    public function listarPlataforma_SQL() {
        return "SELECT * FROM {$this->schema}.{$this->plataformaTable}";
    }
    
    // Script para buscar dados da plataforma
    public function buscarPlataformaId_SQL() {
        return "SELECT * FROM {$this->schema}.{$this->plataformaTable} WHERE {$this->plataforma_Id} = ?";
    }
    
    // Script para alterar dados da plataforma 
    public function alterarDadosPlataforma_SQL() {
        return "UPDATE {$this->schema}.{$this->plataformaTable} SET 
		  {$this->plataforma_Nome} = ?, {$this->plataforma_Email} = ?, {$this->plataforma_Descricao} = ?, {$this->plataforma_PrimeiroTelefone} = ?, {$this->plataforma_SegundoTelefone} = ? WHERE {$this->plataforma_Id} = ?";
    }

    // Script para deletar uma plataforma
    public function deletarPlataforma_SQL() {
        return "DELETE FROM {$this->schema}.{$this->plataformaTable} WHERE {$this->plataforma_Id} = ?";
    }

//------------------------------ Tabela Administrador -------------------------------------------------------------------------

    /*
      adicionarNovoAdministrador_SQL(administrador_CPF, administrador_IdEndereco, administrador_Nome, administrador_Email, administrador_Senha, administrador_PrimeiroTelefone)
      adicionarNovoAdministrador2Tel_SQL(administrador_CPF, administrador_IdEndereco, administrador_Nome, administrador_Email, administrador_Senha, administrador_PrimeiroTelefone, administrador_SegundoTelefone)
      buscarAdministrador_SQL(administrador_CPF)
      autenticarAdministradorCPF_SQL(administrador_CPF, administrador_Senha)
      autenticarAdministradorEmail_SQL(administrador_CPF, administrador_Email)
      editarSenhaAdministrador_SQL(administrador_Senha, administrador_CPF)
      alterarDadosAdministrador_SQL(administrador_Nome, administrador_Email, administrador_PrimeiroTelefone, administrador_SegundoTelefone)
      deletarAdministrador_SQL(administrador_CPF)
     */

    private $administradorTable = "Administrador";
    
    private $administrador_CPF = "CPF_Administrador";
    private $administrador_IdEndereco = "Id_Endereco";
    private $administrador_Nome = "Nome";
    private $administrador_Email = "Email";
    private $administrador_Senha = "Senha";
    private $administrador_PrimeiroTelefone = "Primeiro_Telefone";
    private $administrador_SegundoTelefone = "Segundo_Telefone";
    private $administrador_Bloqueado = "Bloqueado";

    // Script para inserir um novo administrador no banco (1 Telefone)
    public function adicionarNovoAdministrador_SQL() {
        return "INSERT INTO {$this->schema}.{$this->administradorTable} ({$this->administrador_CPF},{$this->administrador_IdEndereco}, {$this->administrador_Nome}, {$this->administrador_Email}, {$this->administrador_Senha}, {$this->administrador_PrimeiroTelefone}) VALUES (?, ?, ?, ?, ?, ?)";
    }

    // Script para inserir um novo administrador no banco (2 Telefones)
    public function adicionarNovoAdministrador2Tel_SQL() {
        return "INSERT INTO {$this->schema}.{$this->administradorTable} ({$this->administrador_CPF},{$this->administrador_IdEndereco}, {$this->administrador_Nome}, {$this->administrador_Email}, {$this->administrador_Senha}, {$this->administrador_PrimeiroTelefone}, {$this->administrador_SegundoTelefone}) VALUES (?, ?, ?, ?, ?, ?, ?)";
    }

    // Script para buscar Administrador apartir do CPF 
    public function buscarAdministrador_SQL() {
        return "SELECT * FROM {$this->schema}.{$this->administradorTable} WHERE {$this->administrador_CPF} = ?";
    }

    // Script para autenticar um administrador a partir do CPF e senha 
    public function autenticarAdministradorCPF_SQL() {
        return "SELECT * FROM {$this->schema}.{$this->administradorTable} WHERE {$this->administrador_CPF} = ? AND {$this->administrador_Senha} = ?";
    }

    // Script para autenticar um administrador a partir do Email e senha 
    public function autenticarAdministradorEmail_SQL() {
        return "SELECT * FROM {$this->schema}.{$this->administradorTable} WHERE {$this->administrador_Email} = ? AND {$this->administrador_Senha} = ?";
    }

    // Script para alterar senha de um administrador 
    public function editarSenhaAdministrador_SQL() {
        return "UPDATE {$this->schema}.{$this->administradorTable} SET {$this->administrador_Senha}=? WHERE {$this->administrador_CPF} = ?";
    }

    // Script para alterar dados de um administrador (Nome, Email, Primeiro_Telefone, Segundo_Telefone)
    public function alterarDadosAdministrador_SQL() {
        return "UPDATE {$this->schema}.{$this->administradorTable} SET 
		  {$this->administrador_Nome} = ? , {$this->administrador_Email} = ?, {$this->administrador_PrimeiroTelefone} = ?, {$this->administrador_SegundoTelefone} = ? WHERE {$this->administrador_CPF} = ?";
    }

    // Script para deletar um administrador
    public function deletarAdministrador_SQL() {
        return "DELETE FROM {$this->schema}.{$this->administradorTable} WHERE {$this->administrador_CPF} = ?";
    }

    // Script para bloquear/desbloquear um administrador 
    public function bloquearDesbloquearAdministrador_SQL() {
        return "UPDATE {$this->schema}.{$this->administradorTable} SET {$this->administrador_Bloqueado}=? WHERE {$this->administrador_CPF} = ?";
    }

//------------------------------ Tabela Aluno ---------------------------------------------------------------------------------

    /*
      adicionarNovoAluno_SQL(aluno_CPF, aluno_IdEndereco, aluno_Nome, aluno_Email, aluno_Senha, aluno_PrimeiroTelefone)
      adicionarNovoAluno2Tel_SQL(aluno_CPF, aluno_IdEndereco, aluno_Nome, aluno_Email, aluno_Senha, aluno_PrimeiroTelefone, aluno_SegundoTelefone)
      buscarAluno_SQL(aluno_CPF)
      autenticarAlunoCPF_SQL(aluno_CPF, aluno_Senha)
      autenticarAlunoEmail_SQL(aluno_CPF, aluno_Email)
      editarSenhaAluno_SQL(aluno_Senha, aluno_CPF)
      alterarDadosAluno_SQL(aluno_Nome, aluno_Email, aluno_PrimeiroTelefone, aluno_SegundoTelefone)
      deletarAluno_SQL(aluno_CPF)
     */

    private $alunoTable = "Aluno";
    
    private $aluno_CPF = "CPF_Aluno";
    private $aluno_IdEndereco = "Id_Endereco";
    private $aluno_Nome = "Nome";
    private $aluno_Email = "Email";
    private $aluno_Senha = "Senha";
    private $aluno_PrimeiroTelefone = "Primeiro_Telefone";
    private $aluno_SegundoTelefone = "Segundo_Telefone";
    private $aluno_Bloqueado = "Bloqueado";

    // Script para inserir um novo aluno no banco (1 Telefone)
    public function adicionarNovoAluno_SQL() {
        return "INSERT INTO {$this->schema}.{$this->alunoTable} ({$this->aluno_CPF}, {$this->aluno_IdEndereco}, {$this->aluno_Nome}, {$this->aluno_Email}, {$this->aluno_Senha}, {$this->aluno_PrimeiroTelefone}) VALUES (?, ?, ?, ?, ?, ?)";
    }

    // Script para inserir um novo aluno no banco (2 Telefones)
    public function adicionarNovoAluno2Tel_SQL() {
        return "INSERT INTO {$this->schema}.{$this->alunoTable} ({$this->aluno_CPF}, {$this->aluno_IdEndereco}, {$this->aluno_Nome}, {$this->aluno_Email}, {$this->aluno_Senha}, {$this->aluno_PrimeiroTelefone}, {$this->aluno_SegundoTelefone}) VALUES (?, ?, ?, ?, ?, ?, ?)";
    }

    // Script para buscar aluno apartir do CPF 
    public function buscarAluno_SQL() {
        return "SELECT * FROM {$this->schema}.{$this->alunoTable} WHERE {$this->aluno_CPF} = ?";
    }

    // Script para autenticar um aluno a partir do CPF e senha 
    public function autenticarAlunoCPF_SQL() {
        return "SELECT * FROM {$this->schema}.{$this->alunoTable} WHERE {$this->aluno_CPF} = ? AND {$this->aluno_Senha} = ?";
    }

    // Script para autenticar um aluno a partir do Email e senha 
    public function autenticarAlunoEmail_SQL() {
        return "SELECT * FROM {$this->schema}.{$this->alunoTable} WHERE {$this->alunoEmail} = ? AND {$this->aluno_Senha} = ?";
    }

    // Script para alterar senha de um aluno 
    public function editarSenhaAluno_SQL() {
        return "UPDATE {$this->schema}.{$this->alunoTable} SET {$this->aluno_Senha}=? WHERE {$this->aluno_CPF} = ?";
    }

    // Script para alterar dados de um administrador (Nome, Email, Primeiro_Telefone, Segundo_Telefone)
    public function alterarDadosAluno_SQL() {
        return "UPDATE {$this->schema}.{$this->alunoTable} SET 
		  {$this->aluno_Nome} = ? , {$this->aluno_Email} = ?, {$this->aluno_PrimeiroTelefone} = ?, {$this->aluno_SegundoTelefone} = ? WHERE {$this->aluno_CPF} = ?";
    }

    // Script para deletar um aluno
    public function deletarAluno_SQL() {
        return "DELETE FROM {$this->schema}.{$this->alunoTable} WHERE {$this->aluno_CPF} = ?";
    }

    // Script para bloquear/desbloquear um aluno 
    public function bloquearDesbloquearAluno_SQL() {
        return "UPDATE {$this->schema}.{$this->alunoTable} SET {$this->aluno_Bloqueado}=? WHERE {$this->aluno_CPF} = ?";
    }

//------------------------------ Tabela Professor -----------------------------------------------------------------------------

    /*
      adicionarNovoProfessor_SQL(professor_CPF, professor_IdEndereco, professor_Nome, professor_Email, professor_Senha, professor_PrimeiroTelefone)
      adicionarNovoProfessor2Tel_SQL(professor_CPF, professor_IdEndereco, professor_Nome, professor_Email, professor_Senha, professor_PrimeiroTelefone, professor_SegundoTelefone)
      buscarProfessor_SQL(professor_CPF)
      autenticarProfessorCPF_SQL(professor_CPF, professor_Senha)
      autenticarProfessorEmail_SQL(professor_CPF, professor_Email)
      editarSenhaProfessor_SQL(professor_senha, professor_CPF)
      alterarDadosProfessor_SQL(professor_nome, professor_Email, professor_PrimeiroTelefone, professor_SegundoTelefone)
      deletarProfessor_SQL(professor_CPF)
     */

    private $professorTable = "Professor";
    
    private $professor_CPF = "CPF_Professor";
    private $professor_IdEndereco = "Id_Endereco";
    private $professor_Nome = "Nome";
    private $professor_Email = "Email";
    private $professor_Senha = "Senha";
    private $professor_PrimeiroTelefone = "Primeiro_Telefone";
    private $professor_SegundoTelefone = "Segundo_Telefone";
    private $professor_Bloqueado = "Bloqueado";

    // Script para inserir um novo professor no banco (1 Telefone)
    public function adicionarNovoProfessor_SQL() {
        return "INSERT INTO {$this->schema}.{$this->professorTable} ({$this->professor_CPF},{$this->professor_IdEndereco}, {$this->professor_Nome}, {$this->professor_Email}, {$this->professor_Senha}, {$this->professor_PrimeiroTelefone}) VALUES (?, ?, ?, ?, ?, ?)";
    }

    // Script para inserir um novo professor no banco (2 Telefones)
    public function adicionarNovoProfessor2Tel_SQL() {
        return "INSERT INTO {$this->schema}.{$this->professorTable} ({$this->professor_CPF},{$this->professor_IdEndereco}, {$this->professor_Nome}, {$this->professor_Email}, {$this->professor_Senha}, {$this->professor_PrimeiroTelefone}, {$this->professor_SegundoTelefone}) VALUES (?, ?, ?, ?, ?, ?, ?)";
    }

    // Script para buscar Professor apartir do CPF 
    public function buscarProfessor_SQL() {
        return "SELECT * FROM {$this->schema}.{$this->professorTable} WHERE {$this->professor_CPF} = ?";
    }

    // Script para autenticar um professor a partir do CPF e senha 
    public function autenticarProfessorCPF_SQL() {
        return "SELECT * FROM {$this->schema}.{$this->professorTable} WHERE {$this->professor_CPF} = ? AND {$this->professor_Senha} = ?";
    }

    // Script para autenticar um professor a partir do Email e senha 
    public function autenticarProfessorEmail_SQL() {
        return "SELECT * FROM {$this->schema}.{$this->professorTable} WHERE {$this->professor_Email} = ? AND {$this->professor_Senha} = ?";
    }

    // Script para alterar senha de um professor 
    public function editarSenhaProfessor_SQL() {
        return "UPDATE {$this->schema}.{$this->professorTable} SET {$this->professor_Senha}=? WHERE {$this->professor_CPF} = ?";
    }

    // Script para alterar dados de um professor (Nome, Email, Primeiro_Telefone, Segundo_Telefone)
    public function alterarDadosProfessor_SQL() {
        return "UPDATE {$this->schema}.{$this->professorTable} SET 
		  {$this->professor_Nome} = ? , {$this->professor_Email} = ?, {$this->professor_PrimeiroTelefone} = ?, {$this->professor_SegundoTelefone} = ? WHERE {$this->professor_CPF} = ?";
    }

    // Script para deletar um professor
    public function deletarProfessor_SQL() {
        return "DELETE FROM {$this->schema}.{$this->professorTable} WHERE {$this->professor_CPF} = ?";
    }

    // Script para bloquear/desbloquear um professor 
    public function bloquearDesbloquearProfessor_SQL() {
        return "UPDATE {$this->schema}.{$this->professorTable} SET {$this->professor_Bloqueado}=? WHERE {$this->professor_CPF} = ?";
    }

//------------------------------ Tabela Curso ---------------------------------------------------------------------------------

    /*
      adicionarNovoCurso_SQL(curso_Nome, curso_Descricao, curso_NivelDificuldade, curso_CargaHoraria, curso_PreRequisitos, curso_Modalidade)
      buscarCursoId_SQL(curso_Id)
      alterarDadosCurso_SQL(curso_Nome, curso_Descricao, curso_NivelDificuldade, curso_CargaHoraria, curso_PreRequisitos, curso_Modalidade)
      deletarCurso_SQL(curso_Id)
     */
    private $cursoTable = "Curso";
    
    private $curso_Id = "Id_Curso";
    private $curso_Nome = "Nome";
    private $curso_Descricao = "Descricao";
    private $curso_NivelDificuldade = "Nivel_Dificuldade";
    private $curso_CargaHoraria = "Carga_Horaria";
    private $curso_PreRequisitos = "Pre_Requisitos";
    private $curso_Modalidade = "Modalidade";

    // Script para inserir um novo curso no banco 
    public function adicionarNovoCurso_SQL() {
        return "INSERT INTO {$this->schema}.{$this->cursoTable} ({$this->curso_Nome}, {$this->curso_Descricao}, {$this->curso_NivelDificuldade}, {$this->curso_CargaHoraria}, {$this->curso_PreRequisitos}, {$this->curso_Modalidade}) VALUES (?, ?, ?, ?, ?, ?)";
    }

    // Script para buscar curso apartir do id 
    public function buscarCursoId_SQL() {
        return "SELECT * FROM {$this->schema}.{$this->cursoTable} WHERE {$this->curso_Id} = ?";
    }

    // Script para listar cursos
    public function listarCurso_SQL() {
        return "SELECT * FROM {$this->schema}.{$this->cursoTable}";
    }

    // Script para alterar dados de um professor (Nome, Email, Primeiro_Telefone, Segundo_Telefone)
    public function alterarDadosCurso_SQL() {
        return "UPDATE {$this->schema}.{$this->cursoTable} SET 
		  {$this->curso_Nome} = ? , {$this->curso_Descricao} = ?, {$this->curso_NivelDificuldade} = ?, {$this->curso_CargaHoraria} = ?, {$this->curso_PreRequisitos} = ?, {$this->curso_Modalidade} = ? WHERE {$this->curso_Id} = ?";
    }

    // Script para deletar um curso
    public function deletarCurso_SQL() {
        return "DELETE FROM {$this->schema}.{$this->cursoTable} WHERE {$this->curso_Id} = ?";
    }

//------------------------------ Tabela Responsaveis_Curso --------------------------------------------------------------------

    /*
      adicionarNovoResponsavelCurso_SQL(responsaveisCurso_IdCurso, responsaveisCurso_CPFProfessor)
      listarResponsavelCurso_SQL(responsaveisCurso_IdCurso)
      deletarResponsavel_SQL(responsaveisCurso_CPFProfessor, responsaveisCurso_IdCurso)
     */
    private $responsaveisCursoTable = "Responsaveis_Curso";
    
    private $responsaveisCurso_IdCurso = "Id_Curso";
    private $responsaveisCurso_CPFProfessor = "CPF_Professor";

    // Script para inserir um novo curso no banco 
    public function adicionarNovoResponsavelCurso_SQL() {
        return "INSERT INTO {$this->schema}.{$this->responsaveisCursoTable} ({$this->responsaveisCurso_IdCurso}, {$this->responsaveisCurso_CPFProfessor}) VALUES (?, ?)";
    }

    // Script para listar os curso
    public function listarResponsaveisCurso_SQL() {
        return "SELECT * FROM {$this->schema}.{$this->cursoTable}";
    }

    // Script para listar um curso em específico
    public function listarResponsaveiCurso_SQL() {
        return "SELECT * FROM {$this->schema}.{$this->cursoTable} WHERE {$this->curso_Id} = ?";
    }

    // Script para listar os responsáveis de um curso 
    public function listarResponsavelCurso_SQL() {
        return "SELECT T1.* FROM 
		{$this->schema}.{$this->professorTable} T1 INNER JOIN {$this->schema}.{$this->Responsaveis_Curso} T2 
		ON (T1.{$this->professor_CPF} = T2.{$this->responsaveisCurso_CPFProfessor}) 
		WHERE T2.{$this->responsaveisCurso_IdCurso} = ?";
    }

    // Script para deletar um responsável pelo curso 
    public function deletarResponsavel_SQL() {
        return "DELETE FROM {$this->schema}.{$this->responsaveisCursoTable} WHERE {$this->responsaveisCurso_CPFProfessor} = ? AND WHERE {$this->responsaveisCurso_IdCurso} = ?";
    }

//------------------------------ Tabela Pergunta ------------------------------------------------------------------------------
    /*
      adicionarNovaPergunta_SQL(pergunta_IdCurso, pergunta_TextoPergunta, pergunta_DataPergunta)
      listarPerguntasCurso_SQL(pergunta_IdCurso)
      deletarPergunta_SQL(pergunta_Id)
     */

    private $perguntaTable = "Pergunta";
    
    private $pergunta_Id = "Id_Pergunta";
    private $pergunta_IdCurso = "Id_Curso";
    private $pergunta_TextoPergunta = "Texto_Pergunta";
    private $pergunta_DataPergunta = "Data_Pergunta";

    // Script para inserir uma nova pergunta no banco 
    public function adicionarNovaPergunta_SQL() {
        return "INSERT INTO {$this->schema}.{$this->perguntaTable} ({$this->pergunta_IdCurso}, {$this->pergunta_TextoPergunta}, {$this->pergunta_DataPergunta}) VALUES (?, ?, ?)";
    }

    // Script para listar as perguntas de um curso 
    public function listarPerguntasCurso_SQL() {
        return "SELECT * FROM {$this->schema}.{$this->perguntaTable} WHERE {$this->pergunta_IdCurso} = ?";
    }

    // Script para deletar uma pergunta
    public function deletarPergunta_SQL() {
        return "DELETE FROM {$this->schema}.{$this->perguntaTable} WHERE {$this->pergunta_Id} = ?";
    }

//------------------------------ Tabela Resposta ------------------------------------------------------------------------------

    private $respostaTable = "Resposta";
    
    private $resposta_Id = "Id_Resposta";
    private $resposta_IdPergunta = "Id_Pergunta";
    private $resposta_TextoResposta = "Texto_Resposta";
    private $resposta_DataResposta = "Data_Resposta";

    // Script para inserir uma nova resposta no banco 
    public function adicionarNovaResposta_SQL() {
        return "INSERT INTO {$this->schema}.{$this->respostaTable} ({$this->resposta_TextoResposta}, {$this->resposta_DataResposta}) VALUES (?, ?)";
    }

    // Script para listar as respostas de uma pergunta 
    public function listarRespostasPergunta_SQL() {
        return "SELECT * FROM {$this->schema}.{$this->respostaTable} WHERE {$this->resposta_IdPergunta} = ?";
    }

    // Script para deletar uma resposta
    public function deletarResposta_SQL() {
        return "DELETE FROM {$this->schema}.{$this->respostaTable} WHERE {$this->resposta_Id} = ?";
    }

//------------------------------ Tabela Modulo --------------------------------------------------------------------------------

    private $moduloTable = "Modulo";
    
    private $modulo_Id = "Id_Modulo";
    private $modulo_IdCurso = "Id_Curso";
    private $modulo_NomeModulo = "Nome_Modulo";

    // Script para inserir um novo módulo no banco 
    public function adicionarNovoModulo_SQL() {
        return "INSERT INTO {$this->schema}.{$this->moduloTable} ({$this->modulo_IdCurso}, {$this->modulo_NomeModulo}) VALUES (?, ?)";
    }

    // Script para listar os módulos de um curso 
    public function listarModulosCurso_SQL() {
        return "SELECT * FROM {$this->schema}.{$this->moduloTable} WHERE {$this->modulo_IdCurso} = ?";
    }

    // Script para deletar um módulo
    public function deletarModulo_SQL() {
        return "DELETE FROM {$this->schema}.{$this->moduloTable} WHERE {$this->modulo_Id} = ?";
    }

//------------------------------ Tabela Aula ----------------------------------------------------------------------------------

    private $aulaTable = "Aula";
    
    private $aula_Id = "Id_Aula";
    private $aula_IdModulo = "Id_Modulo";
    private $aula_Nome = "Nome_Aula";

    // Script para inserir uma nova aula a um módulo  
    public function adicionarAulaModulo_SQL() {
        return "INSERT INTO {$this->schema}.{$this->aulaTable} ({$this->aula_IdModulo}, {$this->aula_Nome}) VALUES (?, ?)";
    }

    // Script para listar as aulas de um módulo
    public function listarAulasModulo_SQL() {
        return "SELECT * FROM {$this->schema}.{$this->aulaTable} WHERE {$this->aula_IdModulo} = ?";
    }

    // Script para deletar uma aula
    public function deletarAula_SQL() {
        return "DELETE FROM {$this->schema}.{$this->aulaTable} WHERE {$this->aula_Id} = ?";
    }

//------------------------------ Tabela Material ------------------------------------------------------------------------------

    private $materialTable = "Material";
    
    private $material_Id = "Id_Material";
    private $material_IdAula = "Id_Aula";
    private $material_Nome = "Nome_Material";
    private $material_Tipo = "Tipo_Material";
    private $material_Arquivo = "Arquivo";

    // Script para inserir um novo material no banco 
    public function adicionarNovoMAterial_SQL() {
        return "INSERT INTO {$this->schema}.{$this->materialTable} ({$this->material_IdAula}, {$this->material_Nome}, {$this->material_Tipo}, {$this->material_Arquivo}) VALUES (?, ?, ?, ?)";
    }

    // Script para listar os materiais de uma aula 
    public function listarMateriaisAula_SQL() {
        return "SELECT * FROM {$this->schema}.{$this->materialTable} WHERE {$this->material_IdAula} = ?";
    }

    // Script para deletar um módulo
    public function deletarMaterial_SQL() {
        return "DELETE FROM {$this->schema}.{$this->materialTable} WHERE {$this->material_Id} = ?";
    }

//------------------------------ Tabela Matricula -----------------------------------------------------------------------------

    private $matriculaTable = "Matricula";
    
    private $matricula_Id = "Id_Matricula";
    private $matricula_IdCurso = "Id_Curso";
    private $matricula_CPFAluno = "Data_Matricula";
    private $matricula_DataMatricula = "Id_Modulo";

    // Script para inserir uma nova matricula no banco 
    public function adicionarNovaMatricula_SQL() {
        return "INSERT INTO {$this->schema}.{$this->matriculaTable} ({$this->matricula_IdCurso}, {$this->matricula_CPFAluno}, {$this->matricula_DataMatricula}) VALUES (?, ?, ?)";
    }

    // Script para listar as matriculas de um curso
    public function listarMatriculasCurso_SQL() {
        return "SELECT * FROM {$this->schema}.{$this->matriculaTable} WHERE {$this->matricula_IdCurso} = ?";
    }

    // Script para listar as matriculas de um aluno
    public function listarMatriculasAluno_SQL() {
        return "SELECT * FROM {$this->schema}.{$this->matriculaTable} WHERE {$this->matricula_CPFAluno} = ?";
    }

    // Script para deletar um módulo
    public function deletarMatricula_SQL() {
        return "DELETE FROM {$this->schema}.{$this->matriculaTable} WHERE {$this->matricula_Id} = ?";
    }

//------------------------------ Tabela Prova ---------------------------------------------------------------------------------

    private $provaTable = "Prova";
    
    private $prova_Id = "Id_Prova";
    private $prova_IdCurso = "Id_Curso";

    // Script para inserir uma nova prova no banco 
    public function adicionarProva_SQL() {
        return "INSERT INTO {$this->schema}.{$this->provaTable} ({$this->prova_IdCurso}) VALUES (?)";
    }

    // Script para listar as provas de um curso
    public function listarProvasCurso_SQL() {
        return "SELECT * FROM {$this->schema}.{$this->provaTable} WHERE {$this->prova_IdCurso} = ?";
    }

    // Script para deletar uma prova
    public function deletarProva_SQL() {
        return "DELETE FROM {$this->schema}.{$this->provaTable} WHERE {$this->prova_Id} = ?";
    }

//------------------------------ Tabela Avaliacao -----------------------------------------------------------------------------

    private $avaliacaoTable = "Avaliacao";
    
    private $avaliacao_Id = "Id_Avaliacao";
    private $avaliacao_IdMatricula = "Id_Matricula";
    private $avaliacao_IdProva = "Id_Prova";
    private $avaliacao_Nota = "Nota";

    // Script para inserir uma nova avaliação no banco 
    public function adicionarAvaliacao_SQL() {
        return "INSERT INTO {$this->schema}.{$this->avaliacaoTable} ({$this->avaliacao_IdMatricula}, {$this->avaliacao_IdProva}, {$this->avaliacao_Nota}) VALUES (?, ?)";
    }

    // Script para listar as avaliações de um aluno matriculado
    public function listarAvaliacoesMatriculado_SQL() {
        return "SELECT T1.* FROM 
		{$this->schema}.{$this->matriculaTable} T1 INNER JOIN {$this->schema}.{$this->avaliacaoTable} T2 
		ON (T1.{$this->matricula_Id} = T2.{$this->avaliacao_IdMatricula}) 
		WHERE T1.{$this->matricula_CPFAluno} = ?";
    }

    // Script para deletar uma avaliação
    public function deletarAvaliacao_SQL() {
        return "DELETE FROM {$this->schema}.{$this->avaliacaoTable} WHERE {$this->avaliacao_Id} = ?";
    }

//------------------------------ Questoes_Provas ------------------------------------------------------------------------------

    private $questoesProvaTable = "Questoes_Provas";
    
    private $questoesProva_Id = "Id_Questao";
    
    private $questoesProva_IdProva = "Id_Prova";
    private $questoesProva_PerguntaQuestao = "Pergunta_Questao";
    private $questoesProva_AlternativaCorreta = "Alternativa_Correta";
    private $questoesProva_AlternativaIncorreta1 = "Alternativa_Incorreta_1";
    private $questoesProva_AlternativaIncorreta2 = "Alternativa_Incorreta_2";
    private $questoesProva_AlternativaIncorreta3 = "Alternativa_Incorreta_3";
    private $questoesProva_AlternativaIncorreta4 = "Alternativa_Incorreta_4";

    // Script para inserir uma questão no banco 
    public function adicionarQuestao_SQL() {
        return "INSERT INTO {$this->schema}.{$this->questoesProvaTable} ({$this->questoesProva_PerguntaQuestao}, {$this->questoesProva_AlternativaCorreta}, {$this->questoesProva_AlternativaIncorreta1}, {$this->questoesProva_AlternativaIncorreta2}, {$this->questoesProva_AlternativaIncorreta3}, {$this->questoesProva_AlternativaIncorreta4}) VALUES (?, ?, ?, ?, ?, ?)";
    }

    // Script para listar as questoes de uma prova
    public function listarQuestoesProva_SQL() {
        return "SELECT * FROM {$this->schema}.{$this->questoesProvaTable} WHERE {$this->questoesProva_IdProva} = ?";
    }

    // Script para deletar uma questão
    public function deletarQuestao_SQL() {
        return "DELETE FROM {$this->schema}.{$this->questoesProvaTable} WHERE {$this->$questoesProva_Id} = ?";
    }

}

?>
