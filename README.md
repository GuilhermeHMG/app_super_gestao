# Aplicativo Super Gestão

O **Aplicativo Super Gestão** é uma aplicação desenvolvida em Laravel que facilita a gestão de clientes e fornecedores, além de oferecer um site institucional com páginas de "Sobre Nós", "Home" e "Contato".

## Funcionalidades

-   **CRUD de Clientes**: Criação, leitura, atualização e exclusão de informações de clientes.
-   **CRUD de Fornecedores**: Criação, leitura, atualização e exclusão de informações de fornecedores.
-   **Site Institucional**:
    -   **Página Home**: Apresentação inicial do site.
    -   **Página Sobre Nós**: Informações sobre a empresa.
    -   **Página Contato**: Formulário para contato.

## Tecnologias Utilizadas

-   **Laravel**: Framework PHP para desenvolvimento ágil e estruturado.
-   **CSS**: CSS para design responsivo e moderno.
-   **MySQL**: Banco de dados relacional para armazenamento das informações.

## Requisitos

-   PHP >= 7.4
-   Composer
-   MySQL

## Instalação

1. Clone o repositório:
    ```sh
    git clone https://github.com/GuilhermeHMG/app_super_gestao.git
    ```
2. Navegue até o diretório do projeto:
    ```sh
    cd app_super_gestao
    ```
3. Instale as dependências do Composer:
    ```sh
    composer install
    ```
4. Configure o arquivo `.env` com suas credenciais de banco de dados.
5. Execute as migrações para criar as tabelas no banco de dados:
    ```sh
    php artisan migrate
    ```

## Contribuição

1. Faça um fork do projeto.
2. Crie uma branch para sua feature:
    ```sh
    git checkout -b minha-nova-feature
    ```
3. Faça commit das suas alterações:
    ```sh
    git commit -m 'Minha nova feature'
    ```
4. Envie para o repositório remoto:
    ```sh
    git push origin minha-nova-feature
    ```
5. Abra um Pull Request.

## Licença

Este projeto é apenas para fins de testes de habilidade, desenvolvido seguindo orientações aprendidas no meu curso de Laravel.
