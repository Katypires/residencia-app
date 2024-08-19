<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nome' => ['required', 'string', 'max:255'],
            'nome_social' => ['max:255'],'nullable',
            'cpf' => ['required', 'string', 'max:14', function ($attribute, $value, $fail) {
                if (!$this->validateCpf($value)) {
                    $fail('O CPF fornecido não é válido.');
                }
            }],
            'celular' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    // function validarCpf($cpf)
    // {
    //     $cpf = preg_replace('/[^0-9]/is', '', $cpf);

    //     if (strlen($cpf) != 11) {
    //         return false;
    //     }

    //     if (preg_match('/(\d)\1{10}/', $cpf)) {
    //         return false;
    //     }

    //     for ($t = 9; $t < 11; $t++) {
    //         for ($d = 0, $c = 0; $c < $t; $c++) {
    //             $d += $cpf[$c] * (($t + 1) - $c);
    //         }
    //         $d = ((10 * $d) % 11) % 10;
    //         if ($cpf[$c] != $d) {
    //             return false;
    //         }
    //     }
    //     return true;
    // }

    function validateCPF($number) {

        $cpf = preg_replace('/[^0-9]/', "", $number);
        
        if (strlen($cpf) != 11) {
            return false;
        }
        if (strlen($cpf) != 11 || preg_match('/([0-9])\1{10}/', $cpf)) {

            return false;
        }

        $number_quantity_to_loop = [9, 10];

        foreach ($number_quantity_to_loop as $item) {

            $sum = 0;
            $number_to_multiplicate = $item + 1;
        
            for ($index = 0; $index < $item; $index++) 
            {
                $sum += $cpf[$index] * ($number_to_multiplicate--);
            }

            $result = (($sum * 10) % 11);
            $var = intval($cpf[$item]);

            if (intval($cpf[$item]) == $result) 
            {  
                return true;
            }else
            {
                return false;
            }
        }
        return true;
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */


    protected function create(array $data)
    {
        return User::create([
            'nome' => $data['nome'],
            'email' => $data['email'],
            'nome_social' => $data['nome_social'] ?? NULL,
            'cpf' => preg_replace('/[^0-9]/', '', $data['cpf']),
            'celular' => $data['celular'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
