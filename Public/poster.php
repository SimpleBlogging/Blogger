<?php
    
    $curl = curl_init();
    
    $blog_post_number = $argv[1];
    $api_key = $argv[2];
    $wordpress_site = $argv[3];
    
    
    function makeDir($path) {
       if ( is_dir($path) ) {
           return 1;
       } else {
           mkdir($path);
           return 1;
       }
       return 0;
    }
    
    function createFile($path, $initial_content) {
        $file = fopen($path,"w");
        fwrite($file, $initial_content);
        fclose($file);
    }
    
    function setUpConfig() {
        
        echo "What is the website base address (Ex: google.com): ";
        
        $WEB = rtrim(fgets(STDIN));
        echo "Great! Your full address is: www.". $API."\n";
        echo "What is your wordpress API KEY: ";
        
        $API  = rtrim(fgets(STDIN));
        echo "Great!\n";
        echo "Continuing publish.....!\n";

        makeDir(getenv("DOCUMENT_ROOT")."Config");
        
        $new_path = getenv("DOCUMENT_ROOT")."Config/config.php";
        $initial_content = "<?php return array( 'API_KEY' =>'".$API."', 'WEBSITE' =>'".$WEB."');";
        
        createFile($new_path, $initial_content);
        setArgumentFromConfig();
    }
    
    function setArgumentFromConfig() {
        if ( file_exists("Config/config.php") ) {
            $configs = include('Config/config.php');
            $GLOBALS[api_key] = $configs["API_KEY"];
            $GLOBALS[wordpress_site] = $configs["WEBSITE"];
            echo "API: ".$api_key."\n";
            return;
        } else {
            echo "Config file not set up yet... setting up...\n";
            setUpConfig();
        }
    }

    
    if ( $blog_post_number == NULL ) {
        echo "You must provide a blog post number as the first argument\n";
        return;
    }
    
    if ( $api_key == NULL || $wordpress_site == NULL ) {
        echo "Posting from config file...\n";
        setArgumentFromConfig();
    }
    
    if ( $api_key == NULL || $wordpress_site == NULL ) {
        echo "Missing API KEY and WordPress Site Address in Config file\n";
    }
    
    echo "Processing blog post #".$blog_post_number."...\n";
    
    if ( !is_dir("./Blog-Posts/".$blog_post_number) ) {
        echo "This blog post has not been created yet\n Type php new.php ".$blog_post_number." to get started";
        return;
    }
    
    /* Get blog post data */
    $title = file_get_contents("./Blog-Posts/".$blog_post_number."/title.txt");
    $content = file_get_contents("./Blog-Posts/".$blog_post_number."/content.html");
    $tags = file_get_contents("./Blog-Posts/".$blog_post_number."/tags.txt");
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
        echo "The post was successfully created! 👏 👍";
    }
    

