<?error_reporting(E_ERROR | E_PARSE);?>
<div class="container">
    <form method="GET" action="searchYoutube">
    Search Term: <input type="search" id="q" name="q" placeholder="Enter Search Term">
    Max Results: <input type="number" id="maxResults" name="maxResults" min="1" max="20" step="1" value="10">
  <input type="submit" value="Search">
</form>
    <?
    //var_dump($data);
       foreach ($data as $searchResult) {
        switch ($searchResult['id']['kind']) {
          case 'youtube#video':
            $videos .= sprintf('<li>%s (%s)</li>',
                $searchResult['snippet']['title'], $searchResult['id']['videoId']);
           
            break;
          case 'youtube#channel':
            $channels .= sprintf('<li>%s (%s)</li>',
                $searchResult['snippet']['title'], $searchResult['id']['channelId']);
            break;
        case 'youtube#playlist':
            $playlists .= sprintf('<li>%s (%s)</li>',
                $searchResult['snippet']['title'], $searchResult['id']['playlistId']);
            break;
        }
      }
    ?>
    <h2>Videos</h2>
    <ul><? echo $videos ?></ul>
    <h2>Channels</h2>
    <ul><? echo $channels ?></ul>
    <h2>Playlists</h2>
    <ul><? echo $playlists ?></ul>
</div>
