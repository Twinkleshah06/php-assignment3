<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tweets for #{{ $hashtag }}</title>
</head>
<body>
    <h1>Tweets for #{{ $hashtag }}</h1>

    @if(count($tweets) > 0)
        <ul>
            @foreach($tweets as $tweet)
                <li>{{ $tweet['text'] }} - <em>{{ $tweet['created_at'] }}</em></li>
            @endforeach
        </ul>
    @else
        <p>No tweets found for this hashtag.</p>
    @endif
</body>
</html>
