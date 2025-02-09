<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class TwitterController extends Controller
{
    public function fetchTweets($hashtag)
    {
        $bearerToken = env('TWITTER_BEARER_TOKEN'); // Add this in .env

        // API request to fetch tweets by hashtag
        $response = Http::withToken($bearerToken)->get(
            'https://api.twitter.com/2/tweets/search/recent', [
                'query' => '#' . $hashtag,
                'tweet.fields' => 'created_at'
            ]
        );

        $tweets = $response->json()['data'] ?? [];

        return view('tweets', compact('tweets', 'hashtag'));
    }
}

