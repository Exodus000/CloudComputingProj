In NETWORK & SECURITY tab, set the inbound type All Tcp is allowed 

Updating The Operating-System
``` 
$ sudo aptitude    update
$ sudo aptitude -y upgrade
```
Install apache2 and php
```
$ sudo apt-get install apache2 unzip tcl php5 libapache2-mod-php5 make gcc git php5-dev
```
Install git 
```
$ sudo apt-get install git gcc
```
Getting The Essential Build Tools
```
$ sudo aptitude install -y build-essential
```
Getting The Modules And Dependencies
```
$ sudo apt-get install -y libapache2-mod-proxy-html libxml2-dev
$ sudo a2enmod
$ proxy proxy_ajp proxy_http rewrite deflate headers proxy_balancer proxy_connect proxy_html
```

Modifying The Default Configuration, open file use
```
$ sudo nano /etc/apache2/sites-enabled/000-default.conf
```

Add 
```
ProxyPass / balancer://mycluster/
ProxyPassReverse / balancer://mycluster/
```
before tag </ VirtualHost >

Add
```
<Proxy balancer://mycluster>
    # Define back-end servers:

    # Server 1
    BalancerMember "your server's private ip" which can be find use $ /sbin/ip addr

    # Server 2
    BalancerMember "if you use more than 1 server add its pravite ip here"

    # Server 3
    BalancerMember "if you use more than 2 server add its pravite ip here"

</Proxy>
```
After tag </ VirtualHost >
