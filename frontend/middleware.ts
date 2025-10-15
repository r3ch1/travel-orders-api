import { NextResponse } from 'next/server';
import type { NextRequest } from 'next/server';

// Middleware para autenticação e outras verificações globais
// Este é um exemplo básico - ajuste conforme necessário
export function middleware(request: NextRequest) {
  // Exemplo: verificar autenticação para rotas protegidas
  // const token = request.cookies.get('auth-token');
  
  // Se não estiver autenticado e tentar acessar rotas protegidas
  // if (!token && request.nextUrl.pathname.startsWith('/travel-orders')) {
  //   return NextResponse.redirect(new URL('/login', request.url));
  // }

  return NextResponse.next();
}

// Configurar em quais rotas o middleware deve ser executado
export const config = {
  matcher: [
    /*
     * Match all request paths except for the ones starting with:
     * - api (API routes)
     * - _next/static (static files)
     * - _next/image (image optimization files)
     * - favicon.ico (favicon file)
     */
    '/((?!api|_next/static|_next/image|favicon.ico).*)',
  ],
};
