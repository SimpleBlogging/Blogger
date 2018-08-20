## Setting Up Your Local Repo

### 1. Fork
1. Head to [https://github.com/Huddie/EconomyClass]() and click the word **Fork** in the top right corner

### 1. Clone
1. Open command prompt (Windows) or Terminal (Mac)
1. Navigate to a folder in which you wish you house your repo (`cd $PATH`)
1. Create a folder to house the repo (mkdir EconomyClass) *You can skip this step if you want*
	2. If you did this step: `cd EconomyClass`
1. Clone the repo into your folder using: `git clone https://github.com/$YOUR_USERNAME/EconomyClass.git`

Done

## Creating A New Blog Post

1. Head into the folder thats storing the repo (See above)
1. Type into command prompt or terminal `php new.php $BLOG_POST_NUMBER` Example, If it was the 3rd blog post: `php new.php 3`

This will create a new folder /Blog-Posts/$BLOG_POST _NUMBER/
as well as initial files 
 
> 	* /Blog-Posts/$BLOG_POST _NUMBER/title.txt
> 	* /Blog-Posts/$BLOG_POST _NUMBER/content.html
> 	* /Blog-Posts/$BLOG_POST _NUMBER/tags.txt
> 	* /Blog-Posts/$BLOG_POST _NUMBER/categories.txt

Done

## Saving a remote copy

> When you want to push your changes to your personal forked version follow these steps (Do this with every major change)

1. Head into the folder thats storing the repo (See above)
1. Type into command prompt or terminal `git add .` 
1. Type into command prompt or terminal `git commit -m $ANY_MESSAGE` 
1. Type into command prompt or terminal `git push origin master` 

Done

## Submitting 

1. Head to your repo on Github
1. Create a new pull request

Done


