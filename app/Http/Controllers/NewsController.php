<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('pages.manajemen-berita', compact('news'));
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return response()->json($news);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $originalFileName = $request->file('image')->getClientOriginalName();
            $imagePath = $request->file('image')->storeAs('image', $originalFileName, 'public');
            $imagePath = '' . $originalFileName;
        }

        try {
            news::create([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $imagePath,
            ]);
        } catch (\Exception $e) {
            return back()->withErrors([
                'error' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage()
            ])->withInput();
        }

        return response()->json(['success' => 'Berita berhasil ditambahkan!']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $news = News::findOrFail($id);

        $imagePath = $news->image;

        if ($request->hasFile('image')) {
            $originalFileName = $request->file('image')->getClientOriginalName();
            $imagePath = $request->file('image')->storeAs('image', $originalFileName, 'public');
            $imagePath = '' . $originalFileName;
        }

        $news->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        $news->save();

        return redirect()->back()->with('success', 'Berita berhasil diperbarui!');
    }


    public function destroy($id)
    {
        $news = News::findOrFail($id);

        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return response()->json(['success' => 'Berita berhasil dihapus!']);
    }
}
