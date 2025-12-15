<?php

namespace App\Http\Controllers;

use App\Models\Leaderboard;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index()
    {
        $leaderboards = Leaderboard::with('user')->orderBy('points', 'desc')->get();
        return view('leaderboard.index', compact('leaderboards'));
    }
}
