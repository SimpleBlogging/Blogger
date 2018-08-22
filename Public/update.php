<?php
  
  
  $poster_link = "https://www.dropbox.com/s/yz8rnk39vgke61w/poster.php?dl=1";
  $new_link = "https://www.dropbox.com/s/qfiye1en1euiwtj/new.php?dl=1";
  
  echo "🏁 Updating Started  \n\n";
  echo "⛏ Updating poster.php ...\n";
  echo "⛏ Downloading poster.php from ".$poster_link."\n\n";
  
  $post_file = file_get_contents($poster_link);
  
  echo "⛏ ...\n\n";
  
  sleep(1);
  
  echo "🚚 Moving files into place \n\n";
  
  file_put_contents("poster.php", $post_file);
  
  echo "💚 poster.php updated\n\n";
  
  echo "⛏ Updating new.php ...\n";
  echo "⛏ Downloading new.php from ".$new_link."\n\n";
  
  $new_file = file_get_contents($new_link);
  
  echo "⛏ ...\n\n";
  
  sleep(1);
  
  echo "🚚 Moving files into place \n\n";
  
  file_put_contents("new.php", $new_file);
  
  sleep(1);
  
  echo "💜 new.php updated\n\n";
  
  echo "🎉 Update complete!";
  ?>





