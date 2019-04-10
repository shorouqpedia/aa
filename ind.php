<?php

/**
 * Library Requirements
 *
 * 1. Install composer (https://getcomposer.org)
 * 2. On the command line, change to this directory (api-samples/php)
 * 3. Require the google/apiclient library
 *    $ composer require google/apiclient:~2.0
 */
if (!file_exists(__DIR__ . '/vendor/autoload.php')) {
    throw new \Exception('please run "composer require google/apiclient:~2.0" in "' . __DIR__ .'"');
}

require_once __DIR__ . '/vendor/autoload.php';

$htmlBody = <<<END
<form method="GET">
  <div>
    Search Term: <input type="search" id="q" name="q" placeholder="Enter Search Term">
  </div>
  <div>
    Max Results: <input type="number" id="maxResults" name="maxResults" min="1" max="50" step="1" value="25">
  </div>
  <div>
    Category: 
    <select name="category">
        <option value="27">Education</option>
        <option value="28">Science & Technology</option>
    </select>
  </div>
  <input type="submit" value="Search">
</form>
END;


$DEVELOPER_KEY = 'AIzaSyCU2BfMC9HnMvUMXm2pUhjGUBR8UPNzue8';


/**/
$categoriesUrl = "https://www.googleapis.com/youtube/v3/videoCategories?part=snippet&regionCode=US&key=" . $DEVELOPER_KEY;
/*
 * Send Request and receive data
 * */
$ch = curl_init();  // prepare the url
 
//Set the URL that you want to GET by using the CURLOPT_URL option.
curl_setopt($ch, CURLOPT_URL, $categoriesUrl);
 
//Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
//Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
 
//Execute the request.
$data = curl_exec($ch);
 
//Close the cURL handle.
curl_close($ch);
$dataArray = json_decode($data);
echo "<pre>";
print_r($dataArray);
echo "</pre>";
//Print the data out onto the page.


// This code will execute if the user entered a search query in the form
// and submitted the form. Otherwise, the page displays the form above.
if (isset($_GET['q']) && isset($_GET['maxResults'])) {
    /*
     * Set $DEVELOPER_KEY to the "API key" value from the "Access" tab of the
     * {{ Google Cloud Console }} <{{ https://cloud.google.com/console }}>
     * Please ensure that you have enabled the YouTube Data API for your project.
     */
//    $DEVELOPER_KEY = 'AIzaSyB2l9pxHd3duwcmGFUFsRAwL0dL0INwd6Q';
    $DEVELOPER_KEY = 'AIzaSyCU2BfMC9HnMvUMXm2pUhjGUBR8UPNzue8';

    $client = new Google_Client();
    $client->setDeveloperKey($DEVELOPER_KEY);

    // Define an object that will be used to make all API requests.
    $youtube = new Google_Service_YouTube($client);

    $htmlBody = '';
    try {

        // Call the search.list method to retrieve results matching the specified
        // query term.
        $searchResponse = $youtube->search->listSearch('id,snippet', array(
            'q' => $_GET['q'],
            'maxResults' => $_GET['maxResults'],
            'type' => 'video',
            'videoCategoryId' => $_GET['category'],
        ));

        $videos = '';
        $channels = '';
        $playlists = '';

        // Add each result to the appropriate list, and then display the lists of
        // matching videos, channels, and playlists.
        // $videos = [];
        foreach ($searchResponse['items'] as $searchResult) {
            switch ($searchResult['id']['kind']) {
                case 'youtube#video':
                    $videos .= sprintf('<li>%s (%s)</li>',
                        $searchResult['snippet']['title'], $searchResult['id']['videoId']);
                    /*
                     * $title = $searchResult['snippet']['title'];
                     * $videoId = $searchResult['id']['videoId'];
                     * $videoLink = 'https://www.youtube.com/watch?v=' . $videoId;
                     * $video = array('title'=>$title,'video'=>$videoLink);
                     * array_push($videos,$video);
                     * 
                     * */
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

        /*
         * for($videos as $video) {?>
         * <div><?php echo $video['title'];?></div> 
         * <video src="<?php echo $video['video'];?>"></video>
         * <?php}
         * 
         * 
         * */
        $htmlBody .= <<<END
    <h3>Videos</h3>
    <ul>$videos</ul>
    <h3>Channels</h3>
    <ul>$channels</ul>
    <h3>Playlists</h3>
    <ul>$playlists</ul>
END;
    } catch (Google_Service_Exception $e) {
        $htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
            htmlspecialchars($e->getMessage()));
    } catch (Google_Exception $e) {
        $htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
            htmlspecialchars($e->getMessage()));
    }
}
?>

<!doctype html>
<html>
<head>
    <title>YouTube Search</title>
</head>
<body>
<?=$htmlBody?>
</body>
</html>
