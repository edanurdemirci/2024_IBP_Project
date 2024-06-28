<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Message;
use Illuminate\Support\Facades\Hash;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Models\Update;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use function PHPUnit\Framework\isNull;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    function editLastUpdate() {
        $Update = Update::latest()->first();

        return view('editLastUpdate', compact('Update'));
    }

    function showAllUpdates() {
        $Updates = Update::all();

        return view('showAllUpdates', compact('Updates'));
    }

    public function messageChat(Request $request) {
        $userId = Auth::id();

        $conversations = Message::where('receiver_id', $userId)
            ->groupBy('sender_id')
            ->select('sender_id', DB::raw('MAX(created_at) as last_message_time'))
            ->get();

        foreach ($conversations as $conversation) {
            $lastMessage = Message::where(function ($query) use ($conversation, $userId) {
                $query->where('sender_id', $conversation->sender_id)
                    ->where('receiver_id', $userId)
                    ->orWhere(function ($query) use ($conversation, $userId) {
                        $query->where('receiver_id', $conversation->sender_id)
                            ->where('sender_id', $userId);
                    });
            })->orderByDesc('created_at')->first();

            $conversation->last_message_content = $lastMessage ? $lastMessage->message : null;
            $conversation->last_message_time = $lastMessage ? $lastMessage->created_at->diffForHumans() : null;
            $conversation->sender_email = User::find($conversation->sender_id)->email;
        }

        $sender_id = $request->sender_id;

        $messages = Message::where(function ($query) use ($sender_id) {
            $query->where('sender_id', Auth::id())->where('receiver_id', $sender_id);
        })->orWhere(function ($query) use ($sender_id) {
            $query->where('sender_id', $sender_id)->where('receiver_id', Auth::id());
        })->orderBy('created_at', 'asc')->get();

        return view('messageChat', compact('messages', 'conversations', 'sender_id'));
    }

    function messages(Request $request) {
        $userId = Auth::id();

        $conversations = Message::where('receiver_id', $userId)
            ->groupBy('sender_id')
            ->select('sender_id', DB::raw('MAX(created_at) as last_message_time'))
            ->get();

        foreach ($conversations as $conversation) {
            $lastMessage = Message::where(function ($query) use ($conversation, $userId) {
                $query->where('sender_id', $conversation->sender_id)
                    ->where('receiver_id', $userId)
                    ->orWhere(function ($query) use ($conversation, $userId) {
                        $query->where('receiver_id', $conversation->sender_id)
                            ->where('sender_id', $userId);
                    });
            })->orderByDesc('created_at')->first();

            $conversation->last_message_content = $lastMessage ? $lastMessage->message : null;
            $conversation->last_message_time = $lastMessage ? $lastMessage->created_at->diffForHumans() : null;
            $conversation->sender_email = User::find($conversation->sender_id)->email;
        }

        $sender_id = $request->sender_id;

        $messages = Message::where(function ($query) use ($sender_id) {
            $query->where('sender_id', Auth::id())->where('receiver_id', $sender_id);
        })->orWhere(function ($query) use ($sender_id) {
            $query->where('sender_id', $sender_id)->where('receiver_id', Auth::id());
        })->orderBy('created_at', 'asc')->get();

        return view('messages', compact('messages', 'conversations', 'sender_id'));
    }

    function registrationPost(Request $request) {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'nullable'
        ]);

        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        if ($request->password == $request->password2) {
            $user = User::create($data);
        } else {
            return redirect(route('registration'))->with('error', 'Şifreler eşleşmiyor');
        }

        if(!$user){
            return redirect(route('registration'))->with('error', 'Kayıt başarısız, tekrar deneyin');
        }
        return redirect(route('login'))->with('success', 'Kayıt işlemi başarıyla tamamlandı');
    }

    function forgot_my_passwordPost(Request $request) {
        $request->validate([
            'email' => 'required|email:users',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect(route('forgot_my_password'))->withErrors(['email' => 'E-posta adresi bulunamadı.']);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect(route('login'))->with('success', 'Şifreniz başarıyla sıfırlandı.');
    }

    function addUserPost(Request $request) {
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'required'
        ]);

        $user = User::create([
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => $validatedData['role']
        ]);

        if(!$user){
            return redirect(route('addUser'))->with('error', 'Kullanıcı eklenemedi, tekrar deneyin');
        }
        return redirect(route('addUser'))->with('success', 'Kullanıcı başarıyla eklendi');
    }

    function updateUserPost(Request $request) {
        $validatedData = $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'nullable|string',
            'role' => 'nullable|string',
        ]);

        $user = User::where('email', $validatedData['email'])->firstOrFail();

        $updateData = [];
        if (isset($validatedData['password'])) {
            $updateData['password'] = Hash::make($validatedData['password']);
        }
        if (isset($validatedData['role'])) {
            $updateData['role'] = $validatedData['role'];
        }

        $user->update($updateData);

        return redirect(route('UpdateUser'))->with('success', 'Kullanıcı bilgileri başarıyla güncellendi.');
    }

    function deleteUserPost(Request $request) {
        $validatedData = $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $user = User::where('email', $validatedData['email'])->firstOrFail();

        $user->delete();

        return redirect(route('deleteUser'))->with('success', 'Kullanıcı başarıyla silindi.');
    }

    function addShopPost(Request $request) {
        $validatedData = $request->validate([
            'name' => 'string',
            'city' => 'string',
            'phone' => 'string',
            'email' => 'email',
            'description' => 'nullable|string'
        ]);

        $Shop = Shop::create([
            'name' => $validatedData['name'],
            'city' => $validatedData['city'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'description' => $validatedData['description']
        ]);

        if(!$Shop){
            return redirect(route('addShop'))->with('error', 'Otel kayıt işlemi gerçekleştirilemedi, tekrar deneyiniz');
        }
        return redirect(route('addShop'))->with('success', 'Otel başarıyla kayıt edildi');
    }

    function updateShopPost(Request $request) {
        $validatedData = $request->validate([
            'name' => 'string|exists:Shops,name',
            'city' => 'string',
            'phone' => 'string',
            'email' => 'email',
            'description' => 'string'
        ]);

        $Shop = Shop::where('name', $validatedData['name'])->firstOrFail();

        if (is_null($Shop)) {
            // Eğer Shop bulunamazsa hata mesajıyla yönlendir
            return redirect(route('UpdateShop'))->with('error', 'Girdiğiniz otel sistemde kayıtlı değil.');
        }

        // Güncellenmesi gereken veriler
        $updateData = [
            'city' => $validatedData['city'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'description' => $validatedData['description']
        ];

        // Shop kaydını güncelle
        $Shop->update($updateData);

        // Başarı mesajıyla yönlendir
        return redirect(route('UpdateShop'))->with('success', 'Otelin bilgileri başarıyla güncellendi.');
    }


    function addUpdatePost(Request $request) {
        $validatedData = $request->validate([
            'tittle' => 'required',
            'content' => 'required',
            'description' => 'nullable',
        ]);

        $Update = Update::create([
            'tittle' => $validatedData['tittle'],
            'content' => $validatedData['content'],
            'description' => $validatedData['description']
        ]);

        if(!$Update){
            return redirect(route('addUpdate'))->with('error', 'Duyuru eklenemedi, tekrar deneyiniz');
        }
        return redirect(route('addUpdate'))->with('success', 'Duyuru başarıyla eklendi');
    }

    function editLastUpdatePost(Request $request) {
        $validatedData = $request->validate([
            'tittle' => 'required',
            'content' => 'required',
            'description' => 'required',
        ]);

        $Update = Update::latest()->first();

        $updateData = [];
        if (isset($validatedData['tittle'])) {
            $updateData['tittle'] = $validatedData['tittle'];
        }
        if (isset($validatedData['content'])) {
            $updateData['content'] = $validatedData['content'];
        }
        if (isset($validatedData['description'])) {
            $updateData['description'] = $validatedData['description'];
        }

        if (isNull($Update)) {
            return redirect(route('editLastUpdate'))->with('error', 'Sistemde herhangi bir duyuru bulunamadı');
        } else {
            $Update->update($updateData);
            return redirect(route('editLastUpdate'))->with('success', 'Son duyuru başarıyla güncellendi');
        }
    }

    function messageChatPost(Request $request) {
        $validatedData = $request->validate([
            'message' => 'required',
            'sender_id' => 'required',
            'receiver_id' => 'required',
        ]);

        $message_sender = $request->sender_id;

        $message = Message::create([
            'message' => $validatedData['message'],
            'sender_id' => $validatedData['sender_id'],
            'receiver_id' => $validatedData['receiver_id']
        ]);
        $userId = Auth::id();

        $conversations = Message::where('receiver_id', $userId)->groupBy('sender_id')
            ->select('sender_id', DB::raw('MAX(created_at) as last_message_time'))->get();

        foreach ($conversations as $conversation) {
            $lastMessage = Message::where('sender_id', $conversation->sender_id)
                ->where('receiver_id', $userId)->orderByDesc('created_at')->first();
            $conversation->last_message_content = $lastMessage->content;
        }

        foreach ($conversations as $conversation) {
            $lastMessage = Message::where(function ($query) use ($conversation, $userId) {
                $query->where('sender_id', $conversation->sender_id)
                      ->where('receiver_id', $userId);
            })
            ->orWhere(function ($query) use ($conversation, $userId) {
                $query->where('receiver_id', $conversation->sender_id)
                      ->where('sender_id', $userId);
            })
            ->orderByDesc('created_at')
            ->first();

            $conversation->last_message_content = $lastMessage ? $lastMessage->message : null;
        }

        foreach ($conversations as $conversation) {
            $user = User::find($conversation->sender_id);
            $conversation->sender_email = $user->email;

            $lastMessage = Message::where('sender_id', $conversation->sender_id)
                ->where('receiver_id', $userId)
                ->orderByDesc('created_at')
                ->first();

            $conversation->last_message_time = $lastMessage && $lastMessage->created_at ? $lastMessage->created_at->diffForHumans() : null;
        }

        $userId = $request->receiver_id;

        $messages = Message::where(function ($query) use ($userId) {
            $query->where('sender_id', Auth::id())->where('receiver_id', $userId);
        })->orWhere(function ($query) use ($userId) {
            $query->where('sender_id', $userId)->where('receiver_id', Auth::id());
        })->orderBy('created_at', 'asc')->get();

        if(!$message){
            return redirect(route('messageChat'))->with('error', 'Mesaj iletilemedi, tekrar deneyiniz');
            }
            return view('messageChat', compact('message_sender', 'messages','conversations'));
    }

    function home() {
        return view('home');
    }

    function login() {
        return view('login');
    }

    function registration() {
        return view('registration');
    }

    function forgot_my_password() {
        return view('forgot_my_password');
    }

    function addUser() {
        return view('addUser');
    }

    function updateUser() {
        return view('updateUser');
    }

    function deleteUser() {
        return view('deleteUser');
    }

    function showAllUsers() {
        $users = User::all();

        return view('showAllUsers', compact('users'));
    }

    function addShop() {
        return view('addShop');
    }

    function updateShop() {
        return view('updateShop');
    }

    function deleteShop() {
        return view('deleteShop');
    }

    function deleteShopPost(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|exists:shops',
        ]);

        $shop = Shop::where('name', $validatedData['name'])->firstOrFail();

        $shop->delete();

        return redirect(route('deleteShop'))->with('success', 'Kullanıcı başarıyla silindi.');
    }

    function showAllShops() {
        $Shops = Shop::all();

        return view('showAllShops', compact('Shops'));
    }

    function addUpdate() {
        return view('addUpdate');
    }

    function messageChatHomePost(Request $request) {
        $validatedData = $request->validate([
            'message' => 'required',
            'sender_id' => 'required',
            'receiver_id' => 'required',
        ]);

        Message::create([
            'message' => $validatedData['message'],
            'sender_id' => $validatedData['sender_id'],
            'receiver_id' => $validatedData['receiver_id']
        ]);

        return view('home');
    }

    function Shopdetails() {
        $Shops = Shop::all();

        return view('kullanici_Shop', compact('Shops'));
    }

    public function loginPost(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin_panel');
            } else {
                return redirect()->route('userHome');
            }
        }
        return redirect(route('login'))->with("error", "Login details are not valid");
    }

    function logout() {
        Session::flush();
        Auth::logout();
        return redirect(route('home'));
    }
}
