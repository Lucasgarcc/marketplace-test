<?php

namespace Tests\Feature;

use Tests\TestCase;

class MercadoLivreNotificationTest extends TestCase
{
    public function test_notification_endpoint_accepts_payload_and_returns_acknowledgement(): void
    {
        $payload = [
            'topic' => 'orders_v2',
            'resource' => '/orders/123456789',
            'user_id' => 123456,
            'application_id' => 6150768273078023,
            'attempts' => 1,
            'sent' => '2026-05-06T18:00:00.000Z',
        ];

        $response = $this->postJson('/api/mercadolivre/notificacoes', $payload);

        $response->assertOk()->assertExactJson([
            'received' => true,
        ]);
    }
}
