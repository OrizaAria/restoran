<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            if ($usertype == 'pelanggan') {
                $breakfast = Menu::where('tipe_menu', 'breakfast')->get();
                $lunch = Menu::where('tipe_menu', 'lunch')->get();
                $dinner = Menu::where('tipe_menu', 'dinner')->get();
                return view('home.index', compact('breakfast', 'lunch', 'dinner'));
            } else if ($usertype == 'staff') {
                return view('staff.index');
            } else {
                return redirect()->back();
            }
        }
    }


    public function home()
    {
        $breakfast = Menu::where('tipe_menu', 'breakfast')->get();
        $lunch = Menu::where('tipe_menu', 'lunch')->get();
        $dinner = Menu::where('tipe_menu', 'dinner')->get();

        return view('home.index', compact('breakfast', 'lunch', 'dinner'));
    }


    public function create_menu()
    {
        return view('staff.create_menu');
    }

    public function tambah_menu(Request $request)
    {
        $data = new Menu;
        $data->tipe_menu = $request->type;
        $data->nama_menu = $request->menu;
        $data->deskripsi = $request->desk;
        $data->harga = $request->harga;
        $gambar = $request->gambar;
        if ($gambar) {
            $gambarnama = time() . '.' . $gambar->getClientOriginalExtension();
            $request->gambar->move('room', $gambarnama);
            $data->gambar = $gambarnama;
        }
        $data->save();
        return redirect()->back()->with('success', 'Menu Berhasil Ditambahkan');
    }

    public function data_menu()
    {
        $data = Menu::all();
        return view('staff.data_menu', compact('data'));
    }

    public function menu_update($id)
    {
        $data = Menu::find($id);
        return view('staff.update_menu', compact('data'));
    }
    public function edit_menu(Request $request, $id)
    {
        $data = Menu::find($id);
        $data->nama_menu = $request->menu;
        $data->deskripsi = $request->desk;
        $data->harga = $request->harga;
        $gambar = $request->gambar;
        if ($gambar) {
            $gambarnama = time() . '.' . $gambar->getClientOriginalExtension();
            $request->gambar->move('room', $gambarnama);
            $data->gambar = $gambarnama;
        }
        $data->save();

        return redirect()->route('data_menu')->with('success', 'Menu Berhasil Diupdate');
    }



    public function menu_delete($id)
    {
        $data = Menu::find($id);
        if ($data) {
            $data->delete();
            return redirect()->route('data_menu')->with('success', 'Menu Berhasil Dihapus');
        } else {
            return redirect()->route('data_menu')->with('error', 'Menu Tidak Ditemukan');
        }
    }
}
