<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::first();

        return view('contact', compact('contact'));
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        // Untuk sementara pesan belum disimpan ke database.
        // Nanti kalau mau, kita bisa buat tabel messages di Admin.

        return back()->with(
            'success',
            'Pesan kamu berhasil dikirim! Terima kasih sudah menghubungi Oasis\' Coffee.'
        );
    }
}