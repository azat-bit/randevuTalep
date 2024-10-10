<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    // Kullanıcıyı email ile bul
    public function findByEmail($email)
    {
        return $this->model->where('email', $email)->first();
    }

    // Kullanıcıyı oluştur
    public function create(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        return $this->model->create($data);
    }
    public function getUserById($id)
    {
        return $this->model->find($id);
    }
    public function  createUser($data){
        return $this->model->create($data);
    }
}
