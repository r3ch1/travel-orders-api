// Configuração e utilitários para chamadas à API

const API_URL = process.env.API_URL || 'http://localhost:8000/api';

interface FetchOptions extends RequestInit {
  token?: string;
}

export async function apiClient(
  endpoint: string,
  options: FetchOptions = {}
) {
  const { token, ...fetchOptions } = options;

  const headers: HeadersInit = {
    'Content-Type': 'application/json',
    'Accept': 'application/json',
    ...(fetchOptions.headers as HeadersInit),
  };

  if (token) {
    headers['Authorization'] = `Bearer ${token}`;
  }

  const response = await fetch(`${API_URL}${endpoint}`, {
    ...fetchOptions,
    headers,
  });

  if (!response.ok) {
    throw new Error(`API Error: ${response.status} ${response.statusText}`);
  }

  return response.json();
}

// Tipos para Travel Orders (baseado nos modelos Laravel)
export interface TravelOrder {
  id: number;
  user_id: number;
  destination: string;
  start_date: string;
  end_date: string;
  purpose: string;
  status: string;
  created_at: string;
  updated_at: string;
}

export interface User {
  id: number;
  name: string;
  email: string;
  email_verified_at: string | null;
  created_at: string;
  updated_at: string;
}

export interface Profile {
  id: number;
  user_id: number;
  phone: string | null;
  address: string | null;
  department: string | null;
  created_at: string;
  updated_at: string;
}

// Funções para Travel Orders
export const travelOrdersApi = {
  getAll: async (token?: string): Promise<TravelOrder[]> => {
    return apiClient('/travel-orders', { token });
  },

  getById: async (id: number, token?: string): Promise<TravelOrder> => {
    return apiClient(`/travel-orders/${id}`, { token });
  },

  create: async (data: Partial<TravelOrder>, token?: string): Promise<TravelOrder> => {
    return apiClient('/travel-orders', {
      method: 'POST',
      body: JSON.stringify(data),
      token,
    });
  },

  update: async (id: number, data: Partial<TravelOrder>, token?: string): Promise<TravelOrder> => {
    return apiClient(`/travel-orders/${id}`, {
      method: 'PUT',
      body: JSON.stringify(data),
      token,
    });
  },

  delete: async (id: number, token?: string): Promise<void> => {
    return apiClient(`/travel-orders/${id}`, {
      method: 'DELETE',
      token,
    });
  },
};

// Funções para Users
export const usersApi = {
  getAll: async (token?: string): Promise<User[]> => {
    return apiClient('/users', { token });
  },

  getById: async (id: number, token?: string): Promise<User> => {
    return apiClient(`/users/${id}`, { token });
  },
};

// Funções para Profile
export const profileApi = {
  get: async (token?: string): Promise<Profile> => {
    return apiClient('/profile', { token });
  },

  update: async (data: Partial<Profile>, token?: string): Promise<Profile> => {
    return apiClient('/profile', {
      method: 'PUT',
      body: JSON.stringify(data),
      token,
    });
  },
};
