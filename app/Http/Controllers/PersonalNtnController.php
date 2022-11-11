<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Status;
use App\Models\PersonalNtn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PersonalNtnController extends Controller
{
    public function store(Request $request)
    {

        $user = auth()->user;

        $status = Status::where('slug', 'new')->first();

        $personal = PersonalNtn::create([
            'user_id' => $user->id,
            'status_id' => $status->id
        ]);


        if ($request->hasFile('files')) {
            $files = $request->file('files');

            foreach ($files as $file) {
                $personal->addMedia($file)->toMediaCollection('personal_ntn', 's3');
            }
        }

        return response()->json(['message' => 'Thankyou For submitting your personal NTN. the agent will be right back with you']);
    }
}
