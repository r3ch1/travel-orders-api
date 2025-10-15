import Link from 'next/link';

export default function TravelOrdersPage() {
  return (
    <div className="px-4 py-6 sm:px-0">
      <div className="mb-6 flex justify-between items-center">
        <div>
          <h2 className="text-3xl font-bold text-gray-900">Ordens de Viagem</h2>
          <p className="mt-1 text-sm text-gray-600">
            Gerencie todas as solicitações de viagem
          </p>
        </div>
        <Link
          href="/travel-orders/new"
          className="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500"
        >
          <svg className="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 4v16m8-8H4" />
          </svg>
          Nova Ordem
        </Link>
      </div>

      {/* Lista de ordens - mockup */}
      <div className="bg-white shadow overflow-hidden sm:rounded-lg">
        <ul className="divide-y divide-gray-200">
          {/* Mensagem de placeholder */}
          <li className="px-6 py-8 text-center">
            <svg className="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
            </svg>
            <h3 className="mt-2 text-sm font-medium text-gray-900">Conecte-se ao backend</h3>
            <p className="mt-1 text-sm text-gray-500">
              Configure a variável <code className="bg-gray-100 px-2 py-1 rounded">NEXT_PUBLIC_API_URL</code> no arquivo <code className="bg-gray-100 px-2 py-1 rounded">.env.local</code>
            </p>
            <p className="mt-2 text-sm text-gray-500">
              Suporta Laravel, Node.js, Go ou qualquer API REST
            </p>
          </li>
          
          {/* Exemplo de como as ordens aparecerão */}
          <li className="px-6 py-4 hover:bg-gray-50">
            <div className="flex items-center justify-between">
              <div className="flex-1">
                <div className="flex items-center justify-between">
                  <h3 className="text-sm font-medium text-gray-900">
                    Exemplo: Viagem para São Paulo
                  </h3>
                  <span className="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                    Pendente
                  </span>
                </div>
                <p className="mt-1 text-sm text-gray-500">
                  01/01/2025 - 05/01/2025
                </p>
                <p className="mt-1 text-sm text-gray-600">
                  Reunião com clientes
                </p>
              </div>
              <Link
                href="/travel-orders/1"
                className="ml-4 flex-shrink-0 text-sm font-medium text-primary-600 hover:text-primary-500"
              >
                Ver detalhes →
              </Link>
            </div>
          </li>
        </ul>
      </div>
    </div>
  );
}
