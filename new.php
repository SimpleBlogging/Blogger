<?php
    $blog_post_number = $argv[1];
    
    function makeDir($path)
    {
       if ( is_dir($path) ) {
           return 1;
       } else {
           mkdir($path);
           return 1;
       }
       return 0;
    }
    
    function createFile($path, $initial_content)
    {
       $file = fopen($path,"w");
       fwrite($file, $initial_content);
       fclose($file);
    }
    
    $new_blog_path = getenv("DOCUMENT_ROOT")."Blog-Posts";
    $new_post_path = getenv("DOCUMENT_ROOT")."Blog-Posts/".$blog_post_number;
    
    if(makeDir($new_blog_path)) {
        if (makeDir($new_post_path)) {
            echo "Blog post #".$blog_post_number. " is being initialized @".$new_post_path."\n";
        }
    }
    
    echo "Setting up enviornment... \n";
    
    $title_path = $new_post_path."/title.txt";
    $content_path = $new_post_path."/content.html";
    $tags_path = $new_post_path."/tags.txt";
    $categories_path = $new_post_path."/categories.txt";
    
    echo "Creating title \n";
    
    createFile($title_path, "TODO: Title (Replace this with the blog post title)");
    
    createFile($content_path, "<!DOCTYPE html><html><body><h1>TODO</h1><p>Content</p></body></html>");
    
    echo "Creating content \n";

    createFile($title_path, "TODO: Title (Replace this with the blog post title)");
    
    echo "Creating tags \n";

    createFile($tags_path, "TODO: Tags (Replace this with the blog post tags\n Format: tag,tag2,tag3)");
    
    echo "Creating categories \n";

    createFile($categories_path, "TODO: Categories (Replace this with the blog categories tags\n Format: cat,cat2,cat3)");

    
    echo "All done! \n";
    echo "Blog post #".$blog_post_number. " is being setup @".$new_post_path;
?>
