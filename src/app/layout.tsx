import type { Metadata } from 'next';
import Link from 'next/link';
import './globals.css';

export const metadata: Metadata = {
  title: 'Travel Orders',
  description: 'Sistema de gerenciamento de ordens de viagem',
};

export default function RootLayout({
  children,
}: {
  children: React.ReactNode;
}) {
  return (
    <html lang="pt-BR">
      <body>
        <div className="min-h-screen bg-gray-50">
          {/* Navbar */}
          <nav className="bg-white shadow-sm border-b border-gray-200">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
              <div className="flex justify-between h-16">
                <div className="flex">
                  <Link href="/" className="flex-shrink-0 flex items-center">
                    <h1 className="text-xl font-bold text-primary-600">
                      ✈️ Travel Orders
                    </h1>
                  </Link>
                  
                  {/* Navigation Links */}
                  <div className="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <Link
                      href="/travel-orders"
                      className="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-700 hover:text-primary-600 hover:border-primary-500 border-b-2 border-transparent"
                    >
                      Ordens de Viagem
                    </Link>
                    <Link
                      href="/users"
                      className="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-700 hover:text-primary-600 hover:border-primary-500 border-b-2 border-transparent"
                    >
                      Usuários
                    </Link>
                  </div>
                </div>
                
                {/* User menu */}
                <div className="flex items-center">
                  <Link
                    href="/profile"
                    className="text-sm font-medium text-gray-700 hover:text-primary-600"
                  >
                    Meu Perfil
                  </Link>
                </div>
              </div>
            </div>
          </nav>

          {/* Main Content */}
          <main className="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            {children}
          </main>
        </div>
      </body>
    </html>
  );
}
