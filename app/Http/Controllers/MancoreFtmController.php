<?php

namespace App\Http\Controllers;

use App\Models\MancoreFtm;
use Illuminate\Http\Request;

class MancoreFtmController extends Controller
{
    /**
     * Menampilkan semua data Mancore FTM.
     */
    public function index(Request $request)
    {
        $query = MancoreFtm::query();

        if ($request->filled('sto')) {
            $query->where('sto', $request->sto);
        }

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('gpon_slot_port', 'like', "%{$request->search}%")
                    ->orWhere('gpon_ip', 'like', "%{$request->search}%")
                    ->orWhere('eakses', 'like', "%{$request->search}%")
                    ->orWhere('oakses', 'like', "%{$request->search}%")
                    ->orWhere('odc', 'like', "%{$request->search}%");
            });
        }

        $mancores = $query->paginate(10)->appends($request->all());

        $listSto = MancoreFtm::select('sto')->distinct()->pluck('sto');

        return view('mancore.index', compact('mancores', 'listSto'));
    }

    /**
     * Menampilkan detail satu data Mancore FTM berdasarkan ID (untuk modal detail).
     */
    public function show($id)
    {
        $item = MancoreFtm::findOrFail($id);

        return response()->json($item);
    }

    /**
     * (Optional) Buat nanti kalau mau tambah data baru.
     */
    public function create()
    {
        return view('mancore.create');
    }

    /**
     * (Optional) Simpan data baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'sto' => 'required|string|max:50',
            'gpon_slot_port' => 'required|string|max:100',
            'gpon_ip' => 'required|ip',
            'eakses' => 'required|string|max:100',
            'oakses' => 'required|string|max:100',
            'odc' => 'required|string|max:100',
        ]);

        MancoreFtm::create($request->all());

        return redirect()->route('mancore.index')->with('success', 'Data berhasil ditambahkan.');
    }
}
