# ProConsult Engenharia - Sistema de Suporte de Atendimento ao Cliente 🛠️

Bem-vindo ao Sistema de Suporte de Atendimento ao Cliente da ProConsult Engenharia! Este sistema foi projetado para fornecer uma solução completa de gerenciamento de atendimento ao cliente, permitindo que nossos clientes e colaboradores interajam de forma eficaz e eficiente.

O sistema está disponível online em [aqui](https://proconsult.leklob.com/), caso queira ter uma experiência de colaborador basta logar com as seguintes credenciais:
```bash
    E-mail: admin@proconsult.com
    Senha: admin123
```
PS: Para acessar as funcionalidades de colaborador altere a coluna "role_as" corresponde ao seu usuário na tabela "users" para 1. 

## 📌 Visão Geral

Este sistema utiliza tecnologias modernas para criar uma plataforma de atendimento ao cliente robusta e de fácil utilização. Com ele, você pode:

* Abrir chamados de suporte
* Gerenciar assuntos e problemas
* Acompanhar o progresso do seu chamado
* Avaliar o atendimento recebido
* Fornecer feedback importante

## 🚀 Tecnologias Utilizadas

Este projeto utiliza as seguintes tecnologias:

* [Laravel](https://laravel.com/)
* [Bootstrap](https://getbootstrap.com/)
* [jQuery](https://jquery.com/)
* [Ajax](https://developer.mozilla.org/en-US/docs/Web/Guide/AJAX)
* [MySQL](https://www.mysql.com/)

## 📋 Pré-Requisitos

Antes de começar, certifique-se de ter as seguintes ferramentas instaladas:

* [Composer](https://getcomposer.org/)
* [XAMPP](https://www.apachefriends.org/index.html)
* [Git](https://git-scm.com/)

## 🔧 Instalação

Para configurar uma cópia local do sistema, siga estas etapas simples:

1. Clone o repositório

```bash
    git clone https://github.com/kevin504-max/sitema_suporte.git
```

2. Navegue até o diretório do projeto
    
```bash
    cd suporte
```

3. Instale as dependências do projeto

```bash
    composer install
```

4. Crie um banco de dados e nomeie-o `proconsult`

5. Duplique o arquivo `.env.example` e renomeie-o para `.env`

6. No arquivo `.env`, ajuste as seguintes linhas para corresponder às credenciais do seu banco de dados

```bash
    DB_DATABASE=proconsult
    DB_USERNAME=root
    DB_PASSWORD=
```

7. Gere a chave da aplicação

```bash
    php artisan key:generate
```	

8. Execute as migrações do banco de dados

```bash
    php artisan migrate
```

9. Inicie o servidor

```bash
    php artisan serve
```

10. Acesse o sistema em `http://localhost:8000`

## ✅ Recursos
Nosso sistema de suporte inclui uma variedade de recursos, tais como:

* Abertura de chamados de suporte
* Gerenciamento completo de assuntos e problemas
* Acompanhamento em tempo real do progresso do seu chamado
* Funcionalidade de avaliação e feedback

## 🤝 Contribuições

Você está convidado a contribuir para este projeto criando pull requests ou enviando problemas se encontrar algum.

## 🧠 Agradecimentos

Obrigado por escolher nosso Sistema de Suporte de Atendimento ao Cliente da ProConsult Engenharia! Estamos comprometidos em fornecer a você e aos nossos colaboradores uma experiência eficiente e de alta qualidade para todas as suas necessidades de atendimento ao cliente. 🛠️🔧
