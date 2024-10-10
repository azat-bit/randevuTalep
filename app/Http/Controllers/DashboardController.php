<?php

namespace App\Http\Controllers;

use App\Services\RandevuService;
use Illuminate\Http\Request;
use App\Services\UserService;


class DashboardController extends Controller
{

    protected $authService;
    protected $randevuService;

    public function __construct(UserService $authService,RandevuService $randevuService)
    {
        $this->authService = $authService;
        $this->randevuService = $randevuService;
    }
    public function show($id)
    {   $countRandevu = $this->randevuService->count($id);
        if($countRandevu == 'Null'){
            response('randevu yok');
        }
        $user = $this->authService->getUserById($id);
        $name = $user->name; // veya $user->isim, hangi alanı kullanıyorsanız
        return view('dashboard.index', compact('user', 'name','countRandevu'));
    }
}
