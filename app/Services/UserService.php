<?php

namespace App\Services;

use App\Repository\UserRepository;
use Illuminate\Support\Facades\Auth;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    // Kullanıcı kaydı
    public function register(array $data)
    {
        return $this->userRepository->create($data);
    }

    // Kullanıcı girişi
    public function login(array $credentials)
    {
        if (Auth::attempt($credentials)) {
            return Auth::user();
        }
        return false;
    }

    // Kullanıcıyı çıkış yapma
    public function logout()
    {
        Auth::logout();
    }
    public function getUserById($id)
    {
        // UserRepository'den ID'ye göre kullanıcıyı bul
        return $this->userRepository->getUserById($id);
    }
    public function findByEmail($email){
        return $this->userRepository->findByEmail($email);
    }
    public function createUser($data){
        return  $this->userRepository->create($data);
    }
}
