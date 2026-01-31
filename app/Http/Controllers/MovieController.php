<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    private $apiKey = '5cd2120b4fa020d1b9fc5d38767dddfe'; 
    private $baseUrl = 'https://api.themoviedb.org/3';

    public function index()
    {
        $response = Http::get("{$this->baseUrl}/movie/popular", [
            'api_key' => $this->apiKey
        ]);

        $movies = $response->json()['results'] ?? [];
        return $this->renderView($movies);
    }

    public function trending()
    {
        $response = Http::get("{$this->baseUrl}/trending/movie/week", [
            'api_key' => $this->apiKey
        ]);

        $movies = $response->json()['results'] ?? [];
        return $this->renderView($movies);
    }

    public function watchlist()
    {
        $savedMovies = Watchlist::where('user_id', auth()->id())->latest()->get();
        
        $movies = $savedMovies->map(function ($item) {
            return [
                'id' => $item->movie_id,
                'title' => $item->title,
                'poster_path' => $item->poster_path,
                'vote_average' => 'Saved',
                'release_date' => $item->created_at->format('Y-m-d'),
            ];
        });

        return $this->renderView($movies);
    }

    public function addToWatchlist(Request $request)
    {
        Watchlist::updateOrCreate(
            ['user_id' => auth()->id(), 'movie_id' => $request->movie_id],
            ['title' => $request->title, 'poster_path' => $request->poster_path]
        );

        return back()->with('success', 'Added to Watchlist!');
    }

    /**
     * LOGIKA PEMISAH VIEW
     */
    private function renderView($movies)
    {
        // Jika user adalah admin, panggil file resources/views/admin.blade.php
        if (auth()->check() && auth()->user()->role === 'admin') {
            return view('admin', compact('movies'));
        }

        // Jika bukan, panggil file resources/views/dashboard.blade.php
        return view('dashboard', compact('movies'));
    }
}