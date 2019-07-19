<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class CreateEventRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return Auth::check() && Auth::user()->account_type == 'organiser';
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'name' => 'required',
      'venue' => 'required',
      'category' => [
        'required',
        Rule::in(['sport', 'culture', 'other']),
      ],
      'starting_at' => 'required|after:now',
      'description' => 'required',
    ];
  }
}
