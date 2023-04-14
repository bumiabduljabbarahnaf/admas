<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

// Model
use App\User;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    protected $path  = '/images/ava/';

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => ['required', 'string', 'max:50', 'unique:users'],
            // 'username' => ['required', 'max:50'],
            'email'    => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'first_name' => ['required', 'string', 'max:50'],
            'last_name'  => ['required', 'string', 'max:50'],
            'photo'   => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:1024'],
            'bio'     => ['required', 'string', 'max:150'],
            // 'no_telp' => ['required', 'string', 'max:13', 'digits:12']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $request = request();

        $file     = $request->file('photo');
        $fileName = time() . "." . $file->getClientOriginalName();
        $request->file('photo')->storeAs($this->path, $fileName, 'ftp', 'public');

        return User::create([
            'name'     => $data['name'],
            'name_slug' => str_slug($data['name']),
            'email'    => $data['email'],
            // 'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'photo'   => $fileName,
            'bio'     => $data['bio'],
            // 'no_telp' => $data['no_telp'],
            'facebook'  => $data['facebook'],
            'twitter'   => $data['twitter'],
            'instagram' => $data['instagram']
        ]);
    }
}
