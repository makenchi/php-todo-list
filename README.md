# PHP Todo List


Esse repositório contém o código do desafio para a criação de uma TODO List usando PHP e HTML + CSS + Javascript (Jquery).

## Como rodar

### Usando o Docker

Caso já tenha o docker e o docker-compose instalado, é necessario apenas rodar o seguinte comando:

```shell
sudo docker-compose up 
# ou apenas docker-compose up
```

Os seguintes serviços deverão estar disponíveis nos seguintes endereços:

nome | endereço | porta | endereço docker
---- | -------- | ----- | ---------
MySQL | mysql://api:api-user@localhost:3306/crud-example | 3306 | mysql://api:api-user@db:3306/crud-example
PHP MyAdmin | http://localhost:8081 | 8081 | http://phpmyadmin:8081
API & Frontend | http://localhost:8080 | 8080 | http://phpmyadmin:8080

### Rodando sem Docker

Você precisará ter instalado as seguintes ferramentas antes de começar.

- PHP: Última versão estável
- Mysql: Última versão estável

Caso opte por rodar o projeto sem o docker, é necessário seguir os seguintes passos:


**1 - Instalar e inicializar o banco de dados**

Primeiro, você precisa instalar o MySQL na versão mais recente. Após realizar isso, você pode executar utilizando alguma ferramenta de gestão de banco de dados ou o próprio PHPMyAdmin para subir o SQL do Schema que está em `init-db.sql`.

**2 - Carregar os arquivos na public_html**

Após configurar o banco de dados, basta apenas copiar os arquivos para o destino final que seu HTML será renderizado. Ele está configurado para estar na pasta principal do projeto.

**3 - Configurar as variáveis de ambiente**

Nessa etapa, será necessário configurar as seguintes variaveis de ambiente para rodar o projeto:


Nome | Valores para o Docker | Descrição
----- | -----| -------
DB_HOST | localhost | O endereço do seu banco de dados. No caso de estar usando outras configurações, basta trocar esse valor
DB_NAME | crud-example | O nome do banco de dados. No caso de estar usando outras configurações, basta trocar esse valor
DB_USER | api | O usuário que você criou no banco de dados. No caso de estar usando outras configurações, basta trocar esse valor
DB_PASS | api-user | A senha do usuário. No caso de estar usando outras configurações, basta trocar esse valor


Pronto, isso deve ser o suficiente para rodar seu código!

## Documentação da API

É possível acessar a coleção do Postman para ver todos os endpoints documentados.

## Decisões

### Estrutura do projeto

A primeira ideia que tive foi de separar algumas responsabilidades dentro do projeto, seguindo um modelo parecido com o que o Laravel faz. Dessa forma, acredito que é possível controlar melhor o fluxo de como a aplicação é carregada, permitindo que possamos controlar melhor algumas lógicas e separar os conceitos.

A ideia de ter as pastas `controllers`, `views` e `models` vem da ideia do MVC, que acredito que funcionaria bem para esse crud. 

Caso tivesse a opção de usar alguma framework, optaria por usar o Laravel, onde acredito que tenha alguma dessas funções já implementadas.

### Modelo de dados

### Javascript e gerenciamento de estado

Nessa etapa, optei por tentar separar as responsabilidades em cada um dos módulos. Minha ideia era usar Typescript nesse projeto, porém por ter dúvidas se seria permitido optei por separar em um arquivo cada. 

A ideia é que tenhamos um task manager, que controla e armazena as referências das tarefas que foram criadas, assim evitando de recriar todas as tarefas toda vez que uma for alterada. Dessa forma, é possível apenas alterar um elemento da página quando eu removo, adiciono ou edito ele, o que gera um ganho de performance.

### Estilos

Para a parte de estilos, tentei usar o padrão BEM de organização de CSS, o que acredito que ajuda a escopar as classes e estilos melhores, evitando com que tenhamos interferencia em elementos que não desejamos
