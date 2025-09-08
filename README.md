# 🚀 Travel Orders API - Microsserviço de Gestão de Viagens Corporativas

API RESTful para gerenciamento de pedidos de viagem corporativa desenvolvida em Laravel 12 com Sanctum para autenticação.

## 📋 Funcionalidades

- ✅ **Autenticação por tokens** com Laravel Sanctum
- ✅ **CRUD completo** de pedidos de viagem
- ✅ **Filtros avançados** por status, destino e período
- ✅ **Validações de negócio** (apenas admin pode aprovar/cancelar)
- ✅ **Notificações por email** para aprovações/cancelamentos
- ✅ **Políticas de acesso** (cada usuário vê apenas seus pedidos)
- ✅ **Testes automatizados** com PHPUnit
- ✅ **Dockerizado** para fácil execução

## 🛠️ Tecnologias

- **Laravel 12** - Framework PHP
- **Sanctum** - Autenticação por tokens
- **MySQL** - Banco de dados
- **Docker & Docker Compose** - Containerização
- **PHPUnit** - Testes automatizados
- **Laravel Data** - DTOs e validação

## 🚀 Como executar com Docker

### Pré-requisitos
- Docker e Docker Compose instalados
- Git

### 1. Clone o projeto
```bash
git clone git@github.com:r3ch1/travel-orders-api.git
cd travel-orders-api
```

### 2. Configure o ambiente
Copie o arquivo de ambiente:
```bash
cp .env.example .env
```

### 3. Execute os containers
```bash
docker-compose up -d
```

### 4. Instale as dependências
```bash
docker-compose exec app composer install
```

### 5. Execute as migrations e seeds
```bash
docker-compose exec app php artisan migrate
```

### 6. Gere a chave da aplicação
```bash
docker-compose exec app php artisan key:generate
```

### 7. Acesse a aplicação
A API estará disponível em: `http://rechi-travel-orders-api.localhost`

## ⚙️ Configuração de Ambiente

### Variáveis de Ambiente (.env)
```env
APP_NAME=TravelOrdersAPI
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://rechi-travel-orders-api.localhost

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=travel_orders_api
DB_USERNAME=root
DB_PASSWORD=A123456

MAIL_MAILER=smtp
MAIL_HOST=<your mailtrap host>
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

USER_ADMIN_PASSWORD=12345678
PER_PAGE=15
```

## 🔐 Autenticação

### 1. Registrar usuário
```bash
POST /api/v1/register
{
    "name": "João Silva",
    "email": "joao@empresa.com",
    "password": "senha123"
}
```

### 2. Login
```bash
POST /api/v1/login
{
    "email": "joao@empresa.com",
    "password": "senha123"
}
```

**Resposta:**
```json
{
    "token": "1|abcdef123456..."
}
```

### 3. Usar token
Adicione o header em todas requisições:
```http
Authorization: Bearer 1|abcdef123456...
```

### Usuário Admin Padrão
- **Email**: admin@system.com
- **Senha**: 12345678 (configurável no .env)

## 📋 Endpoints da API

### Pedidos de Viagem (Requer autenticação)

#### Listar pedidos (com filtros)
```http
GET /api/v1/travel-orders?status=approved&destination=Rio&date_start=2024-01-01&date_end=2024-01-31
```

#### Criar pedido
```http
POST /api/v1/travel-orders
{
    "applicant_name": "João Silva",
    "destination": "Rio de Janeiro",
    "departure_at": "2024-01-15 08:00",
    "return_at": "2024-01-20 18:00"
}
```

#### Visualizar pedido específico
```http
GET /api/v1/travel-orders/{id}
```

#### Atualizar status (apenas admin)
```http
PUT /api/v1/travel-orders/{id}
{
    "status": "approved" // ou "cancelled"
}
```

## 🧪 Executando Testes

```bash
# Executar todos os testes
docker-compose exec app php artisan test

# Executar testes específicos
docker-compose exec app php artisan test app/Modules/TravelOrder/Tests
```

## 🚀 Collection Postman

Para facilitar o teste da API, incluímos uma collection do Postman com todos os endpoints configurados:

[📥 Download da Collection Postman](https://github.com/r3ch1/travel-orders-api/blob/main/TRAVEL%20ORDERS%20API.postman_collection.json)

### Como importar:
1. Abra o Postman
2. Clique em "Import" 
3. Selecione o arquivo JSON da collection
4. Execute os requests de register/login primeiro para obter o token(Eu ja deixei configurado um pre-request-script para que o sistema seja acessado como ADMIN)

## 📊 Estrutura do Banco

### Tabelas Principais
- **users** - Usuários do sistema
- **profiles** - Perfis (Admin, Client)
- **travel_orders** - Pedidos de viagem

### Relacionamentos
- `User` → `hasMany` → `TravelOrder`
- `TravelOrder` → `belongsTo` → `User`
- `User` → `belongsTo` → `Profile`

## 📈 Estrutura do Projeto

```
app/
├── Modules/
│   ├── TravelOrder/
│   │   ├── Controllers/
│   │   ├── Data/           # DTOs
│   │   ├── UseCases/       # Casos de uso
│   │   ├── Repositories/   # Acesso a dados
│   │   └── Resources/      # Transformers
│   └── User/
├── Models/
├── Support/    # Classes Reaproveitáveis
└── Providers/
```

## 🎯 Regras de Negócio

1. ✅ Apenas usuários com perfil **Admin** podem aprovar/cancelar pedidos
2. ✅ Cada usuário só visualiza seus próprios pedidos
3. ✅ Apenas pedidos **aprovados** podem ser cancelados
4. ✅ Notificação por email ao aprovar/cancelar
5. ✅ Validação de datas (data de volta > data de ida)
6. ✅ Os pedidos não podem ser criados com "data de ida"(departure_at) menor que semana seguinte da data atual 
7. ✅ Não é possível Cancelar ou Aprovar um pedido com data de ida no passado.

## 📧 Notificações

As notificações são enviadas por email quando um pedido é aprovado ou cancelado.

## 🔒 Segurança

- Autenticação por tokens com Sanctum
- Validação de dados em todos os endpoints
- Políticas de acesso por usuário e perfil
- Proteção contra SQL Injection
- CORS configurado

## 📝 Licença

Este projeto foi desenvolvido como teste técnico.

---

## 💡 Informações Adicionais

- **Paginação**: 15 itens por página (configurável)
- **Timeout**: 60 segundos para tokens

Para dúvidas ou problemas, verifique os logs ou abra uma issue no repositório.

**📎 Link da Collection Postman:** [TRAVEL ORDERS API.postman_collection.json](https://github.com/r3ch1/travel-orders-api/blob/main/TRAVEL%20ORDERS%20API.postman_collection.json)
