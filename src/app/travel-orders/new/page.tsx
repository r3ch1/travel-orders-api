'use client';

import { useState } from 'react';
import { useRouter } from 'next/navigation';
import Link from 'next/link';

export default function NewTravelOrderPage() {
  const router = useRouter();
  const [isSubmitting, setIsSubmitting] = useState(false);
  const [formData, setFormData] = useState({
    destination: '',
    start_date: '',
    end_date: '',
    purpose: '',
  });

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    setIsSubmitting(true);

    try {
      // Aqui você conectará com a API do seu backend
      const apiUrl = process.env.NEXT_PUBLIC_API_URL;
      
      // Exemplo de como fazer a chamada à API:
      // const response = await fetch(`${apiUrl}/travel-orders`, {
      //   method: 'POST',
      //   headers: { 
      //     'Content-Type': 'application/json',
      //     'Authorization': `Bearer ${token}` // Se usar autenticação
      //   },
      //   body: JSON.stringify(formData),
      // });
      
      console.log('Dados do formulário:', formData);
      console.log('API URL configurada:', apiUrl);
      
      // Simulação de delay
      await new Promise(resolve => setTimeout(resolve, 1000));
      
      alert('Ordem criada com sucesso! (Conecte ao backend para funcionar)');
      router.push('/travel-orders');
    } catch (error) {
      console.error('Erro ao criar ordem:', error);
      alert('Erro ao criar ordem. Verifique o console para mais detalhes.');
    } finally {
      setIsSubmitting(false);
    }
  };

  const handleChange = (e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement>) => {
    setFormData({
      ...formData,
      [e.target.name]: e.target.value,
    });
  };

  return (
    <div className="px-4 py-6 sm:px-0">
      <div className="mb-6">
        <Link
          href="/travel-orders"
          className="text-primary-600 hover:text-primary-800 text-sm font-medium"
        >
          ← Voltar para lista
        </Link>
        <h2 className="text-3xl font-bold text-gray-900 mt-4">
          Nova Ordem de Viagem
        </h2>
        <p className="mt-1 text-sm text-gray-600">
          Preencha os dados da solicitação de viagem
        </p>
      </div>

      <div className="bg-white shadow sm:rounded-lg">
        <form onSubmit={handleSubmit} className="px-6 py-6 space-y-6">
          <div>
            <label htmlFor="destination" className="block text-sm font-medium text-gray-700">
              Destino <span className="text-red-500">*</span>
            </label>
            <input
              type="text"
              name="destination"
              id="destination"
              value={formData.destination}
              onChange={handleChange}
              required
              placeholder="Ex: São Paulo - SP"
              className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm"
            />
          </div>

          <div className="grid grid-cols-1 gap-6 sm:grid-cols-2">
            <div>
              <label htmlFor="start_date" className="block text-sm font-medium text-gray-700">
                Data de Início <span className="text-red-500">*</span>
              </label>
              <input
                type="date"
                name="start_date"
                id="start_date"
                value={formData.start_date}
                onChange={handleChange}
                required
                className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm"
              />
            </div>

            <div>
              <label htmlFor="end_date" className="block text-sm font-medium text-gray-700">
                Data de Término <span className="text-red-500">*</span>
              </label>
              <input
                type="date"
                name="end_date"
                id="end_date"
                value={formData.end_date}
                onChange={handleChange}
                required
                className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm"
              />
            </div>
          </div>

          <div>
            <label htmlFor="purpose" className="block text-sm font-medium text-gray-700">
              Objetivo da Viagem <span className="text-red-500">*</span>
            </label>
            <textarea
              name="purpose"
              id="purpose"
              rows={4}
              value={formData.purpose}
              onChange={handleChange}
              required
              placeholder="Descreva o motivo e objetivos da viagem..."
              className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm"
            />
          </div>

          <div className="flex justify-end space-x-3 pt-4 border-t">
            <button
              type="button"
              onClick={() => router.push('/travel-orders')}
              className="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500"
              disabled={isSubmitting}
            >
              Cancelar
            </button>
            <button
              type="submit"
              disabled={isSubmitting}
              className="inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 disabled:opacity-50 disabled:cursor-not-allowed"
            >
              {isSubmitting ? 'Criando...' : 'Criar Ordem'}
            </button>
          </div>
        </form>
      </div>
    </div>
  );
}
