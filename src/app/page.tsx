import Link from 'next/link';

export default function Home() {
  return (
    <div className="px-4 py-6 sm:px-0">
      <div className="text-center mb-12">
        <h2 className="text-4xl font-bold text-gray-900 mb-4">
          Bem-vindo ao Travel Orders
        </h2>
        <p className="text-xl text-gray-600 max-w-2xl mx-auto">
          Sistema completo de gerenciamento de ordens de viagem. 
          Gerencie destinos, datas e aprove solicitações de forma simples e eficiente.
        </p>
      </div>

      {/* Feature Cards */}
      <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-10">
        <Link
          href="/travel-orders"
          className="group block p-6 bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-lg transition-shadow duration-200"
        >
          <div className="flex items-center justify-center w-12 h-12 bg-primary-100 text-primary-600 rounded-lg mb-4 group-hover:bg-primary-200 transition-colors">
            <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
          </div>
          <h3 className="text-xl font-bold text-gray-900 mb-2">
            Ordens de Viagem
          </h3>
          <p className="text-gray-600">
            Visualize, crie e gerencie todas as ordens de viagem do sistema
          </p>
        </Link>

        <Link
          href="/travel-orders/new"
          className="group block p-6 bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-lg transition-shadow duration-200"
        >
          <div className="flex items-center justify-center w-12 h-12 bg-green-100 text-green-600 rounded-lg mb-4 group-hover:bg-green-200 transition-colors">
            <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 4v16m8-8H4" />
            </svg>
          </div>
          <h3 className="text-xl font-bold text-gray-900 mb-2">
            Nova Ordem
          </h3>
          <p className="text-gray-600">
            Crie uma nova solicitação de ordem de viagem
          </p>
        </Link>

        <Link
          href="/users"
          className="group block p-6 bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-lg transition-shadow duration-200"
        >
          <div className="flex items-center justify-center w-12 h-12 bg-purple-100 text-purple-600 rounded-lg mb-4 group-hover:bg-purple-200 transition-colors">
            <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
          </div>
          <h3 className="text-xl font-bold text-gray-900 mb-2">
            Usuários
          </h3>
          <p className="text-gray-600">
            Gerencie os usuários e suas permissões no sistema
          </p>
        </Link>

        <Link
          href="/profile"
          className="group block p-6 bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-lg transition-shadow duration-200"
        >
          <div className="flex items-center justify-center w-12 h-12 bg-yellow-100 text-yellow-600 rounded-lg mb-4 group-hover:bg-yellow-200 transition-colors">
            <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
          </div>
          <h3 className="text-xl font-bold text-gray-900 mb-2">
            Meu Perfil
          </h3>
          <p className="text-gray-600">
            Visualize e edite suas informações pessoais
          </p>
        </Link>

        <div className="group block p-6 bg-gradient-to-br from-primary-50 to-primary-100 border border-primary-200 rounded-xl">
          <div className="flex items-center justify-center w-12 h-12 bg-white text-primary-600 rounded-lg mb-4">
            <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
            </svg>
          </div>
          <h3 className="text-xl font-bold text-gray-900 mb-2">
            Dashboard
          </h3>
          <p className="text-gray-700">
            Em breve: Métricas e estatísticas das suas viagens
          </p>
        </div>

        <div className="group block p-6 bg-gradient-to-br from-gray-50 to-gray-100 border border-gray-200 rounded-xl">
          <div className="flex items-center justify-center w-12 h-12 bg-white text-gray-600 rounded-lg mb-4">
            <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
          </div>
          <h3 className="text-xl font-bold text-gray-900 mb-2">
            Configurações
          </h3>
          <p className="text-gray-700">
            Em breve: Personalize o sistema conforme sua necessidade
          </p>
        </div>
      </div>

      {/* Info Box */}
      <div className="mt-12 bg-blue-50 border border-blue-200 rounded-lg p-6">
        <div className="flex">
          <div className="flex-shrink-0">
            <svg className="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
              <path fillRule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clipRule="evenodd" />
            </svg>
          </div>
          <div className="ml-3">
            <h3 className="text-sm font-medium text-blue-800">
              Backend Flexível
            </h3>
            <div className="mt-2 text-sm text-blue-700">
              <p>
                Este frontend pode ser conectado a qualquer backend: Laravel (PHP), Node.js, Go, ou qualquer API REST.
                Configure a variável <code className="bg-blue-100 px-1 rounded">NEXT_PUBLIC_API_URL</code> no arquivo <code className="bg-blue-100 px-1 rounded">.env.local</code>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
