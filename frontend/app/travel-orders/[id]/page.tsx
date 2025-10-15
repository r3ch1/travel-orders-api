import Link from 'next/link';

interface TravelOrderDetailProps {
  params: {
    id: string;
  };
}

export default function TravelOrderDetailPage({ params }: TravelOrderDetailProps) {
  const { id } = params;

  return (
    <div className="px-4 py-6 sm:px-0">
      <div className="mb-6">
        <Link
          href="/travel-orders"
          className="text-blue-600 hover:text-blue-800 mb-4 inline-block"
        >
          ← Voltar para lista
        </Link>
        <h2 className="text-2xl font-bold text-gray-900">
          Detalhes da Ordem de Viagem #{id}
        </h2>
      </div>

      <div className="bg-white shadow overflow-hidden sm:rounded-lg">
        <div className="px-4 py-5 sm:px-6">
          <h3 className="text-lg leading-6 font-medium text-gray-900">
            Informações da Ordem
          </h3>
          <p className="mt-1 max-w-2xl text-sm text-gray-500">
            Detalhes e status da ordem de viagem
          </p>
        </div>
        <div className="border-t border-gray-200">
          <dl>
            <div className="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt className="text-sm font-medium text-gray-500">ID</dt>
              <dd className="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                {id}
              </dd>
            </div>
            <div className="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt className="text-sm font-medium text-gray-500">Status</dt>
              <dd className="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <span className="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                  Pendente
                </span>
              </dd>
            </div>
            <div className="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt className="text-sm font-medium text-gray-500">Destino</dt>
              <dd className="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                Conecte-se à API para ver os detalhes
              </dd>
            </div>
          </dl>
        </div>
      </div>

      <div className="mt-6 flex justify-end space-x-3">
        <Link
          href={`/travel-orders/${id}/edit`}
          className="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700"
        >
          Editar
        </Link>
      </div>
    </div>
  );
}
