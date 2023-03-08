# matterport downloader

## What does

matterport-downloader downloads Skybox 360 panos photos of Matterport houses

## Dependencies

php, php-curl, curl  

This code can run over Linux and Windows  

## Usage

    $ php ./matterport-downloader.php <matterport id>  

e.g: If the url is https://my.matterport.com/show/?m=huhpm6maGbT&mls=1 you have to run the script this way:  

    $ php ./matterport-downloader.php huhpm6maGbT  

It will download all the skybox images with the highest quality available (4k, 2k or 1k).  

## Online downloader

https://openpano.rf.gd/download/ shows skybox images of matterport virtual tours, with save web complete option of browser it download all skybox images.

## Viewers

PC: Linux/Mac/Windows using Panini and opening as Cube Faces: https://github.com/lazarus-pkgs/panini  

Web Browser: Chrome and Firefox: Pannellum (webgl based), self hosted virtual tour, equirectangular and cubemap skybox: https://github.com/mpetroff/pannellum  

## Equirectangular

Skybox can be converted to equirectangular format and achieve a higher compatibility among viewers.  

https://github.com/fdd4s/skybox2equirectangular  

Or directly using this tool that merge both projects

https://github.com/fdd4s/matterport-dl-equi  

Equirectangular can be viewed in players like Ricoh Theta for Android https://play.google.com/store/apps/details?id=com.theta360&hl=en&gl=US  

## Credits

Created by fdd  
Send feedback and questions to fdd4776s@gmail.com  
Support future improvements of this software https://www.buymeacoffee.com/fdd4s  
All files are public domain https://unlicense.org/  
