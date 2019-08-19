<?php
namespace Busha\BushaPay;

use Illuminate\Support\Str;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Response;
use Busha\BushaPay\BushaPayWebhookRequest as WebhookRequest;

class BushaPayWebhookController extends Controller
{
    /**
     * Handle a Bushapay webhook call.
     *
     * @param  WebhookRequest $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handleWebhook(WebhookRequest $request)
    {
        $payload = $request->all();
        $method = 'handle'.Str::studly(str_replace(':', '_', $payload['event']['type']));
        if (method_exists($this, $method)) {
            return $this->{$method}($payload);
        }
        return $this->missingMethod();
    }

    /**
     * Handle calls to missing methods on the controller.
     *
     * @param  array  $parameters
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function missingMethod($parameters = [])
    {
        return new Response;
    }
}