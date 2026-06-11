<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Chat;
use App\Models\Iklan;
use App\Models\RoomMatch;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | HALAMAN CHAT
    |--------------------------------------------------------------------------
    */

    public function index($id)
{

    /*
    |--------------------------------------------------------------------------
    | AMBIL USER TUJUAN
    |--------------------------------------------------------------------------
    */

    $receiver = User::findOrFail($id);

    /*
    |--------------------------------------------------------------------------
    | AMBIL IKLAN USER (JIKA ADA)
    |--------------------------------------------------------------------------
    */

    $receiverIklan = Iklan::where(

            'user_id',
            $receiver->id

        )

        ->latest()

        ->first();

    /*
    |--------------------------------------------------------------------------
    | USER ID TUJUAN
    |--------------------------------------------------------------------------
    */

    $receiverUserId = $receiver->id;

    /*
    |--------------------------------------------------------------------------
    | READ CHAT
    |--------------------------------------------------------------------------
    */

    Chat::where(

            'sender_id',
            $receiverUserId

        )

        ->where(

            'receiver_id',
            Auth::id()

        )

        ->update([

            'is_read' => true

        ]);

    /*
    |--------------------------------------------------------------------------
    | AMBIL SEMUA CHAT
    |--------------------------------------------------------------------------
    */

    $messages = Chat::where(function($query) use ($receiverUserId){

            $query->where('sender_id', Auth::id())
                  ->where('receiver_id', $receiverUserId);

        })

        ->orWhere(function($query) use ($receiverUserId){

            $query->where('sender_id', $receiverUserId)
                  ->where('receiver_id', Auth::id());

        })

        ->orderBy('created_at', 'asc')

        ->get();

    /*
    |--------------------------------------------------------------------------
    | CONTACT SIDEBAR DARI CHAT
    |--------------------------------------------------------------------------
    */

    $chatUsers = Chat::where('sender_id', Auth::id())

        ->orWhere('receiver_id', Auth::id())

        ->latest()

        ->get();

    /*
    |--------------------------------------------------------------------------
    | AMBIL USER UNIK
    |--------------------------------------------------------------------------
    */

    $userIds = [];

    foreach($chatUsers as $chat){

        if($chat->sender_id != Auth::id()){

            $userIds[] = $chat->sender_id;

        }

        if($chat->receiver_id != Auth::id()){

            $userIds[] = $chat->receiver_id;

        }

    }

    $userIds = array_unique($userIds);

    /*
    |--------------------------------------------------------------------------
    | AMBIL CONTACT USER
    |--------------------------------------------------------------------------
    */

    $contacts = User::whereIn(

            'id',
            $userIds

        )

        ->get();

    /*
    |--------------------------------------------------------------------------
    | CEK PENDING MATCH
    |--------------------------------------------------------------------------
    */

    $pendingMatch = RoomMatch::where(

            'receiver_id',
            Auth::id()

        )

        ->where(

            'sender_id',
            $receiver->id

        )

        ->where(

            'status',
            'pending'

        )

        ->first();

    /*
    |--------------------------------------------------------------------------
    | MATCH REQUEST MASUK
    |--------------------------------------------------------------------------
    */

    $matchRequests = RoomMatch::where(

            'receiver_id',
            Auth::id()

        )

        ->where(

            'status',
            'pending'

        )

        ->latest()

        ->get();

    /*
    |--------------------------------------------------------------------------
    | CEK STATUS MATCH
    |--------------------------------------------------------------------------
    */

    $currentMatch = RoomMatch::where(function($query) use ($receiver){

            $query->where('sender_id', Auth::id())
                  ->where('receiver_id', $receiver->id);

        })

        ->orWhere(function($query) use ($receiver){

            $query->where('sender_id', $receiver->id)
                  ->where('receiver_id', Auth::id());

        })

        ->latest()

        ->first();

    /*
    |--------------------------------------------------------------------------
    | RETURN VIEW
    |--------------------------------------------------------------------------
    */

    return view('chat', compact(

        'receiver',
        'receiverIklan',
        'messages',
        'contacts',
        'pendingMatch',
        'matchRequests',
        'currentMatch'

    ));

}
    /*
    |--------------------------------------------------------------------------
    | KIRIM PESAN
    |--------------------------------------------------------------------------
    */

    public function send(Request $request, $id)
{

    /*
    |--------------------------------------------------------------------------
    | VALIDASI
    |--------------------------------------------------------------------------
    */

    $request->validate([

        'message' => 'required'

    ]);

    /*
    |--------------------------------------------------------------------------
    | AMBIL USER TUJUAN
    |--------------------------------------------------------------------------
    */

    $receiver = User::findOrFail($id);

    /*
    |--------------------------------------------------------------------------
    | CEK JANGAN CHAT DIRI SENDIRI
    |--------------------------------------------------------------------------
    */

    if($receiver->id == Auth::id()){

        return back();

    }

    /*
    |--------------------------------------------------------------------------
    | SIMPAN CHAT
    |--------------------------------------------------------------------------
    */

    Chat::create([

        'sender_id' => Auth::id(),

        'receiver_id' => $receiver->id,

        'message' => $request->message,

        'is_read' => false

    ]);

    /*
    |--------------------------------------------------------------------------
    | REDIRECT
    |--------------------------------------------------------------------------
    */

    return back();

}

    /*
    |--------------------------------------------------------------------------
    | MATCH ROOMMATE
    |--------------------------------------------------------------------------
    */

    public function match($id)
{

    /*
    |--------------------------------------------------------------------------
    | AMBIL USER TUJUAN
    |--------------------------------------------------------------------------
    */

    $receiver = User::findOrFail($id);

    /*
    |--------------------------------------------------------------------------
    | HAPUS MATCH EXPIRED
    |--------------------------------------------------------------------------
    */

    RoomMatch::where(

            'status',
            'pending'

        )

        ->where(

            'expired_at',
            '<',
            now()

        )

        ->delete();



        /*
|--------------------------------------------------------------------------
| CEK APAKAH SUDAH PUNYA MATCH ACCEPTED
|--------------------------------------------------------------------------
*/

$alreadyAccepted = RoomMatch::where(function($query){

        $query->where('sender_id', Auth::id())
              ->orWhere('receiver_id', Auth::id());

    })

    ->where('status', 'accepted')

    ->first();

/*
|--------------------------------------------------------------------------
| JIKA SUDAH MATCH
|--------------------------------------------------------------------------
*/

if($alreadyAccepted){

    return back()->with(

        'already_have_match',
        true

    );

}
    /*
    |--------------------------------------------------------------------------
    | CEK APAKAH USER MASIH PUNYA PENDING MATCH
    |--------------------------------------------------------------------------
    */

    $existingPending = RoomMatch::where(function($query){

            $query->where('sender_id', Auth::id())
                  ->orWhere('receiver_id', Auth::id());

        })

        ->where(

            'status',
            'pending'

        )

        ->first();

    /*
    |--------------------------------------------------------------------------
    | JIKA MASIH ADA PENDING
    |--------------------------------------------------------------------------
    */

    if($existingPending){

        return back()->with(

            'match_pending_popup',
            true

        );

    }

    /*
    |--------------------------------------------------------------------------
    | CEK APAKAH SUDAH MATCH
    |--------------------------------------------------------------------------
    */

    $alreadyMatch = RoomMatch::where(function($query) use ($receiver){

            $query->where('sender_id', Auth::id())
                  ->where('receiver_id', $receiver->id);

        })

        ->orWhere(function($query) use ($receiver){

            $query->where('sender_id', $receiver->id)
                  ->where('receiver_id', Auth::id());

        })

        ->whereIn('status', [

            'pending',
            'accepted'

        ])

        ->first();

    /*
    |--------------------------------------------------------------------------
    | JIKA SUDAH ADA
    |--------------------------------------------------------------------------
    */

    if($alreadyMatch){

        return back()->with(

            'match_pending_popup',
            true

        );

    }

    /*
    |--------------------------------------------------------------------------
    | SIMPAN MATCH
    |--------------------------------------------------------------------------
    */

    RoomMatch::create([

        'sender_id' => Auth::id(),

        'receiver_id' => $receiver->id,

        'status' => 'pending',

        'expired_at' => now()->addHours(24)

    ]);

    /*
    |--------------------------------------------------------------------------
    | REDIRECT
    |--------------------------------------------------------------------------
    */

    return back()->with(

        'match_request_sent',
        true

    );

}
    /*
    |--------------------------------------------------------------------------
    | ACCEPT MATCH
    |--------------------------------------------------------------------------
    */

    public function acceptMatch($id)
    {

        /*
        |--------------------------------------------------------------------------
        | AMBIL DATA MATCH
        |--------------------------------------------------------------------------
        */

        $match = RoomMatch::findOrFail($id);
        /*
|--------------------------------------------------------------------------
| CEK APAKAH USER SUDAH PUNYA MATCH ACCEPTED
|--------------------------------------------------------------------------
*/

$alreadyAccepted = RoomMatch::where(function($query){

        $query->where('sender_id', Auth::id())
              ->orWhere('receiver_id', Auth::id());

    })

    ->where(

        'status',
        'accepted'

    )

    ->first();

/*
|--------------------------------------------------------------------------
| JIKA SUDAH ADA MATCH
|--------------------------------------------------------------------------
*/

if($alreadyAccepted){

    return back()->with(

        'already_have_match',
        true

    );


    /*
|--------------------------------------------------------------------------
| CEK APAKAH SUDAH PUNYA MATCH ACCEPTED
|--------------------------------------------------------------------------
*/

$alreadyAccepted = RoomMatch::where(function($query){

        $query->where('sender_id', Auth::id())
              ->orWhere('receiver_id', Auth::id());

    })

    ->where('status', 'accepted')

    ->first();

/*
|--------------------------------------------------------------------------
| JIKA SUDAH MATCH
|--------------------------------------------------------------------------
*/

if($alreadyAccepted){

    return back()->with(

        'already_have_match',
        true

    );

}
}
        /*
        |--------------------------------------------------------------------------
        | UPDATE STATUS
        |--------------------------------------------------------------------------
        */

        $match->status = 'accepted';

        /*
|--------------------------------------------------------------------------
| TOLAK SEMUA PENDING MATCH LAIN
|--------------------------------------------------------------------------
*/

RoomMatch::where(function($query) use ($match){

        $query->where('sender_id', $match->sender_id)
              ->orWhere('receiver_id', $match->sender_id)
              ->orWhere('sender_id', $match->receiver_id)
              ->orWhere('receiver_id', $match->receiver_id);

    })

    ->where(

        'status',
        'pending'

    )

    ->where(

        'id',
        '!=',
        $match->id

    )

    ->update([

        'status' => 'rejected'

    ]);

        $match->save();

        /*
|--------------------------------------------------------------------------
| HAPUS SEMUA PENDING MATCH LAIN
|--------------------------------------------------------------------------
*/

RoomMatch::where(function($query) use ($match){

        $query->where('sender_id', $match->sender_id)
              ->orWhere('receiver_id', $match->sender_id)
              ->orWhere('sender_id', $match->receiver_id)
              ->orWhere('receiver_id', $match->receiver_id);

    })

    ->where('status', 'pending')

    ->where('id', '!=', $match->id)

    ->delete();
        /*
        |--------------------------------------------------------------------------
        | IKLAN RECEIVER
        |--------------------------------------------------------------------------
        */

        $receiverIklan = Iklan::where(

                'user_id',
                $match->receiver_id

            )

            ->first();

        /*
        |--------------------------------------------------------------------------
        | IKLAN SENDER
        |--------------------------------------------------------------------------
        */

        $senderIklan = Iklan::where(

                'user_id',
                $match->sender_id

            )

            ->first();

        /*
        |--------------------------------------------------------------------------
        | KURANGI SLOT RECEIVER
        |--------------------------------------------------------------------------
        */

        if($receiverIklan){

            $receiverIklan->roommate = $receiverIklan->roommate - 1;

            if($receiverIklan->roommate <= 0){

                $receiverIklan->status = 'inactive';

            }

            $receiverIklan->save();

        }

        /*
        |--------------------------------------------------------------------------
        | KURANGI SLOT SENDER
        |--------------------------------------------------------------------------
        */

        if($senderIklan){

            $senderIklan->roommate = $senderIklan->roommate - 1;

            if($senderIklan->roommate <= 0){

                $senderIklan->status = 'inactive';

            }

            $senderIklan->save();

        }

        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return back()->with(

            'match_success',
            true

        );

    }

    /*
    |--------------------------------------------------------------------------
    | REJECT MATCH
    |--------------------------------------------------------------------------
    */

    public function rejectMatch($id)
    {

        /*
        |--------------------------------------------------------------------------
        | AMBIL DATA MATCH
        |--------------------------------------------------------------------------
        */

        $match = RoomMatch::findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | UPDATE STATUS
        |--------------------------------------------------------------------------
        */

        $match->status = 'rejected';

        $match->save();

        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return back();

    }

    /*
    |--------------------------------------------------------------------------
    | CHAT LIST
    |--------------------------------------------------------------------------
    */


    public function chatList()
{

    /*
    |--------------------------------------------------------------------------
    | AMBIL SEMUA CHAT USER LOGIN
    |--------------------------------------------------------------------------
    */

    $chatUsers = Chat::where('sender_id', Auth::id())

        ->orWhere('receiver_id', Auth::id())

        ->latest()

        ->get();

    /*
    |--------------------------------------------------------------------------
    | JIKA BELUM ADA CHAT
    |--------------------------------------------------------------------------
    */

    if($chatUsers->count() == 0){

        return view('empty-chat');

    }

    /*
    |--------------------------------------------------------------------------
    | AMBIL USER PERTAMA
    |--------------------------------------------------------------------------
    */

    $firstChat = $chatUsers->first();

    /*
    |--------------------------------------------------------------------------
    | TENTUKAN LAWAN CHAT
    |--------------------------------------------------------------------------
    */

    if($firstChat->sender_id == Auth::id()){

        $targetUserId = $firstChat->receiver_id;

    }else{

        $targetUserId = $firstChat->sender_id;

    }

    /*
    |--------------------------------------------------------------------------
    | REDIRECT KE CHAT USER
    |--------------------------------------------------------------------------
    */

    return redirect('/chat/' . $targetUserId);

}

    public function chatUser($id)
{

    $user = User::findOrFail($id);

    /*
    |--------------------------------------------------------------------------
    | READ CHAT
    |--------------------------------------------------------------------------
    */

    Chat::where(

            'sender_id',
            $user->id

        )

        ->where(

            'receiver_id',
            Auth::id()

        )

        ->update([

            'is_read' => true

        ]);

    /*
    |--------------------------------------------------------------------------
    | AMBIL PESAN
    |--------------------------------------------------------------------------
    */

    $messages = Chat::where(function($query) use ($user){

            $query->where('sender_id', Auth::id())
                  ->where('receiver_id', $user->id);

        })

        ->orWhere(function($query) use ($user){

            $query->where('sender_id', $user->id)
                  ->where('receiver_id', Auth::id());

        })

        ->orderBy('created_at', 'asc')

        ->get();

    /*
    |--------------------------------------------------------------------------
    | CONTACT LIST
    |--------------------------------------------------------------------------
    */

    $chatUsers = Chat::where('sender_id', Auth::id())

        ->orWhere('receiver_id', Auth::id())

        ->latest()

        ->get();

    $userIds = [];

    foreach($chatUsers as $chat){

        if($chat->sender_id != Auth::id()){

            $userIds[] = $chat->sender_id;
        }

        if($chat->receiver_id != Auth::id()){

            $userIds[] = $chat->receiver_id;
        }
    }

    $contacts = User::whereIn(

            'id',
            array_unique($userIds)

        )

        ->get();

   $receiver = new \stdClass();

$receiver->id = $user->id;

$receiver->user_id = $user->id;

$receiver->judul = $user->name;

$receiver->nama = $user->name;

$receiver->lokasi = '-';

$receiver->gambar = 'default.png';

/*
|--------------------------------------------------------------------------
| MATCH REQUEST
|--------------------------------------------------------------------------
*/

$matchRequests = RoomMatch::where(

        'receiver_id',
        Auth::id()

    )

    ->where(

        'status',
        'pending'

    )

    ->latest()

    ->get();

/*
|--------------------------------------------------------------------------
| CURRENT MATCH
|--------------------------------------------------------------------------
*/

$currentMatch = null;

$pendingMatch = null;

return view('chat', compact(

    'receiver',
    'messages',
    'contacts',
    'matchRequests',
    'currentMatch',
    'pendingMatch'

));
}
}