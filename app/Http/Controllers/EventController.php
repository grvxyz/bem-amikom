<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Tampilkan daftar event
     */
    public function index()
    {
        $data = Event::latest()->paginate(10);
        return view('admin.events.index', compact('data'));
    }

    /**
     * Simpan event baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_event' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'lokasi' => 'required|string|max:255',
            'poster' => 'nullable|image|max:2048',
        ]);

        $posterPath = $request->file('poster') 
            ? $request->file('poster')->store('events', 'public') 
            : null;

        Event::create([
            'nama_event' => $request->nama_event,
            'deskripsi' => $request->deskripsi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'lokasi' => $request->lokasi,
            'poster' => $posterPath,
        ]);

        return back()->with('success', 'Event berhasil ditambahkan!');
    }

    /**
     * Update event
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'nama_event' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'lokasi' => 'required|string|max:255',
            'poster' => 'nullable|image|max:2048',
        ]);

        // Jika ada poster baru, simpan dan hapus yang lama
        if ($request->hasFile('poster')) {
            if ($event->poster && Storage::disk('public')->exists($event->poster)) {
                Storage::disk('public')->delete($event->poster);
            }
            $event->poster = $request->file('poster')->store('events', 'public');
        }

        $event->update([
            'nama_event' => $request->nama_event,
            'deskripsi' => $request->deskripsi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'lokasi' => $request->lokasi,
            'poster' => $event->poster,
        ]);

        return back()->with('success', 'Event berhasil diperbarui!');
    }

    /**
     * Hapus event
     */
    public function destroy(Event $event)
    {
        // Hapus poster jika ada
        if ($event->poster && Storage::disk('public')->exists($event->poster)) {
            Storage::disk('public')->delete($event->poster);
        }

        $event->delete();
        return back()->with('success', 'Event berhasil dihapus!');
    }
}
