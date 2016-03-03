## MPress - Fully Featured Lightweight CMS for the Modern Web

MPress is a fully featured yet lightweight content management system. 

Please note that this is the **DEVELOPMENTAL** BRANCH. May contain BREAKING CHANGES. Please use master 1.0.0 branch if you intend to clone this.

## Installation

~~Navigate to yoursite.com and run the web-based Installer. :)~~ Coming Soon

### DEV INSTALL

**Warning** This assumes you have composer and git installed!

* ```git clone -b dev https://github.com/MadMikeyB/MPress.git```
* ```composer install```
* ```mv .env.example .env```
* make a database (mysql, sqlite, etc) and set those details in the .env file.
* if you choose sqlite, you have to edit config/database.php and change the driver here, and create the sqlite file inside storage/
* ```php artisan migrate```
* ```php artisan key:generate```
* visit localhost/mpress/public_html (or wherever you cloned the repo to)
* Register a user and play

**Bonus Points**
```php artisan db:seed``` (adds example content)

### Attribution

MPress is grateful to use 

* [Laravel](https://github.com/laravel/laravel)
* [MarkDown](https://github.com/GrahamCampbell/Laravel-Markdown)
* [Settings Manager](https://github.com/anlutro/laravel-settings)
* [Menu Manager](https://github.com/lavary/laravel-menu)
* [Sluggable](https://github.com/cviebrock/eloquent-sluggable)
* [Theme](https://github.com/yaapis/Theme)

### Examples

No MPress 2.0 Sites are live. Yet.

### License

Copyright (c) 2012 - 2016, Michael Burton All rights reserved.

Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer. Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution. THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.