<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class KontakController extends Controller
{
    public function index()
    {
        return view('pages.kontak');
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'nama'    => ['required', 'string', 'max:100'],
            'email'   => ['required', 'email', 'max:100'],
            'subjek'  => ['required', 'string', 'max:255'],
            'pesan'   => ['required', 'string', 'max:2000'],
        ]);

        // Kirim email ke info@perhumasrisulsel.or.id dan CC ke Gmail
        Mail::send([], [], function ($message) use ($validated) {
            $message->to('info@perhumasrisulsel.or.id', 'Perhumasri Sulsel')
                    ->cc('perhumasrisulsel@gmail.com')
                    ->replyTo($validated['email'], $validated['nama'])
                    ->subject('[Website] ' . $validated['subjek'])
                    ->html(
                        '<div style="font-family: sans-serif; max-width: 600px; margin: 0 auto;">'
                        . '<div style="background: #f97316; padding: 24px; border-radius: 8px 8px 0 0;">'
                        . '<h2 style="color: white; margin: 0;">Pesan Baru dari Website Perhumasri Sulsel</h2>'
                        . '</div>'
                        . '<div style="background: #f9fafb; padding: 24px; border: 1px solid #e5e7eb; border-radius: 0 0 8px 8px;">'
                        . '<p style="margin: 0 0 8px;"><strong>Nama:</strong> ' . htmlspecialchars($validated['nama']) . '</p>'
                        . '<p style="margin: 0 0 8px;"><strong>Email:</strong> ' . htmlspecialchars($validated['email']) . '</p>'
                        . '<p style="margin: 0 0 8px;"><strong>Subjek:</strong> ' . htmlspecialchars($validated['subjek']) . '</p>'
                        . '<hr style="border: none; border-top: 1px solid #e5e7eb; margin: 16px 0;">'
                        . '<p style="margin: 0 0 8px;"><strong>Pesan:</strong></p>'
                        . '<p style="margin: 0; white-space: pre-wrap;">' . htmlspecialchars($validated['pesan']) . '</p>'
                        . '</div>'
                        . '<p style="color: #9ca3af; font-size: 12px; margin-top: 16px;">Email ini dikirim otomatis dari website perhumasrisulsel.or.id</p>'
                        . '</div>'
                    );
        });

        return back()->with('sukses', 'Pesan Anda telah dikirim. Kami akan segera menghubungi Anda.');
    }
}
