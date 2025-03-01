<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'consultant_id' => 'sometimes|required|exists:consultants,id',
            'client_id' => 'sometimes|required|exists:clients,id',
            'appointment_time' => 'sometimes|required|date',
        ];
    }
}
