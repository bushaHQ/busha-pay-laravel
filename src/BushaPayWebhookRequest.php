<?php

namespace Busha\BushaPay;

use Illuminate\Foundation\Http\FormRequest;

class BushaPayWebhookRequest extends FormRequest 
{
     /**
     * Determine if the request is authorized to make.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->hasValidSignature();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id'  => 'required',
            'event' => 'required',
        ];
    }

    protected function hasValidSignature(): bool
    {
        return $this->hasHeader('X-BP-Webhook-Signature ') && $this->verifySignature();
    }

    protected function verifySignature(): bool
    {
        return app()->environment() === 'local' ? true :
            $this->header('X-BP-Webhook-Signature ') === hash_hmac('sha256', $this->getContent(), config('bushapay.apiKey'));
    }
}