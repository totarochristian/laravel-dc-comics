<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateComicRequest extends FormRequest
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
            'title' => 'required|min:3|max:150',
            'description' => 'required|min:3',
            'thumb' => 'required|min:3',
            'price' => 'required|min:1',
            'series' => 'required|min:3|max:100',
            'sale_date' => 'required',
            'type' => 'required|min:3|max:100'
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Il titolo è obbligatorio!',
            'title.min' => 'Il titolo deve essere composto almeno da 3 caratteri!',
            'title.max' => 'Il titolo non deve superare i 150 caratteri!',
            'description.required' => 'La descrizione è obbligatoria!',
            'description.min' => 'La descrizione deve essere composta almeno da 3 caratteri!',
            'thumb.required' => "L'immagine è obbligatoria!",
            'thumb.min' => "L'immagine deve essere composta almeno da 3 caratteri!",
            'price.required' => "Il prezzo è obbligatorio!",
            'price.min' => "Il prezzo deve essere pari almeno a 1!",
            'series.required' => 'La serie è obbligatoria!',
            'series.min' => 'La serie deve essere composta almeno da 3 caratteri!',
            'series.max' => 'La serie non deve superare i 100 caratteri!',
            'sale_date.required' => 'La data di uscita è obbligatoria!',
            'type.required' => 'La tipologia è obbligatoria!',
            'type.min' => 'La tipologia deve essere composta almeno da 3 caratteri!',
            'type.max' => 'La tipologia non deve superare i 100 caratteri!'
        ];
    }
}
