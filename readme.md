# Teste Supero Backend

Foi desenvolvida uma API utilizando laravel.

## Requisito

Antes de continuar é necessário que tenha docker e docker-compose.

## Instalação


A instalação através do makefile, após clonar o repositório, basta executar:

```bash
git checkout dev
```

```bash
make up
```

## Rotas API

```
Listar detalhes - GET http://localhost:8080/api/v1/tasks/{id}
Listar todas - GET http://localhost:8080/api/v1/tasks
Listar todas incluindo removidas - GET http://localhost:8080/api/v1/tasks-all
Alterar task - PUT http://localhost:8080/api/v1/tasks/{id}
Reabrir task - PUT http://localhost:8080/api/v1/tasks/{id}/open
Concluir task - PUT http://localhost:8080/api/v1/tasks/{id}/done
Adicionar task - POST http://localhost:8080/api/v1/tasks
Remover task - DELETE http://localhost:8080/api/v1/tasks/{id}
```
