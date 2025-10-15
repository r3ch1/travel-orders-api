# Travel Orders - Frontend

Sistema de gerenciamento de ordens de viagem desenvolvido com Next.js 14 e TypeScript.

## 🚀 Tecnologias

- **Next.js 14** - Framework React com App Router
- **TypeScript** - Tipagem estática
- **Tailwind CSS** - Estilização
- **React 18** - Biblioteca UI

## 📋 Pré-requisitos

- Node.js 18.x ou superior
- npm ou yarn

## 🔧 Instalação

1. Instale as dependências:

```bash
npm install
# ou
yarn install
```

2. Configure as variáveis de ambiente:

```bash
cp .env.example .env.local
```

Edite o arquivo `.env.local` e configure a URL da API Laravel:

```
API_URL=http://localhost:8000/api
```

## 🏃 Executando o projeto

### Modo de desenvolvimento

```bash
npm run dev
# ou
yarn dev
```

O aplicativo estará disponível em [http://localhost:3000](http://localhost:3000)

### Build para produção

```bash
npm run build
npm run start
# ou
yarn build
yarn start
```

## 📁 Estrutura do Projeto

```
frontend/
├── app/                      # App Router do Next.js
│   ├── layout.tsx           # Layout principal
│   ├── page.tsx             # Página inicial
│   ├── globals.css          # Estilos globais
│   ├── travel-orders/       # Rotas de ordens de viagem
│   │   ├── page.tsx         # Lista de ordens
│   │   ├── new/             # Nova ordem
│   │   │   └── page.tsx
│   │   └── [id]/            # Detalhes da ordem (rota dinâmica)
│   │       └── page.tsx
│   ├── users/               # Rotas de usuários
│   │   └── page.tsx
│   └── profile/             # Rota de perfil
│       └── page.tsx
├── public/                   # Arquivos estáticos
├── .env.example             # Exemplo de variáveis de ambiente
├── next.config.js           # Configuração do Next.js
├── tailwind.config.ts       # Configuração do Tailwind
├── tsconfig.json            # Configuração do TypeScript
└── package.json             # Dependências do projeto
```

## 🛣️ Rotas Configuradas

- `/` - Página inicial com links para todas as seções
- `/travel-orders` - Lista de ordens de viagem
- `/travel-orders/new` - Criar nova ordem de viagem
- `/travel-orders/[id]` - Detalhes de uma ordem específica (rota dinâmica)
- `/users` - Lista de usuários
- `/profile` - Perfil do usuário

## 🔌 Conexão com a API

O projeto está configurado para se conectar com a API Laravel (travel-orders) através de:

1. **Variável de ambiente**: Configure `API_URL` no arquivo `.env.local`
2. **Next.js Rewrites**: As requisições para `/api/*` são redirecionadas automaticamente para a API Laravel
3. **Configuração**: Veja `next.config.js` para mais detalhes

### Exemplo de uso da API

```typescript
const response = await fetch('/api/travel-orders', {
  method: 'GET',
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json',
  },
});
const data = await response.json();
```

## 🎨 Estilização

O projeto usa **Tailwind CSS** para estilização. As classes utilitárias estão disponíveis em todos os componentes.

Para personalizar o tema, edite `tailwind.config.ts`.

## 📝 Próximos Passos

- [ ] Implementar autenticação com a API Laravel
- [ ] Conectar componentes com endpoints da API
- [ ] Adicionar validação de formulários
- [ ] Implementar gerenciamento de estado (Context API ou Zustand)
- [ ] Adicionar testes (Jest + React Testing Library)
- [ ] Implementar loading states e error handling
- [ ] Adicionar paginação nas listas

## 🤝 Contribuindo

Este projeto está em desenvolvimento inicial. Contribuições são bem-vindas!
