Picload
=======

It's a web script (php) and a command line utility (bash) to upload images directly from command line to a web server.

Put the .php in your web server and create a directory called "p" in the base directory (not in the same directory as your .php file!).
Then edit your client script to point to your .php file in your webserver.

After this, you should be able to launch the script to upload images directly on your server with a simple command line interface.

./picload -f image.png | ./picload image.png

These two (equivalent) commands will upload the image to the web server.

./picload -u http://example.com/image.png

This command will download an image from the internet and will upload it on your web server.

All images format are supported, non-image files are not.
