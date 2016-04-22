## How to deploy the music player on your PC

### 1 Launch VMs
 
  First choose Ubuntu Server 14.04 LTS (HVM), SSD Volume Type for target VM

  And from provided types choose t2.micro which has 1 vCPU 1GiB memeory and 8GB Instance Storage 

### 2 VM Configurations

  2.1 Servers
  
  Details: [here](https://github.com/Exodus000/CloudComputingProj/blob/master/LaunchServers)
 
  2.2 Load Balancers
  
  For a sample music player the load balancer is **not required**. If you wish not to set up one pleast jump to #Step 3
  
  Depends on how many workload users will generate, the numbers of load balancer will change, for example now you can depoly one load balancer with 3 back-end servers.
  
  Details:
  
### 3 Upload some *.mp3 files



