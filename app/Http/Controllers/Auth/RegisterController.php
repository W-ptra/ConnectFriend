<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Hobby;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = '/home';

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'fee' => ['required','numeric','min:2500'],
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
        if($data['gender'] !== "male" && $data['gender'] !== "female"){
            return "gender must be either male or female";
        }

        if(preg_match("/[^0-9]/",$data['mobile_number'])){
            return "mobile number only can contain number";
        }

        if(strpos($data['instagram'],"https://www.instagram.com/") !== 0){
            return "instagram must be on this following format https://www.instagram.com/<username>";
        }

        $length = str_word_count($data['hobby']);
        if($length < 3){
            return "minimum hobby is 3";
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'gender' => $data['gender'],
            'instagram' => $data['instagram'],
            'mobile_number' => $data['mobile_number'],
            'password' => Hash::make($data['password']),
        ]);

        $hobbyList = explode(' ',$data['hobby']);
        $createdHobby = [];

        foreach ($hobbyList as $hobby) {
            $newHobby = Hobby::create([
                'name' => $hobby,
                'user_id' => $user->id
            ]);
            array_push($createdHobby, $newHobby);
        }

        return $user;
    }
}
