# Dati Tecnologia - Vaga p/ FullStack

Teste de conhecimento para:

  - Consumo de API
  - Noções de Frontend
  - Lógica de programação

# Objetivos

  - Desenvolver uma aplicação CRUD p/ utilizar uma API disponibilizada pela DATI
  - Deve-se utilizar ReactJS

O que você vai ter:

  - Uma API de produtos através de rotas POST, PUT, GET, DELETE
  - Acesse a API via ....
  
O que você deve fazer usando ReactJS:

  - Criar/Editar/Listar/Deletar produtos 
  - Disponibilize o codigo do teste via repositório
  - Criar a opção de votar em um determinado produto
  - Ver os produtos mais votados
  - Possibilitar ativar/desativar um produto
  - Listagem com opções de filtro
   
 O que será avaliado:
 
  - Pode-se utilizar uma plataforma que permite automatizar o processo de deploy de aplicações estáticas.

### Informações da API

Dillinger is currently extended with the following plugins. Instructions on how to use them in your own application are linked below.

| HTTP Metodo | Rota |Detalhes|
| ------ | ------ | ------ |
| GET | /api/products?cmd=details&id={id} | mostrar detalhes de um produto
| GET | /api/products?cmd=list | mostrar todos os produtos
| POST | /api/products | cadastrar produto
| PUT | /api/products/id | atualizar produto
| DELETE | /api/products/id | deletar produto


### Produto

O model produto possui as seguintes caracteristicas

| CAMPO | TIPO |DETALHES|
| ------ | ------- | ---------|
| description | STRING | tam. max: 150
| short_description | STRING | tam. max: 30
| code | STRING | tam. max: 10
| status | ENUM | enable ou disable
| qty | INTEGER | 
| vote | INTEGER | 

