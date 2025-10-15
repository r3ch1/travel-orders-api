export default function UsersPage() {
  return (
    <div className="px-4 py-6 sm:px-0">
      <div className="mb-6">
        <h2 className="text-3xl font-bold text-gray-900">Usuários</h2>
        <p className="mt-1 text-sm text-gray-600">
          Gerencie os usuários do sistema
        </p>
      </div>

      <div className="bg-white shadow overflow-hidden sm:rounded-lg">
        <ul className="divide-y divide-gray-200">
          <li className="px-6 py-8 text-center">
            <svg className="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <h3 className="mt-2 text-sm font-medium text-gray-900">Conecte-se ao backend</h3>
            <p className="mt-1 text-sm text-gray-500">
              Os usuários serão carregados da sua API quando conectada
            </p>
          </li>

          {/* Exemplo de usuário */}
          <li className="px-6 py-4 hover:bg-gray-50">
            <div className="flex items-center space-x-4">
              <div className="flex-shrink-0">
                <div className="h-10 w-10 rounded-full bg-primary-100 flex items-center justify-center">
                  <span className="text-primary-600 font-medium text-sm">JS</span>
                </div>
              </div>
              <div className="flex-1 min-w-0">
                <p className="text-sm font-medium text-gray-900 truncate">
                  João Silva
                </p>
                <p className="text-sm text-gray-500 truncate">
                  joao.silva@example.com
                </p>
              </div>
              <div>
                <span className="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  Ativo
                </span>
              </div>
            </div>
          </li>

          <li className="px-6 py-4 hover:bg-gray-50">
            <div className="flex items-center space-x-4">
              <div className="flex-shrink-0">
                <div className="h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center">
                  <span className="text-purple-600 font-medium text-sm">MS</span>
                </div>
              </div>
              <div className="flex-1 min-w-0">
                <p className="text-sm font-medium text-gray-900 truncate">
                  Maria Santos
                </p>
                <p className="text-sm text-gray-500 truncate">
                  maria.santos@example.com
                </p>
              </div>
              <div>
                <span className="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  Ativo
                </span>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  );
}
