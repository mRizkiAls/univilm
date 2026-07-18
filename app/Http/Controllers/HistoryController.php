<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\History;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
   
   public function store(Request $request)
{
    History::create([
    'user_id' => auth()->id(),
    'title' => $request->title,
    'image' => $request->image,
]);

    return response()->json(['ok' => true]);
}
   
   public function history()
{
    $history = History::where('user_id', auth()->id())
                ->latest()
                ->get();

    return view('UniVilm.history', compact('history'));
}
    public function destroy($id)
{
    $history = History::findOrFail($id);
    $history->delete();

    return response()->json(['success' => true]);
}
  
   public function leaderboard()
{
    $top = History::select('title', 'image', DB::raw('COUNT(*) as total'))
            ->groupBy('title', 'image')
            ->orderByDesc('total')
            ->get();

    return view('UniVilm.leaderboard', compact('top'));
}
public function update(Request $request, $id)
{
    $history = History::findOrFail($id);

    $history->title = $request->title;
    $history->image = $request->image;
    $history->save();

    return response()->json([
        'success' => true
    ]);
}
}