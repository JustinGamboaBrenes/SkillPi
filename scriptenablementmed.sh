#!/bin/bash
##adds user candidate 

# Get the current value of $DOCKER_HOST_IP
DOCKER_HOST_IP=$(curl ipinfo.io/ip)

# Replace occurrences of the IP address with $DOCKER_HOST_IP
sed -i "s/138.94.56.72/${DOCKER_HOST_IP}/g" /var/www/html/index.html
