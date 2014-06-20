#Lumiart's Secret Files Manager

This plugin will allow you to securely send files via WordPress. Whole point of this plugin is ability to handle huge files, which would be hardly uploaded via web and also can't be streamed back via PHP.

Whole download part is handled by web server, so you won't get PHP memory issues.

You will also get nice permalinks to your files with their name in it.

##How it works?
You can upload your files via FTP (or by other means) to folder wp-secret-files/import. Then in your dashboard, go to **Secret Files** and press **Import new files**. You can copy link to your file with button next to it.

Under the hood the plugin will move your files into folder with long random token. Than it will generate URL, where is different, shorter token and sanitized file name. When you hit the link, it will check, if the short token belongs to that filename and only then exposes URL to the file itself.

##Note
For now, there is only Czech language and also there is no uninstall routine. Both will be addressed in near future (hopefully).

If you want to clean after uninstall, delete whole wp-secret-files folder in wp root. Than delete all posts with post type `secret-files` and also postmeta attached to those posts.