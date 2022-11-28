# matterport-downloader
Download Skybox panoramic photos of Matterport houses

dependences: php, php-curl

How to use:
If the url is https://my.matterport.com/show/?m=huhpm6maGbT&mls=1 you have to run the script this way: php ./matterport-downloader.php huhpm6maGbT

You will get all the high res skybox images.

If you want convert to equirectangular images you can use "cube2sphere" open source software.

You can create a slideshow mp4 video of equirectangular panoramic jpg images using FFMPEG open source software (just like a normal slideshow of jpg images), add the tag to the video of 360º panoramic using "spatial-media" open source software and upload to youtube where your slideshow video will be shown as a 360º panoramic video. 

Additional related software:
https://github.com/Xyene/cube2sphere
https://github.com/FFmpeg/FFmpeg
https://github.com/google/spatial-media


Viewers:

You can watch equirectangular 360º images in Android (including cardboard vr) using: Ricoh Theta App https://play.google.com/store/apps/details?id=com.theta360&hl=en&gl=US
But you must add the correct 360º Exif Tags before to the equirectangular image using Exiftool https://github.com/exiftool/exiftool in order to open with Ricoh Theta App

You can watch skybox/equirectangular 360º images in Linux/Mac/Windows using Panini https://github.com/lazarus-pkgs/panini (no need to include exif tags in order to open with this viewer)

You can send feedback, suggestions and questions to fdd4776s@gmail.com
