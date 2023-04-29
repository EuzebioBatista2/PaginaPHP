# Projeto página responsiva usando PHP, MySql, CSS, Html e um pouco de JS.

> Projeto feito para representa um sistema de login completo.

O projeto realiza um sistema de login completo, onde o usuário tem todas as opções que uma página comum de login deveria possuir, desde do sistema de cadastro, esqueci minha senha e login. 

![](./images/bxl-php.svg)

# Instalações(Pré-requisítos)

> Nécessario ter instalado na máquina: **Node.js**, **Wamp-Server**, **Composer PHP** e **VsCode(dependênciaPHP)**.

```sh
    composer require phpmailer/phpmailer
```
> Na pasta raiz, execute esse comando para gerar a estrutura para o envio do email.

> No arquivo **mail.php**, localizado na pasta **php**, localize a linha de código:
**$mail->Username**, **$mail->Password** e **$mail->setFrom**. Preencha com um e-mail no qual será responsável pelo envio do código de segurança no processo de recuperação de senha.

> No wamp, no localhost MySql, nécessario a criação de um banco de dados com o nome: bancoLogin, e uma tabela com as seguintes colunas:

> nome tabela: usuarios
> colunas: id(AUTO INCREMENT), nome(VARCHAR[50]), sobrenome(VARCHAR[100]), email(VARCHAR[100]), senha(VARCHAR[100]), path(VARCHAR[200])

> OBS: Para que esse e-mail se torne valido, é nécessario configura-lo com o sistema de verificação de 2 etapas e gerar uma senha de aplicativo, por motivos de segurança do proprio Gmail.

# Historio de atualizações

* 1.0.0
    * FINISH: Finalizando primeira versão do projeto
* 0.2.3
    * CHANGE: Finalizando responsividade em login
* 0.2.2
    * CHANGE: Finalizando página de cadastro e login
* 0.2.1
    * CHANGE: Estrutura de cadastro quase pronta
* 0.2.0
    * ADD: Criando a requisição PHP
* 0.1.0
    * ADD: Inserindo página login
* 0.0.1
    * START: Projeto iniciado(Iniciando estrutura).

Euzebio Batista [@Linkedin](https://www.linkedin.com/in/euzebio-batista) - euzebio.batista2@gmail.com

Criado por Euzebio Batista.