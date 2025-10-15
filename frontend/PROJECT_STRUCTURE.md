# 📁 Estrutura do Projeto

```
frontend/
│
├── 📱 app/                          # App Router do Next.js 14
│   ├── layout.tsx                   # Layout raiz com navegação
│   ├── page.tsx                     # Página inicial (dashboard)
│   ├── globals.css                  # Estilos globais (Tailwind)
│   │
│   ├── 🛫 travel-orders/            # Módulo de Ordens de Viagem
│   │   ├── page.tsx                 # Lista de ordens
│   │   ├── new/
│   │   │   └── page.tsx             # Formulário de criação
│   │   └── [id]/
│   │       └── page.tsx             # Detalhes da ordem (rota dinâmica)
│   │
│   ├── 👥 users/                    # Módulo de Usuários
│   │   └── page.tsx                 # Lista de usuários
│   │
│   ├── 👤 profile/                  # Módulo de Perfil
│   │   └── page.tsx                 # Página de perfil do usuário
│   │
│   └── 🔌 api/                      # API Routes do Next.js
│       └── health/
│           └── route.ts             # Endpoint de health check
│
├── 🧩 components/                   # Componentes reutilizáveis
│   ├── LoadingSpinner.tsx           # Componente de loading
│   └── ErrorMessage.tsx             # Componente de erro
│
├── 📚 lib/                          # Bibliotecas e utilitários
│   └── api.ts                       # Cliente da API e tipos TypeScript
│
├── ⚙️ Arquivos de Configuração
│   ├── next.config.js               # Configuração do Next.js + API rewrites
│   ├── tsconfig.json                # Configuração do TypeScript
│   ├── tailwind.config.ts           # Configuração do Tailwind CSS
│   ├── postcss.config.js            # Configuração do PostCSS
│   ├── .eslintrc.json               # Configuração do ESLint
│   ├── middleware.ts                # Middleware global (auth, etc)
│   └── package.json                 # Dependências e scripts
│
├── 📝 Documentação
│   ├── README.md                    # Documentação completa
│   ├── QUICKSTART.md                # Guia rápido de início
│   └── PROJECT_STRUCTURE.md         # Este arquivo
│
└── 🔐 Variáveis de Ambiente
    ├── .env.example                 # Exemplo de variáveis de ambiente
    ├── .env.local.example           # Outro exemplo
    └── .gitignore                   # Arquivos ignorados pelo git

```

## 🎯 Funcionalidades Principais

### ✅ Rotas Configuradas (App Router)
- `/` - Dashboard principal
- `/travel-orders` - Gerenciamento de ordens de viagem
- `/travel-orders/new` - Criação de nova ordem
- `/travel-orders/[id]` - Detalhes e edição (rota dinâmica)
- `/users` - Gerenciamento de usuários
- `/profile` - Perfil do usuário

### ✅ Infraestrutura
- **TypeScript** - Tipagem estática completa
- **Tailwind CSS** - Estilização moderna e responsiva
- **API Client** - Cliente configurado para comunicação com Laravel
- **Componentes** - Componentes reutilizáveis (Loading, Error)
- **Middleware** - Sistema de middleware para auth e proteção de rotas
- **Health Check** - Endpoint para monitoramento

### ✅ Integração com Backend
- Configuração de proxy/rewrite para API Laravel
- Tipos TypeScript baseados nos modelos Laravel
- Funções helper para todas as entidades (TravelOrders, Users, Profile)

## 🚀 Como Usar

1. **Instalar dependências**
   ```bash
   npm install
   ```

2. **Configurar ambiente**
   ```bash
   cp .env.example .env.local
   ```

3. **Executar em desenvolvimento**
   ```bash
   npm run dev
   ```

4. **Build para produção**
   ```bash
   npm run build
   npm start
   ```

## 🔗 Próximas Implementações

- [ ] Autenticação com JWT/Sanctum
- [ ] Integração real com endpoints da API
- [ ] Gerenciamento de estado (Context/Zustand)
- [ ] Validação de formulários (React Hook Form + Zod)
- [ ] Testes (Jest + React Testing Library)
- [ ] Paginação e filtros
- [ ] Upload de arquivos
- [ ] Notificações em tempo real
