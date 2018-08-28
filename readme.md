# Banco Interdisciplinar de Recursos Digitais (BIRD)


## Sobre o projeto
Criação de um acervo multimídia para promover a inovação das práticas pedagógicas
no uso de recursos tecnológicos digitais. O BIRD se fundamenta nos princípios dos
Recursos Educacionais Abertos (REA), que dizem respeito ao acesso, uso e reuso de
bens educacionais comuns. 


## Diferenciais do projeto
- possibilitar ao usuário aplicar diferentes filtros de modo a encontrar com maior facilidade o material que deseja;
- possibilitar ao usuário salvar os objetos que deseja para ver posteriormente;
- permitir o envio de objetos de aprendizagem produzidos pelos usuários.


## Configuração do projeto
``` bash
### instale as dependências do projeto
$ composer install

### faça uma cópia do arquivo .env e o configure com as informações do seu banco local
$ cp .env.example .env

### gere a chave da aplicação
$ php artisan key:generate

### dê permissão 777 à pasta storage e bootstrap/cache
$ chmod 777 -R storage 
$ chmod 777 -R bootstrap/cache

### crie um schema no banco de dados e gere as tabelas com as migrations
$ php artisan migrate

### rode o programa
$ php artisan serve
```

## Autoria
Desenvolvido por Jaine Rannow Budke, 2018.

