<h1 align="center"><b>🚀 Sistema de Registro de Usuários com PHP Orientado a Objetos</b></h1>

<h4 align="center"><b>Sistema de Autenticação de Usuários com PHP</b></h4>

#

### **⚠️ Introdução**

Este projeto implementa um sistema simples de autenticação de usuários utilizando PHP orientado a objetos. O sistema permite o cadastro de novos usuários, login com validação de credenciais, uma área restrita com saudação personalizada, armazenamento de e-mail em cookie (caso o usuário opte) e logout com destruição da sessão.

#

### **🔎 Funcionalidades Implementadas**

+ **Cadastro de Usuários**
   - Validação e sanitização de dados
   - Armazenamento seguro de senha com hash
   - Simulação de banco de dados usando array de objetos
+ **Autenticação**
   - Login com verificação de credenciais
   - Persistência de sessão
   - Opção de "Lembrar e-mail" usando cookies
+ **Área Restrita**
   - Dashboard personalizado
   - Proteção de rotas por sessão
   - Exibição de informações do usuário e cookie
+ **Gerenciamento de Sessão**
   - Classe estática para manipulação de sessões
   - Logout com destruição segura da sessão

#

### **📦 Estrutura de Pastas**

  * 📁 **/classes**
    * 📄 **Usuario.php** - Classe para representar usuários
    * 📄 **Sessao.php** - Classe para gerenciar sessões
    * 📄 **Autenticador.php** - Classe para autenticação e registro
  * 📄 **index.php** - Redirecionamento para login
  * 📄 **cadastro.php** - Formulário de cadastro
  * 📄 **processa_cadastro.php** - Validação e processamento de cadastro
  * 📄 **login.php** - Formulário de login
  * 📄 **processa_login.php** - Validação e processamento de login
  * 📄 **dashboard.php** - Área restrita do usuário
  * 📄 **logout.php** - Encerramento de sessão

#

### **🛠️ Ferramentas Utilizadas**

<table>
  <tr>
    <td><b>PHP 7.4+</b></td>
    <td><b>VS CODE</b></td>
    <td><b>Xampp</b></td>
    <td><b>HTML5</b></td>
    <td><b>CSS3</b></td>
  </tr>
</table>

#

### **🔧 Como Executar Localmente**

1. Clone o repositório:
2. Configure um servidor web com PHP (XAMPP, WAMP, LAMP, etc)
3. Coloque os arquivos na pasta do servidor web (htdocs, www, etc)
4. Acesse a aplicação pelo navegador:
5. Para testar, cadastre um novo usuário e faça login com as credenciais cadastradas

#

### **📋 Autor**

Desenvolvedor(es) do Projeto:
* Alcides Antonio Lorenski Neto
