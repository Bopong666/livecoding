<?php

namespace App\Livewire\Autentikasi;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class RegistrasiComponent extends Component
{
    public $name, $email, $password;

     public function mount()
    {
        if (Auth::check()) {
            return redirect('/');
        }
    }
    
    public function render()
    {
        return view('livewire.autentikasi.registrasi-component')->extends('layout.autentikasi')->section('content');
    }

    public function registrasi(){
        
        $data = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ],[
            '*.required' => 'Harap mengisi kolom ini',
            'email.email' => 'Format email salah',
            'email.unique' => 'Email telah terdaftar',
            'password.min' => 'Password minimal :min karakter',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Auth::login($user);

        session()->regenerate();

        return redirect('/');
    }
}
