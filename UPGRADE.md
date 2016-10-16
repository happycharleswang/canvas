## Upgrade Guide

**Estimated Upgrade Time: 10-15 Minutes**

> **WARNING:** The upgrade process will affect all files and folders included in the main Canvas installation. This includes all the core files used to run Canvas. If you have made any modifications to those files, your changes will be lost.

You should always update Canvas to the latest version. When a new version of Canvas is available you will see an update message on your Canvas admin home page. To begin the update process, click the link in this message.

#### Step 1: Download your data
In your blog, navigate to `/admin/tools` and click **DOWNLOAD ARCHIVE**. This will gather all the data you have created or uploaded and save it to a `.zip` file on your computer. 

#### Step 2: Remove the current installation
Remove the blog project directory and delete the database.

#### Step 3: Re-install Canvas
Follow the [7 step installation process](https://github.com/austintoddj/canvas#installation).

#### Step 4: Re-import your data
After you've completed the installation, you can re-import your data and uploads from the archive you downloaded from [step 1](https://github.com/austintoddj/canvas/blob/master/UPGRADE.md#step-1-download-your-data).
The fastest way to accomplish this is to use a database manager like [Sequel Pro](http://sequelpro.com) and import each file manually.
> Because of the construction of the database, you may receive an error when trying to import the `post_tag` file. This is because the `posts`
and `tags` tables need to be imported first. Once those imports are run, you can safely import the `post_tag` file.
