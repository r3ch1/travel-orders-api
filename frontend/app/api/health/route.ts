import { NextResponse } from 'next/server';

// Rota de health check - útil para monitoramento
export async function GET() {
  return NextResponse.json({
    status: 'ok',
    timestamp: new Date().toISOString(),
    service: 'travel-orders-frontend',
  });
}
