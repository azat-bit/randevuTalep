<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RandevuService;
use App\Services\UserService;
class RandevuController extends Controller
{
    //
    protected $randevuService;
    protected $userService;

    public function __construct(RandevuService $randevuService,UserService $userService)
    {
        $this->randevuService = $randevuService;
        $this->userService = $userService;
    }
    
    public function getRandevu($id)
    {
        $user = $this->userService->getUserById($id);
        $randevular = $this->randevuService->getRandevuByUserId($id);  
        return view('randevu.mainPage', compact('randevular', 'user'));
    }
    public function create($id)
    {
        // $id, rota üzerinden gelen kullanıcı kimliğidir.
        return view('randevu.createRandevu', compact('id'));
    }
    

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'baslik' => 'required|string|max:255',
            'tarih' => 'required|date',
            'user_id' => 'required|integer',
            'aciklama' => 'nullable|string|max:1000',
            
        ]);
        if (!isset($validatedData['user_id'])) {
            return response()->json(['error' => 'User ID eksik.'], 400);
        }
        try {
            $randevu = $this->randevuService->create($validatedData);
            return response()->json(['message' => 'Randevu başarıyla oluşturuldu!', 'randevu' => $randevu]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Bir hata oluştu: ' . $e->getMessage()], 500);
        }
    }
    
    
}
