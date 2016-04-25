## How to deploy the music player 


### 1 Launch VMs
 
  First choose Ubuntu Server 14.04 LTS (HVM), SSD Volume Type for target VM

  And from provided types choose t2.micro which has 1 vCPU 1GiB memeory and 8GB Instance Storage 
  
  If there is more than 1 server it's efficient to keep all instances under same subnet.

### 2 VM Configurations

 2.1 Servers

Details: [here](https://github.com/Exodus000/CloudComputingProj/blob/master/ConfigServers.md)

2.2 Load Balancers

For a sample music player the load balancer is **not required**. If you wish not to set up one please jump to Step [#3](https://github.com/Exodus000/CloudComputingProj#3-create-local-project-files)

Depends on how many workload users will generate, the numbers of load balancer will change, for example now you can depoly one load balancer with 3 back-end servers.
 
Details: [here](https://github.com/Exodus000/CloudComputingProj/blob/master/ConfigLoadBalancer.md)
 
### 3 Create local project files

3.1 Web page coding

Write the player main screen use html and css. For sample the code has been upload to github [here](https://github.com/Exodus000/CloudComputingProj/blob/master/index.php) and [here](https://github.com/Exodus000/CloudComputingProj/blob/master/table.css).

3.2 Including *.mp3 files

Required files has been upload to [here](https://github.com/buaajjg/music)

### 4 Download and update codes and files in step 3 through github

On servers

use
```
$ cd /var/www/html
```
to locate apache2 root directory

use
```
$ sudo git clone https://github.com/Exodus000/CloudComputingProj.git
$ sudo git clone https://github.com/JamesHeinrich/getID3.git
```
to clone the repo to current directory

and 
```
$ sudo git pull 
```
to make a update

move the compentonts to the html directory
```
sudo mv CloudComputingProj/* /var/www/html
```

### 5 Install apache2 and php

which has been includes in step 2

### 6 How to start the application

Simply visit [Music Player] and it will start automatically

And now click play button after song you like  it will start playing, click download it will generate a browser download action.

