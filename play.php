<?php
// Get the channelid from the query string
$channelid = isset($_GET['c']) ? $_GET['c'] : '';
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $channelid ?> | CricHD</title>
    <style>
        /* CSS for the fullscreen button */
        #fullscreen-button {
            background-color: #007bff; /* Blue background color */
            color: #fff; /* White text color */
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease; /* Smooth transition for background color */
        }

        #fullscreen-button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
    </style>
</head>
<body style="margin: 0; overflow: hidden;">

<?php

if (!empty($channelid)) {
    // Construct the iframe URL with the channelid parameter
    $iframe_url = "https://pipcast.cc/embed.php?v=" . urlencode($channelid);
    
    // Create a container for the iframe and the fullscreen button
    echo '<div id="player-container" style="position: relative; width: 100%; height: 100vh;">';
    echo '<iframe src="' . $iframe_url . '" frameborder="0" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></iframe>';
    
    // Create the fullscreen button
    echo '<button id="fullscreen-button" style="position: absolute; top: 10px; right: 10px;">Fullscreen</button>';
    echo '</div>';
} else {
    echo '<p>No channelid specified.</p>';
}
?>

<script>
// JavaScript to toggle fullscreen mode
document.addEventListener("DOMContentLoaded", function () {
    var iframe = document.querySelector("iframe");
    var fullscreenButton = document.getElementById("fullscreen-button");
    var isFullscreen = false;

    fullscreenButton.addEventListener("click", function () {
        if (!isFullscreen) {
            if (iframe.requestFullscreen) {
                iframe.requestFullscreen();
            } else if (iframe.mozRequestFullScreen) {
                iframe.mozRequestFullScreen();
            } else if (iframe.webkitRequestFullscreen) {
                iframe.webkitRequestFullscreen();
            } else if (iframe.msRequestFullscreen) {
                iframe.msRequestFullscreen();
            }
        } else {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            }
        }
        isFullscreen = !isFullscreen;
    });
});
</script>

</body>
</html>
