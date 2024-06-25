<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ContactMessageController extends Controller
{
    public function index()
    {
        $data = ContactMessage::latest()->get();
        $title = 'Pesan Kontak';

        return view('admin.contact-messages.index', compact('data', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($request->all());

        Alert::success('Berhasil', 'Pesan berhasil dikirim');
        return redirect()->route('landing.page');
    }

    public function show(ContactMessage $message)
    {
        $message->markAsRead();
        $title = 'Detail Pesan Kontak';
        return view('admin.contact-messages.show', compact('message', 'title'));
    }

    public function destroy(ContactMessage $message)
    {
        $message->delete();

        return redirect()->route('contact-message.index');
    }
}
