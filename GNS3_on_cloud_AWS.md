# Create t2.micro EC2 instance with 30 GB Disk Space

Step 1: Choose an Amazon Machine Image (AMI)
Ubuntu Server 18.04 LTS

Step 2: Choose an Instance Type
t2.micro

Step 4: Add Storage
30 GB

Step 6: Configure Security Group
Open port 1194 for the remote server

Reference: https://docs.gns3.com/docs/getting-started/installation/remote-server
````
cd /tmp
curl https://raw.githubusercontent.com/GNS3/gns3-server/master/scripts/remote-install.sh > gns3-remote-install.sh
bash gns3-remote-install.sh --with-openvpn --with-iou --with-i386-repository
````
