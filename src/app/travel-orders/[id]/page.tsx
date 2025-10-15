import Link from 'next/link';

interface TravelOrderDetailProps {
  params: {
    id: string;
  };
}

export default function TravelOrderDetailPage({ params }: TravelOrderDetailProps) {
  const { id } = params;

  // Aqui você fará a chamada à API para buscar os dados da ordem
  // const response = await fetch(`${process.env.NEXT_PUBLIC_API_URL}/travel-orders/${id}`);
  // const order = await response.json();

  return (
    <div className="px-4 py-6 sm:px-0">
      <div className="mb-6">
        <Link
          href="/travel-orders"
          className="text-primary-600 hover:text-primary-800 text-sm font-medium"
        >
          ← Voltar para lista
        </Link>
      </div>

      <div className="mb-6 flex justify-between items-start">
        <div>
          <h2 className="text-3xl font-bold text-gray-900">
            Ordem de Viagem #{id}
          </h2>
          <p className="mt-1 text-sm text-gray-600">
            Detalhes e status da ordem
          </p>
        </div>
        <span className="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
          Pendente
        </span>
      </div>

      {/* Informações Principais */}
      <div className="bg-white shadow overflow-hidden sm:rounded-lg mb-6">
        <div className="px-4 py-5 sm:px-6 bg-gray-50">
          <h3 className="text-lg leading-6 font-medium text-gray-900">
            Informações da Viagem
          </h3>
        </div>
        <div className="border-t border-gray-200">
          <dl>
            <div className="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt className="text-sm font-medium text-gray-500">ID</dt>
              <dd className="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                {id}
              </dd>
            </div>
            <div className="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt className="text-sm font-medium text-gray-500">Destino</dt>
              <dd className="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                São Paulo - SP
              </dd>
            </div>
            <div className="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt className="text-sm font-medium text-gray-500">Data de Início</dt>
              <dd className="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                01/01/2025
              </dd>
            </div>
            <div className="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt className="text-sm font-medium text-gray-500">Data de Término</dt>
              <dd className="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                05/01/2025
              </dd>
            </div>
            <div className="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt className="text-sm font-medium text-gray-500">Objetivo</dt>
              <dd className="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                Reunião com clientes importantes e apresentação de novos produtos
              </dd>
            </div>
            <div className="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt className="text-sm font-medium text-gray-500">Solicitante</dt>
              <dd className="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                João Silva
              </dd>
            </div>
          </dl>
        </div>
      </div>

      {/* Alert de informação */}
      <div className="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
        <div className="flex">
          <div className="flex-shrink-0">
            <svg className="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
              <path fillRule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clipRule="evenodd" />
            </svg>
          </div>
          <div className="ml-3">
            <p className="text-sm text-blue-700">
              Estes são dados de exemplo. Conecte ao backend para ver dados reais da ordem #{id}
            </p>
          </div>
        </div>
      </div>

      {/* Ações */}
      <div className="flex justify-end space-x-3">
        <button
          type="button"
          className="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500"
        >
          Editar
        </button>
        <button
          type="button"
          className="bg-green-600 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
        >
          Aprovar
        </button>
        <button
          type="button"
          className="bg-red-600 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
        >
          Rejeitar
        </button>
      </div>
    </div>
  );
}
