import Link from 'next/link';

export default function Home() {
  return (
    <div className="px-4 py-6 sm:px-0">
      <div className="border-4 border-dashed border-gray-200 rounded-lg p-8">
        <h2 className="text-3xl font-bold text-gray-900 mb-4">
          Bem-vindo ao Sistema de Travel Orders
        </h2>
        <p className="text-gray-600 mb-6">
          Sistema de gerenciamento de ordens de viagem
        </p>
        
        <div className="grid grid-cols-1 md:grid-cols-2 gap-4 mt-8">
          <Link
            href="/travel-orders"
            className="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100"
          >
            <h3 className="text-xl font-bold mb-2">Ordens de Viagem</h3>
            <p className="text-gray-600">
              Visualize e gerencie todas as ordens de viagem
            </p>
          </Link>

          <Link
            href="/travel-orders/new"
            className="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100"
          >
            <h3 className="text-xl font-bold mb-2">Nova Ordem</h3>
            <p className="text-gray-600">
              Crie uma nova ordem de viagem
            </p>
          </Link>

          <Link
            href="/users"
            className="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100"
          >
            <h3 className="text-xl font-bold mb-2">Usuários</h3>
            <p className="text-gray-600">
              Gerencie usuários do sistema
            </p>
          </Link>

          <Link
            href="/profile"
            className="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100"
          >
            <h3 className="text-xl font-bold mb-2">Perfil</h3>
            <p className="text-gray-600">
              Visualize e edite seu perfil
            </p>
          </Link>
        </div>
      </div>
    </div>
  );
}
