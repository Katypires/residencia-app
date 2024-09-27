<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin\Sesau\Residencia\Candidato;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


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

    function validateCPF($number)
    {
        // Remove todos os caracteres que não são números
        $cpf = preg_replace('/[^0-9]/', "", $number);

        // Verifica se o CPF tem 11 dígitos
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se todos os dígitos são iguais (CPFs inválidos conhecidos, como "11111111111")
        if (preg_match('/([0-9])\1{10}/', $cpf)) {
            return false;
        }

        // Validação dos dois dígitos verificadores
        for ($t = 9; $t < 11; $t++) {
            $sum = 0;
            for ($i = 0; $i < $t; $i++) {
                $sum += $cpf[$i] * (($t + 1) - $i);
            }
            $result = (($sum * 10) % 11) % 10;
            if ($cpf[$t] != $result) {
                return false;
            }
        }

        return true;
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nome' => ['required', 'string', 'max:255'],
            'nome_social' => ['nullable', 'string', 'max:255'],
            'cpf' => ['required', 'string', 'max:14', function ($attribute, $value, $fail) {
                if (!$this->validateCPF($value)) {
                    $fail('O CPF fornecido não é válido.');
                }
            }],
            'celular' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    




    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */


    protected function create(array $data)
    {
        try {
            $user = User::create([
                'nome' => $data['nome'],
                'email' => $data['email'],
                'nome_social' => $data['nome_social'] ?? NULL,
                'cpf' => preg_replace('/[^0-9]/', '', $data['cpf']),
                'celular' => $data['celular'],
                'password' => Hash::make($data['password']),
            ]);
            $candidato = Candidato::create([
                'user_id' => $user->id,
                'nome' => $data['nome'],
                'email' => $data['email'],
                'nome_social' => $data['nome_social'] ?? NULL,
                'cpf' => preg_replace('/[^0-9]/', '', $data['cpf']),
                'celular' => $data['celular'],
            ]);
            return $user;
        } catch (\Exception $ex) {
            session()->flash('message', 'Algo deu errado!!');
        }
    }
}
