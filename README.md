# Boilerplate 

Boilerplate for setting up PHP 7 with composer PSR4 and phpunit



### MAC Pro Development Environment Steps: 
* Install XCode https://www.moncefbelyamani.com/how-to-install-xcode-homebrew-git-rvm-ruby-on-mac/
* Install zsh with theme color for terminal https://jakoblaegdsmand.com/en/blog/how-to-get-an-awesome-looking-terminal-on-mac-os-x/
* copy your ssh key to ./ssh or generate new one and add it to github
* Install git auto complete https://github.com/bobthecow/git-flow-completion/wiki/Install-Bash-git-completion
*  Install PHP 7 and Composer and phpunit
```sh
$ brew tap homebrew/dupes
$ brew tap homebrew/php
$  brew install php71
```
* To launch php-fpm on startup:
    mkdir -p ~/Library/LaunchAgents
    cp /usr/local/opt/php71/homebrew.mxcl.php71.plist ~/Library/LaunchAgents/
    launchctl load -w ~/Library/LaunchAgents/homebrew.mxcl.php71.plist
* also make sure that /usr/loca/sbin is loaded first in $PATH 
```sh
$ brew install composer
$ brew install phpunit
```
*  Install Nginx
```sh
$ brew install nginx
```
* modify php-brew sudo vim /private/etc/php-fpm.conf  group name and log file
* Modify nginx in /usr/local/etc/nginx/
```sh
$ cd /usr/local/etc/nginx
$ mkdir sites-available
$ mkdir sites-enabled
$ touch sites-available/deafult.conf
$ cd sites-enabled
$ ln ../sites-available/default.conf
```
* add the following configuration to default.conf
```sh
server {

   listen       80;
   server_name ~^(?<name>.+)\.lb$;
   set $baseroot /Users/Lamis/Developer;
   set $root $baseroot;
   
   if ($name) {
       set $root $baseroot/$name/public;
   } 
  
   root $root;
   index index.php index.html;
   try_files $uri $uri/ /index.php?$args;
   error_log /usr/local/var/log/nginx_error.log error;

    #access_log  logs/host.access.log  main;

   location ~ ^(.+\.php)(?:/.+)?$ {
       expires off;
       proxy_read_timeout 600;
       proxy_connect_timeout 600;
       fastcgi_pass 127.0.0.1:9000;
       fastcgi_index index.php;
       fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
       fastcgi_split_path_info ^(.+\.php)(/.*)$;
       fastcgi_connect_timeout 60;
       fastcgi_send_timeout 180;
       fastcgi_read_timeout 180;
       fastcgi_buffer_size 1m;
       fastcgi_buffers 4 1m;
       fastcgi_busy_buffers_size 1m;
       fastcgi_temp_file_write_size 1m;
       fastcgi_intercept_errors on;
       include fastcgi_params;
   }

   location ~ /\. {
       deny  all;
   }
}

```
* add the following line to nginx.conf inside http{}
```sh
 include /usr/local/etc/nginx/sites-enabled/*.conf;

```
* sudo nginx -s reload
* you might need to kill the php-fpm service
```sh
lsof -i :9000
kill -9 {port}
```
* modify host file  sudo vim /private/etc/hosts
