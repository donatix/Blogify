<?php

namespace Donatix\Blogify\Requests;

use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends Request
{

    /**
     * Holds an instance of the Guard contract
     *
     * @var \Illuminate\Contracts\Auth\Guard
     */
    protected $auth;

    /**
     * Holds the hash of the user
     * that we are trying to edit
     *
     * @var string
     */
    protected $hash;

    /**
     * @var \App\User
     */
    protected $user;


    /**
     * Holds the id of the user
     * that we are trying to edit
     *
     * @var int|bool
     */
    protected $userId;

    /**
     * Construct the class
     *
     * @param Guard $auth
     * @param User $user
     */
    public function __construct(Guard $auth, User $user)
    {
        $this->auth = $auth;
        $this->user = $user;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->auth->user()->getAuthIdentifier() == $this->route('profile');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:30',
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->route('profile'))],
            'password' => 'nullable|required_with:new_password|AuthUserPass',
            'new_password' => 'nullable|confirmed',
            'profilepicture' => 'image|max:1000',
        ];
    }

    /**
     * Override default messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'auth_user_pass' => 'The given password does not match your current password',
        ];
    }
}
