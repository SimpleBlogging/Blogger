## Setting Up Your Local Repo

### 1. Download the package

1.  Head to [Blogger](https://github.com/SimpleBlogging/Blogger) and download the package following the Getting started local guide

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
        inputs:
        - content: |-
            #!/usr/bin/env bash
            #echo "API_KEY: $API_KEY"
            #echo "BITRISE_SOURCE_DIR: $BITRISE_SOURCE_DIR"
            #echo "BITRISE_GIT_TAG: $BITRISE_GIT_TAG"
            #echo "WEBSITE: $WEBSITE"

            envman add --key WP_API_KEY --value "${API_KEY}"
            envman add --key SOURCE_DIR --value "${BITRISE_SOURCE_DIR}"
            envman add --key TAG --value "${BITRISE_GIT_TAG}"
            envman add --key SITE --value "${WEBSITE}"

            php Public/poster.php $BITRISE_GIT_TAG $API_KEY $WEBSITE;
    - deploy-to-bitrise-io@1.3.12: {}

```

Confirm that under the 	`Triggers` -> `Tag` tab that a build will run on * (All tags)

Make sure that under the `Stack` tab the "Default" and "Workflow specific tasks" are set to **Xcode 9.4 or up** 

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

> `git tag '$BLOG_POST _NUMBER'`
> 
> *MAKE SURE the tag is equal to the blog post number*

2. Push new tag to repo. 

> `git push --tags origin`

NOTE: This **will** automatically release that number blog post

Done
