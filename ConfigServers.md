In NETWORK & SECURITY tab, set the inbound type All Tcp is allowed 

Updating The Operating-System
``` 
$ sudo aptitude    update
$ sudo aptitude -y upgrade
```
Install apache2, php and git 
```
sudo apt-get install apache2 unzip tcl php5 libapache2-mod-php5 make gcc git php5-dev
```
Config github account 
```
git config --global user.name "yourusername"
git config --global user.email "youremail"
```
Getting The Essential Build Tools
```
$ sudo aptitude install -y build-essential
```
