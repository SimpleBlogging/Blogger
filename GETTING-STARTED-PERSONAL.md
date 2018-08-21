## Setting Up Your Local Repo

### 1. Fork or Copy

#### Fork

1. Head to [Blogger](https://github.com/SimpleBlogging/Blogger) and click the word **Fork** in the top right corner

2. Clone
	1. Open command prompt (Windows) or Terminal (Mac)
	1. Navigate to a folder in which you wish you house your repo (`cd $PATH`)
	1. Create a folder to house the repo (mkdir `$ANYTHING`) *You can skip this step if you want*
		2. If you did this step: `cd $ANYTHING`
	1. Clone the repo into your folder using: `git clone https://github.com/$YOUR_USERNAME/Blogger.git`

#### Copy

1.  Head to [Blogger](https://github.com/SimpleBlogging/Blogger) and download the zip into your personal local repository file

Done

## Setting Up Bitrise 

> After connecting Bitrise to your personal repo

1. Head into workflow editor
2. Open the `Secrets` tab
3. Add a new Secret called `API_KEY` and set the value to your WordPress API KEY
4. Add another new Secret called `WEBSITE` and set the value to your WordPress website address 

	> Example: www.mywebsite.com would be mywebsite.com
5. Open the `bitrise.yaml`
6. Make the `yaml` look like:

```
---
format_version: '5'
default_step_lib_source: https://github.com/bitrise-io/bitrise-steplib.git
project_type: other
trigger_map:
- pull_request_source_branch: "*"
workflow: primary
- tag: "*"
workflow: primary
workflows:
primary:
steps:
- activate-ssh-key@3.1.1:
run_if: '{{getenv "SSH_RSA_PRIVATE_KEY" | ne ""}}'
- git-clone@4.0.11: {}
- script@1.1.5:
title: Do anything with Script step
inputs:
- is_debug: 'yes'
- runner_bin: php
- content: |-
#!/usr/bin/php
# fail if any commands fails
set -e
# debug log
set -x

# write your script here
echo "Bitrise... Building..."
echo $BITRISE_GIT_TAG
echo $BITRISE_GIT_MESSAGE
echo $BITRISE_SOURCE_DIR
echo $BITRISE_SOURCE_DIR/README.md

php $BITRISE_SOURCE_DIR/poster.php $BITRISE_GIT_TAG $API_KEY $WEBSITE
is_always_run: true
- deploy-to-bitrise-io@1.3.12: {}
meta:
bitrise.io:
stack: osx-xcode-9.4.x

```

Confirm that under the 	`triggers` -> `tag` tab that a build will run on * (All tags)

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

1. Create new tag.

> MAKE SURE the tag is equal to the blog post number 

2. Push new tag to repo. 

NOTE: This **will** automatically release that number blog post

Done
