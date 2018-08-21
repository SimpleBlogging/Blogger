<?php
    $post_file = file_get_contents("https://gist.githubusercontent.com/Huddie/29ea20537cb749a85f7a5b49f5d292ea/raw/17088ecdb5b7bf80ce3072af0bebde5249146cdc/post.php");
    file_put_contents("poster.php", $post_file);
    
    $new_file = file_get_contents("https://gist.githubusercontent.com/Huddie/030463513fc9429b6428773fe5519a27/raw/32dba37e80768de334c0ccb8ec754f089484b88d/newBlog.php");
    file_put_contents("new.php", $new_file);
?>


