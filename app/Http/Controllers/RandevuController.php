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

    public function __construct(RandevuService $randevuService, UserService $userService)
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
    public function delete($id)
    {
        $deleted = $this->randevuService->deleteRandevu($id);

        if ($deleted) {
            return redirect()->back()->with('success', 'Randevu başarıyla silindi.');
        } else {
            return redirect()->back()->with('error', 'Randevu bulunamadı veya silinemedi.');
        }
    }
    public function edit($id)
    {
        $randevu = $this->randevuService->getRandevuById($id);
        if (!$randevu) {
            return redirect()->back()->with('error', 'Randevu bulunamadı.');
        }

        return view('randevu.edit', compact('randevu'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'baslik' => 'required|string|max:255',
            'tarih' => 'required|date',
            'aciklama' => 'nullable|string',
        ]);

        $updatedRandevu = $this->randevuService->updateRandevu($id, $data);

        if ($updatedRandevu) {
            return redirect()->route('randevu', ['id' => $updatedRandevu->user_id])
                ->with('success', 'Randevu başarıyla güncellendi.');
        } else {
            return redirect()->back()->with('error', 'Randevu güncellenemedi.');
        }
    }


}
