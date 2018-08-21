<?php
    echo "Updating Started\n";
    echo "Updating poster.php ...\n";
    
    $post_file = file_get_contents("https://uc8036df8da624eb0c32a93fb2ad.dl.dropboxusercontent.com/cd/0/get/AOj-_d2xl-zVZ830ksdGYv7fuVsdgXDwI9vXT4ekDkjiHWzmILiIvQ6ZFp-pOPlQyZrYXT9nNBQp1rVlynOB4frqULy0pmkXbEIUYDlzlE9jgxf11TQo-1-sYNAetm77gFdeLMMYx7PnrOyIsmVtizXRsLrpCVFacV9ZUdxTyW_prwRftHytFjMBYXTvu7C0i0g/file?dl=1");
    file_put_contents("poster.php", $post_file);
    
    echo "poster.php updated\n";
    echo "Updating new.php ...\n";
    
    $new_file = file_get_contents("https://uc34f0470757ebe57c9338896593.dl.dropboxusercontent.com/cd/0/get/AOgUY5XBMe3CrdbEVCo4ZFP7eJPCzfH7smalk0W6sGTLqRGZFb0c-12GKeah5k2DpPd-PCuoVFgo0zfQNjp2SxUgDzhEdV9cxtdybAH9EpXnRSFnZuwQDe-MB1YCUk_8_VGZOop7yiaqVWBNI9a2NacM9TBmI55YM554BpiAudgDPOCvtVrIXUQ6wxyVe52mmTk/file?dl=1");
    file_put_contents("new.php", $new_file);
    echo "new.php updated\n";
    
    echo "Update complete!\n";
?>



