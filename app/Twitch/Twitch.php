<?php

namespace App\Twitch;

class Twitch {

  public function getStreamersStatusByName($streamers)
  {

    // Get User by Username
    $headers = [
      'Client-ID' => env('TWITCH_HELIX_KEY'),
      'Content-Type' => 'application/json',
      'Accept' => 'application/json'
    ];

    $client = new \GuzzleHttp\Client(['verify' => false]);
    $userRes = $client->request('GET', 'https://api.twitch.tv/helix/users', [
        'headers' => $headers,
        'query' => ['login' => $streamers]
    ]);

    $userList = collect(json_decode($userRes->getBody(), 1)['data']);
    $streamRes = $client->request('GET', 'https://api.twitch.tv/helix/streams', [
        'headers' => $headers,
        'query' => ['user_login' => $streamers]
    ]);
    $streamData = collect(json_decode($streamRes->getBody(), 1)['data']) ?? [];

    if (count($streamData) > 0) {
      $gamesRes = $client->request('GET', 'https://api.twitch.tv/helix/games', [
          'headers' => $headers,
          'query' => ['id' => $streamData->pluck('game_id')->toArray()]
      ]);
      $gameData = collect(json_decode($gamesRes->getBody(), 1)['data']);
    } else {
      $gameData = collect([]);
    }

    $userList->transform(function ($user) use ($streamData, $gameData) {
        $userStream = $streamData->where('user_id', $user['id'])->first() ?? ['game_id' => null];
        $streamingGame = $gameData->where('id', $userStream['game_id'])->first() ?? [];

        return  array_merge($user, [
            'live' =>  !! ($userStream['type'] ?? '' ),
            'viewer_count' =>  $userStream['viewer_count'] ?? 0,
            'game' => $streamingGame['name'] ?? '',
            'thumbnail_url' => $userStream['thumbnail_url'] ?? ''
        ]);
    });

    return json_decode($userList->sortByDesc('display_name')->toJson());

  }

}