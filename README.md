# 🚀 Laravel Lab & Workflows (com n8n)

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![n8n](https://img.shields.io/badge/n8n-EA4B71?style=for-the-badge&logo=n8n&logoColor=white)
![REST API](https://img.shields.io/badge/API-RESTful-green?style=for-the-badge)

Este repositório é dedicado ao estudo do ecossistema **Laravel** e ao desenvolvimento de rotas, APIs e webhooks projetados para futuras integrações de automação com o **n8n** (workflow automation).

O objetivo principal é construir uma base sólida em Laravel e evoluir a aplicação para trocar dados assíncronos, disparar gatilhos de eventos e manipular payloads recebidos de fluxos de trabalho no n8n.

---

## 📌 Roadmap de Aprendizado & Arquitetura

| Fase | Foco Técnico | Status |
| :--- | :--- | :---: |
| **01. Fundamentos Laravel** | Rotas, Controllers, Middleware, Eloquent ORM e Migrations. | 🛠️ Em Progresso |
| **02. Arquitetura de APIs** | Criação de Endpoints RESTful, tratamento de JSON e validações. | ⏳ Planejado |
| **03. Webhooks & Eventos** | Configuração de webhooks de saída (*outgoing*) e disparo de Jobs/Queues. | ⏳ Planejado |
| **04. Integração n8n** | Conexão bidirecional via webhooks para automação de rotinas e alertas. | 🎯 Meta Principal |

---

## 🧠 Exemplo de Fluxo (Laravel 🤝 n8n)

Um dos casos de uso planejados é o disparo de eventos do Laravel para um nó de Webhook no n8n, permitindo orquestrar tarefas pesadas ou enviar notificações externas sem travar a requisição do usuário:

```php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WebhookController extends Controller
{
    /**
     * Envia um payload de evento do Laravel para o n8n
     */
    public function triggerN8nWorkflow(Request $request)
    {
        $payload = [
            'event' => 'user_registered',
            'user'  => $request->only(['id', 'name', 'email']),
            'timestamp' => now()->toIso8601String()
        ];

        // Disparo para o webhook do n8n
        $response = Http::post(env('N8N_WEBHOOK_URL'),$payload);

        return response()->json([
            'status' => 'success',
            'n8n_response' => $response->status()
        ]);
    }
}
```

🛠️ Como Executar o Projeto Localmente
Clonar o repositório:

Bash
git clone [https://github.com/Motabcc/laravel-n8n-lab.git](https://github.com/Motabcc/laravel-n8n-lab.git)
Instalar as dependências do PHP:

Bash
composer install
Configurar as variáveis de ambiente:

Bash
cp .env.example .env
php artisan key:generate
Executar as migrations e subir o servidor:

Bash
php artisan migrate
php artisan serve
Acesse no navegador: http://localhost:8000

👨‍💻 Autor
Desenvolvido por Gabriel Mota

Estudante de Bacharelado em Ciência da Computação (BCC).
