<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Iklan;
use App\Models\RoomMatch;
use App\Models\Chat;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {

        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        */

        $search = $request->search;

        /*
        |--------------------------------------------------------------------------
        | DATA ROOMMATE
        |--------------------------------------------------------------------------
        */

        $filteredRoommates = Iklan::where('status', 'active')

            ->when($search, function ($query) use ($search) {

                $query->where(function ($q) use ($search) {

                    $q->where('judul', 'like', "%{$search}%")

                      ->orWhere('lokasi', 'like', "%{$search}%")

                      ->orWhere('pekerjaan', 'like', "%{$search}%")

                      ->orWhere('habit1', 'like', "%{$search}%")

                      ->orWhere('habit2', 'like', "%{$search}%");

                });

            })

            ->orderByRaw("user_id = ? DESC", [Auth::id()])

            ->latest()

            ->get();

        /*
        |--------------------------------------------------------------------------
        | CHAT NOTIFICATION
        |--------------------------------------------------------------------------
        */

        $chatNotif = Chat::where(

                'receiver_id',
                Auth::id()

            )

            ->where(

                'is_read',
                false

            )

            ->count();

        /*
        |--------------------------------------------------------------------------
        | MATCH REQUEST NOTIFICATION
        |--------------------------------------------------------------------------
        */

        $matchRequests = RoomMatch::where(

                'receiver_id',
                Auth::id()

            )

            ->where('status', 'pending')

            ->latest()

            ->get();

        /*
        |--------------------------------------------------------------------------
        | AMBIL IKLAN PENGIRIM MATCH
        |--------------------------------------------------------------------------
        */

        $matchUser = null;

        if($matchRequests->count() > 0){

            $matchUser = Iklan::where(

                    'user_id',
                    $matchRequests->first()->sender_id

                )

                ->first();

        }

        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */

        return view('dashboard', compact(

            'filteredRoommates',
            'matchRequests',
            'matchUser',
            'chatNotif'

        ));

    }

    /*
    |--------------------------------------------------------------------------
    | HALAMAN TAMBAH ROOMMATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {

        return view('create-roommate');

    }

    /*
    |--------------------------------------------------------------------------
    | SIMPAN ROOMMATE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {

        $gambar = null;

        /*
        |--------------------------------------------------------------------------
        | UPLOAD GAMBAR
        |--------------------------------------------------------------------------
        */

        if($request->hasFile('image')){

            $file = $request->file('image');

            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads'), $filename);

            $gambar = 'uploads/' . $filename;

        }

        /*
        |--------------------------------------------------------------------------
        | SIMPAN DATABASE
        |--------------------------------------------------------------------------
        */

        Iklan::create([

            /*
            |--------------------------------------------------------------------------
            | USER LOGIN
            |--------------------------------------------------------------------------
            */

            'user_id' => Auth::id(),

            /*
            |--------------------------------------------------------------------------
            | DATA ROOMMATE
            |--------------------------------------------------------------------------
            */

           'judul' => $request->judul,

            'lokasi' => $request->lokasi,

            'harga' => $request->budget,

            'gambar' => $gambar,

            'status' => 'active',

            'gender' => $request->gender,

            'umur' => $request->umur,

            'pekerjaan' => $request->status,

            'roommate' => $request->roommate,

            'habit1' => $request->habit1,

            'habit2' => $request->habit2

        ]);

        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect('/dashboard');

    }

    /*
    |--------------------------------------------------------------------------
    | EDIT ROOMMATE
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {

        $roommate = Iklan::findOrFail($id);

        if($roommate->user_id != Auth::id()){

            abort(403);

        }

        return view('edit-roommate', compact('roommate'));

    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE ROOMMATE
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {

        $roommate = Iklan::findOrFail($id);

        if($roommate->user_id != Auth::id()){

            abort(403);

        }
if($request->hasFile('image')){

    $file = $request->file('image');

    $filename = time() . '.' . $file->getClientOriginalExtension();

    $file->move(public_path('uploads'), $filename);

    $roommate->gambar = 'uploads/' . $filename;
}
        $roommate->judul = $request->judul;

        $roommate->lokasi = $request->lokasi;

        $roommate->pekerjaan = $request->pekerjaan;

        $roommate->roommate = $request->roommate;

        $roommate->habit1 = $request->habit1;

        $roommate->habit2 = $request->habit2;

        $roommate->harga = $request->harga;

        $roommate->save();

        return redirect('/dashboard');

    }

}