<?php
    
    $curl = curl_init();
    
    $blog_post_number = $argv[1];
    $api_key = $argv[2];
    $wordpress_site = $argv[3];
    
    echo "Processing blog post #".$blog_post_number."...\n";
    
    /* Get blog post data */
    $title   = file_get_contents("./Blog-Posts/".$blog_post_number."/title.txt");
    $content = file_get_contents("./Blog-Posts/".$blog_post_number."/content.html");
    $tags       = file_get_contents("./Blog-Posts/".$blog_post_number."/tags.txt");
    $categories = file_get_contents("./Blog-Posts/".$blog_post_number."/categories.txt");
    
    /* Format */
    $data = array('title'=>$title,
                  'content'=>$content,
                  'tags'=>$tags,
                  'categories'=>$categories);
    
    echo "Building 🏗 ...\n";
    
    /* Convert */
    $postfields = http_build_query($data);
    
    
    echo "https://public-api.wordpress.com/rest/v1.2/sites/".$wordpress_site."/posts/new/\n";
    echo "authorization: Bearer ".$api_key."\n";
    
    /* Set up post */
    curl_setopt_array($curl, array(
                                   CURLOPT_URL => "https://public-api.wordpress.com/rest/v1.2/sites/".$wordpress_site."/posts/new/",
                                   CURLOPT_RETURNTRANSFER => true,
                                   CURLOPT_ENCODING => "",
                                   CURLOPT_MAXREDIRS => 10,
                                   CURLOPT_TIMEOUT => 30,
                                   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                   CURLOPT_CUSTOMREQUEST => "POST",
                                   CURLOPT_POSTFIELDS => $postfields,
                                   CURLOPT_HTTPHEADER => array(
                                                               "authorization: Bearer ".$api_key,
                                                               "cache-control: no-cache",
                                                               "content-type: application/x-www-form-urlencoded",
                                                               "postman-token: 2871cdaf-cd1c-5dae-77ff-6c49e4771c4e"
                                                               ),
                                   ));
    echo "Sending to WP 💌 ...\n";
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo "The post was successfully created! 👏 👍\n Check it out @ www.".$wordpress_site." 🖥\n";
            // echo $response;
    }
    

