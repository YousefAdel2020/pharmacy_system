<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class BanController extends Controller
{
    public function ban(Request $request)
    {
        $id = $request->id;
        $doctor = Doctor::find($id);
        $banned = $doctor->ban();
        return redirect()->route('doctors.index')->with('banned', $banned);
    }

    public function unban(Request $request)
    {
        $id = $request->id;
        $doctor = Doctor::find($id);
        $unbanned = $doctor->unban();
        return redirect()->route('doctors.index')->with('banned', $unbanned);
    }
}
