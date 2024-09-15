# Sistema de Biblioteca Laravel

Este repositório contém um sistema de biblioteca desenvolvido em Laravel. O projeto abrange diversas atividades práticas para treinar habilidades com Laravel, desde o setup inicial até a implementação de funcionalidades avançadas.

## Atividades

### Atividade 1: Rodando o Primeiro Projeto

Nesta atividade, você aprenderá a configurar e rodar um projeto Laravel pela primeira vez. Inclui a instalação do Laravel, configuração do ambiente e execução do servidor local.

### Atividade 2: Treinamento sobre Migrations no Laravel

Esta atividade foca na utilização de migrations para criar e modificar estruturas de banco de dados no Laravel. Você aprenderá a criar tabelas, adicionar colunas e fazer alterações estruturais.

### Atividade 3: Treinamento sobre Seeds e Factories no Laravel

Aqui você explorará o uso de seeds e factories para popular o banco de dados com dados de exemplo. Isso é útil para testes e desenvolvimento, permitindo a criação rápida de dados fictícios.

### Atividade 4: Uso do Eloquent para Criação e Manipulação de Relacionamentos no Sistema de Biblioteca

Nesta atividade, você aprenderá a usar o Eloquent ORM do Laravel para criar e gerenciar relacionamentos entre modelos. Isso inclui relações como "um para muitos" e "muitos para muitos" no contexto do sistema de biblioteca.

### Atividade 5: Criação de Controllers para o Sistema de Biblioteca

Você irá criar controllers para gerenciar a lógica de aplicação e interagir com os modelos do sistema de biblioteca. Isso inclui a implementação de métodos para exibir, criar, atualizar e excluir registros.

### Atividade 6: Criação das Views para o Sistema de Biblioteca (+Autenticação, Rotas e Layouts)

Esta atividade envolve a criação das views para a interface do usuário, incluindo autenticação, definição de rotas e a configuração de layouts. Você aprenderá a utilizar Blade, o motor de templates do Laravel, para criar páginas dinâmicas.

### Atividade 7: Desafio: Upload de Imagem

Neste desafio, você implementará a funcionalidade de upload de imagens para o sistema de biblioteca. Isso inclui o tratamento de arquivos e o armazenamento de imagens no servidor.

### Atividade 8: Desafio: Papéis e Políticas (Policies) de Usuário

O desafio final envolve a implementação de papéis e políticas de acesso no sistema. Você aprenderá a definir e gerenciar permissões usando políticas para controlar o acesso a diferentes partes do sistema.

## Configuração do Projeto

Para configurar o projeto localmente, siga os seguintes passos:

1. **Clone o repositório:**

   ```bash
   git clone https://github.com/seu-usuario/seu-repositorio.git
   ```

2. **Navegue até o diretório do projeto:**

    ```bash
    cd seu-repositorio
    ```

3. **Instale as dependências do projeto:**

    ```bash
    composer install
    ```

4. **Crie um arquivo `.env` a partir do arquivo `.env.example`:**

    ```bash
    cp .env.example .env
    ```

5. **Gere a chave da aplicação:**

    ```bash
    php artisan key:generate
    ```

6. **Configure o banco de dados no arquivo `.env`:**

    Atualize as configurações de banco de dados no arquivo `.env` conforme suas necessidades.

7. **Execute as migrations e seeds:**

    ```bash
    php artisan migrate --seed
    ```

8. **Inicie o servidor local:**

    ```bash
    php artisan serve
    ```
9. **Criar um link simbólico (somente atividades 7 e 8):**

    ```bash
    php artisan storage:link
    ```

10. **Acesse a aplicação no navegador:**

    Abra [http://127.0.0.1:8000](http://127.0.0.1:8000) para ver o sistema em funcionamento.

## Contribuição

Sinta-se à vontade para contribuir com o projeto. Se você encontrar problemas ou tiver sugestões de melhorias, por favor, abra uma issue ou envie um pull request.