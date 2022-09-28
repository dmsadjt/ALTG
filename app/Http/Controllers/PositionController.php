<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;

class PositionController extends Controller
{
    public function editPosition($id)
    {
        $position = Position::where('id', $id)->get();

        return view('admin.position.edit', compact('position'));
    }

    public function updatePosition(Request $request)
    {
        $data = $request->validate([
            'id' => 'required',
            'explanation' => '',
        ]);

        Position::where('id', $data['id'])->update([
            'explanation' => $data['explanation'],
        ]);

        return redirect('admin/positions');
    }
}
