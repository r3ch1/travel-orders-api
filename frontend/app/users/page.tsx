export default function UsersPage() {
  return (
    <div className="px-4 py-6 sm:px-0">
      <div className="mb-6 flex justify-between items-center">
        <h2 className="text-2xl font-bold text-gray-900">Usuários</h2>
      </div>

      <div className="bg-white shadow overflow-hidden sm:rounded-md">
        <ul className="divide-y divide-gray-200">
          <li className="px-6 py-4">
            <p className="text-gray-600 text-center">
              Conecte-se à API para visualizar os usuários
            </p>
            <p className="text-sm text-gray-500 text-center mt-2">
              Configure a variável de ambiente API_URL no arquivo .env.local
            </p>
          </li>
        </ul>
      </div>
    </div>
  );
}
