# Getting Started (Local)

> Requires `php` to be installed
> If you are unsure if your computer has `php` run: `php -v`

1. [Download starter folder](https://dl-web.dropbox.com/zip_batch_download?_download_id=221366143035351969763000656277216962034303073274531678434836481&_notify_domain=www.dropbox.com&_subject_uid=30738075&files=%2FPublic%2FPublic&parent_path=%2FPublic%2FPublic&w=AADyFLaTJ2GooflpJDUoMrHxcCgBTg--QIKooFv0DSX8xw)
2. In command prompt (Windows) or terminal (Mac) navigate into the public folder (Which was just downloaded)

### Creating a new blog post
1. In the public folder type: `php new.php $BLOG_POST_NUMBER`
> 	Make sure your replace `$BLOG_POST_NUMBER` with the number blog post you wish to create

2.  Head into /Blog-Posts/`$BLOG_POST_NUMBER` and add in content to the created files.
> 	* /Blog-Posts/$BLOG_POST _NUMBER/title.txt
> 	* /Blog-Posts/$BLOG_POST _NUMBER/content.html
> 	* /Blog-Posts/$BLOG_POST _NUMBER/tags.txt
> 	* /Blog-Posts/$BLOG_POST _NUMBER/categories.txt
1. Once your ready to publish type: php poster.php `$BLOG_POST_NUMBER`
> If you have not configured the config file yet you will be asked to do so.
> 
> Check out [How to get WordPress API KEY](https://github.com/SimpleBlogging/Blogger/blob/master/WORDPRESS-API-KEY.md) if you need help. 
> 
> For testing feel free to use:
> 
> API KEY: W^lBb2M#Aw81QQUtum9a^@HZzJibtZPxNT!V6Os50FFh5vesnRQ3Eg$gtwT#s$#K
> Website: simpleblogger482256569.wordpress.com


