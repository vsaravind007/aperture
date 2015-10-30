
![enter image description here](http://aravindvs.com/aperture/aperture_git.png)

**Aperture** is a minimal responsive album with a built in CMS for simplified image upload and management. Aperture was built in an hour for a friend of mine and later on I decided to make it public. Aperture uses simple PHP session for admin access.

**Requirements**
- PHP 5.x with Mysqli extension
- MySQL Server

**Installation**

    - Copy all files to a folder on your server
    - Make the folders admin/uploads and admin/thumbs writeable (chmod 777)
    - Import DB.sql to a database on your server using PhpMyAdmin or a similar program.
    - Edit admin/CONFIG.php to reflect your server details
    - Change Username and Password in admin/CONFIG.php
    - DONE!

**Accessing Admin Area**

Go to `/apertureinstalldirectory/admin` for admin access. Default username is *admin*, password is *pass*

**Demo**

Checkout the front end demo here: http://aravindvs.com/aperture

**Note**

Aperture wasn't built using the best practices for building PHP applications. No frameworks are used since they'll render the project complex.

**Contributions**

Contributions are 100% welcome!

**Future**

I'll try to update the project or maybe rewrite it to make it clean. 

**License**

Free for Personal & Commercial Use under Creative Commons Attribution 3.0 License


**Credits**

Lens HTML5 album by HTML5 UP - http://html5up.net

AdminLTE by Almsaeed Studio - https://almsaeedstudio.com
