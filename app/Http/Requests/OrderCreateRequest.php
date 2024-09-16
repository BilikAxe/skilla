<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type_id' => 'required|exists:order_types,id',
            'partnership_id' => 'required|exists:partnerships,id',
            'user_id' => 'required|exists:users,id',
            'description' => 'required|string',
            'date' => 'required|date',
            'address' => 'required|string',
            'amount' => 'required|numeric',
            'status' => 'required|in:Создан,Назначен исполнитель,Завершен'
        ];
    }
}
