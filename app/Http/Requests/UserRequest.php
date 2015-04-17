<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

//denne klasse arver fra Laravel klassen Request
class UserRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
     * Skal sætte til true ellers får man ikke lov til at lave et request (forbidden)
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
     * Her sætter man de validerings regler op, som man gerne vil have,
     * http://laravel.com/docs/5.0/validation
	 */
	public function rules()
	{
        return [
            'email' => 'required',
            'password' => 'required',
            'name' => 'required'
        ];
	}

    /**
     * @return array
     * lave sine egne fejl beskeder som passer til de regler som man har sat på i rules
     *
     */
    public function messages()
    {
        return [
            'email.required' => 'Er, you forgot your email address!',
            'name.required' => 'navn er taget'
        ];
    }

    //gå tilbage til UserController
}
