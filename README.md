# matterport-downloader
Download Skybox panoramic photos of Matterport houses

dependences: php, php-curl

How to use:
If the url is https://my.matterport.com/show/?m=huhpm6maGbT&mls=1 you have to run the script this way: php ./matterport-downloader.php huhpm6maGbT

You will get all the high res skybox images.

Convert SkyBox to Equirectangular images: If you want convert to equirectangular images you can use "cube2sphere" open source software. https://github.com/Xyene/cube2sphere

Equirectangular is a widely more compatible panorama 360 photos standard than skybox (aka cube faces). e.g: Google Street View uses Equirectangular 360 panoramas as standard.

You can create a slideshow mp4 video of equirectangular panoramic jpg images using FFMPEG open source software (just like a normal slideshow of jpg images), add the tag to the video of 360º panoramic using "spatial-media" open source software and upload to youtube where your slideshow video will be shown as a 360º panoramic video (playable in every youtube supported device, like Virtual Reality glasses). 

Additional related software:
https://github.com/FFmpeg/FFmpeg
https://github.com/google/spatial-media


Viewers:

Android: You can watch equirectangular 360º images in Android (including cardboard vr) using: Ricoh Theta App https://play.google.com/store/apps/details?id=com.theta360&hl=en&gl=US
But you must add the correct 360º Exif Tags before to the equirectangular image using Exiftool https://github.com/exiftool/exiftool in order to open with Ricoh Theta App

PC: You can watch skybox (cube faces) and equirectangular 360º images in Linux/Mac/Windows using Panini https://github.com/lazarus-pkgs/panini (no need to include exif tags in order to open with this viewer)

Web Browser: You can watch equirectangular 369º images in Chrome and Firefox using three.js (webgl based): https://github.com/pljhonglu/threejs-panorama https://threejs.org/examples/webgl_panorama_equirectangular.html (no need to include exif tags in the jpg)

You can send feedback, suggestions and questions to fdd4776s@gmail.com
