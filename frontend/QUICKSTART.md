# 🚀 Guia Rápido de Início

Este guia ajudará você a começar rapidamente com o projeto Travel Orders Frontend.

## 📦 Instalação Rápida

```bash
# Entre na pasta do frontend
cd frontend

# Instale as dependências
npm install

# Configure as variáveis de ambiente
cp .env.example .env.local

# Edite o .env.local e configure a URL da API (opcional)
# Por padrão, aponta para http://localhost:8000/api
```

## 🏃 Executar o Projeto

```bash
# Modo de desenvolvimento (com hot reload)
npm run dev
```

Acesse: [http://localhost:3000](http://localhost:3000)

## 🔗 Conectar com a API Laravel

1. Certifique-se de que a API Laravel está rodando:
   ```bash
   # Na raiz do projeto (pasta pai)
   php artisan serve
   ```

2. A API estará disponível em `http://localhost:8000`

3. O frontend já está configurado para se conectar automaticamente!

## 📋 Rotas Disponíveis

- **/** - Página inicial
- **/travel-orders** - Lista de ordens de viagem
- **/travel-orders/new** - Criar nova ordem
- **/travel-orders/[id]** - Detalhes de uma ordem
- **/users** - Lista de usuários
- **/profile** - Perfil do usuário

## 🎨 Tecnologias Utilizadas

- Next.js 14 (App Router)
- TypeScript
- Tailwind CSS
- React 18

## 📚 Próximos Passos

1. Implementar autenticação
2. Conectar as páginas com a API real
3. Adicionar validação de formulários
4. Implementar tratamento de erros
5. Adicionar testes

## 🆘 Problemas Comuns

### A API não está respondendo
- Verifique se o servidor Laravel está rodando
- Confirme a URL da API no arquivo `.env.local`
- Verifique se há problemas de CORS na API

### Erro ao instalar dependências
- Certifique-se de ter Node.js 18+ instalado
- Tente remover `node_modules` e `package-lock.json` e reinstalar

### Hot reload não está funcionando
- Tente parar o servidor (Ctrl+C) e iniciar novamente
- Verifique se não há conflitos de porta (3000)

## 📖 Documentação

Para mais informações, veja o [README.md](./README.md) completo.
