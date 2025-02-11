<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil data menu berdasarkan kategori
        $breakfast = Menu::where('kategori', 'Breakfast')->get();
        $lunch = Menu::where('kategori', 'Lunch')->get();
        $dinner = Menu::where('kategori', 'Dinner')->get();

        // Mengirim data ke view
        return view('menu.index', compact('breakfast', 'lunch', 'dinner'));
    }

    public function pesanan_detail($id)
    {
        // Mengambil data menu berdasarkan ID
        $menu = Menu::findOrFail($id);

        // Mengirim data ke view pesanan_detail
        return view('menu.pesanan_detail', compact('menu'));
    }
}
