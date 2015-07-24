Setup
=====

1. Create a WordPress.com app at https://developer.wordpress.com/apps/
2. Set the app's Redirect URI to your local machine at port 6260.
3. Copy the app's Client ID to id.client.
4. Copy the app's Client Secret to api.wordpress.
5. Copy the app's Redirect URI to uri.redirect.
6. Create a Google app at https://code.google.com/apis/console/?noredirect
7. Add Geocoding to the app
8. Copy the App's Geocoding API Key to api.google.
9. Create a Blog on WordPress.com and copy its Blog ID to id.blog.

Usage
=====

1. Copy some images into this folder.
   * If using OS X's Photos app, do File → Export → Export Unmodified Original...
2. Run `./upload`
3. Delete the image copies from this folder.
