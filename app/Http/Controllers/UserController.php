<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $authService;

    public function __construct(UserService $authService)
    {
        $this->authService = $authService;
    }

    // Kayıt formunu gösterme
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Kayıt işlemi
    public function register(Request $request)
    {
        // Form doğrulaması
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Kayıt işlemi (UserService'den çağrılır)
        $this->authService->register($request->all());

        // Başarılı kayıt sonrası login sayfasına yönlendirme
        return redirect()->route('login')->with('success', 'Kayıt başarılı. Giriş yapabilirsiniz.');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Doğrulama hatası varsa, JSON formatında hata mesajlarını döndür
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 400);
        }

        // Kullanıcıyı oluşturma işlemi
        $user = $this->userService->createUser($request->all());

        // Başarılı yanıt
        return response()->json([
            'status' => 'success',
            'message' => 'Kayıt başarılı!',
            'user' => $user
        ]);
    }
    
    // Giriş formunu gösterme
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Giriş işlemi
    public function login(Request $request)
    {
        // Giriş doğrulama kuralları
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // AuthService ile giriş denemesi
        if ($this->authService->login($credentials)) {
            // Başarılı giriş sonrası yönlendirme
            $request->session()->regenerate();
            $user = $this->authService->findByEmail($credentials['email']);
            // Flash message ile veri gönderme
            return redirect()->route('dashboard', ['id' => $user->id])
                ->with('success', 'Başarıyla giriş yaptınız!');
        }

        // Başarısız giriş denemesi: hata mesajı ve formda girilen e-posta saklanır
        return back()->withErrors([
            'email' => 'E-posta veya şifre yanlış.',
        ])->onlyInput('email');
    }

    // Çıkış işlemi
    public function logout()
    {
        $this->authService->logout();
        return redirect()->route('login');
    }

    public function profil($id){
       
       $user = $this->authService->getUserById($id); // Kullanıcıyı servis üzerinden al
        if (!$user) {
            abort(404, 'Kullanıcı bulunamadı');
        }

        return view('profil.profil', compact('user'));
    }
}
