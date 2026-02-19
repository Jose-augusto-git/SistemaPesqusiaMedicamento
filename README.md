# NewMedic - Sistema de Busca e Cadastro de Medicamentos

**NewMedic** é um sistema web desenvolvido em PHP para facilitar a busca, cadastro e gerenciamento de informações sobre medicamentos e seus principais sintomas/indicações.

O projeto foi modernizado para ser **portátil**, utilizando **SQLite** como banco de dados, eliminando a necessidade de servidores complexos como MySQL ou XAMPP.

## 🚀 Funcionalidades

- **Autenticação Segura**: Login de acesso restrito para administradores.
- **Cadastro de Medicamentos**: Registro completo com nome, abreviação, nome em latim, fonte e principais indicações.
- **Busca Avançada**:
  - Pesquisa por Nome do Medicamento.
  - Pesquisa por Sintoma/Indicação (descrição).
- **Listagem Organizada**: Visualização de todos os medicamentos cadastrados em tabela com paginação.
- **Gestão De Dados**: Edição e Exclusão de registros de forma simples e intuitiva.

## 🛠️ Tecnologias Utilizadas

- **Backend**: PHP 8+ (PDO)
- **Banco de Dados**: SQLite 3 (Arquivo local)
- **Frontend**: HTML5, CSS3, Bootstrap 5
- **Servidor**: PHP Built-in Server (via script automático)

## 📦 Como Rodar o Projeto

Este projeto não requer instalação de bancos de dados externos. Tudo o que você precisa é ter o PHP instalado no seu computador.

1. Baixe este repositório.
2. Localize o arquivo `start_system.bat` na raiz do projeto.
3. Dê um duplo clique para iniciar.
   - O script irá configurar o banco de dados automaticamente na primeira execução.
   - O navegador será aberto com o sistema rodando.
4. Use as credenciais padrão para entrar:
   - **Email**: `admin@admin.com`
   - **Senha**: `123456`

## 📸 Telas do Sistema

### Login
<img width="800" alt="Tela de Login" src="https://github.com/user-attachments/assets/af9b4580-efca-4e2a-a4be-1f3a58068d5b" />

### Dashboard / Home
*Tela inicial com informações e menu lateral.*

### Cadastro de Medicamento
<img width="800" alt="Tela de Cadastro" src="https://github.com/user-attachments/assets/c86d8800-c590-4ff4-8532-b73692126385" />
<img width="1600" height="954" alt="screencapture-localhost-8000-cadastro-php-2026-02-19-10_20_42" src="https://github.com/user-attachments/assets/09021df4-962a-4c4c-94a1-d817bb69f7e0" />

### Lista de Medicamentos
<img width="800" alt="Lista de Medicamentos" src="https://github.com/user-attachments/assets/4884fffe-a6c4-4f08-adef-44a5dc8d7514" />

### Pesquisas
**Por Medicamento:**
<img width="800" alt="Pesquisa por Medicamento" src="https://github.com/user-attachments/assets/b68ec501-a7c1-4820-ab91-9199f2a791c6" />

**Por Sintoma:**
<img width="800" alt="Pesquisa por Sintoma" src="https://github.com/user-attachments/assets/5e03a396-9fad-40db-81a8-3b5d06e154b8" />

---

Desenvolvido para fins acadêmicos e de portfólio.
