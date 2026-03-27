<?php

namespace App\Livewire\Autentikasi;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginComponent extends Component
{

    public $email, $password;

     public function mount()
    {
        if (Auth::check()) {
            return redirect('/');
        }
    }
    
    public function render()
    {
        return view('livewire.autentikasi.login-component')->extends('layout.autentikasi')->section('content');
    }

    public function login(){
        $data = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],[
            '*.required' => 'Harap mengisi kolom ini',
            'email.email' => 'Format email salah'
        ]);
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
        return redirect('/');
        } else {
            session()->flash('error', 'Email atau Password Anda Salah!');
        }

    }
}
