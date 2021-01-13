<?php

namespace App\Http\Livewire\Auth;

use App\Services\AuthService;

use Livewire\Component;

class Login extends Component
{
    public $email, $password, $remember;

    protected $rules = [
		'email' => 'required|email|exists:users',
		'password' => 'required|min:8'
    ];
    
    public function login(AuthService $auth)
    {
        $credentials = $this->validate();
        $remember = !empty($this->remember);

        if ($auth->login($credentials, $remember)) {
            session()->flash('success', 'Login sukses');
            return redirect('/');
        } else {
            return back()->with('error', 'Password Salah');
        }
        
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
