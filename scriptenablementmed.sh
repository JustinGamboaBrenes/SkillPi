#!/bin/bash
exec >> /tmp/script.log 2>&1

echo "Retrieving IP address..."
DOCKER_HOST_IP=$(curl ipinfo.io/ip)
echo "Retrieved IP address: $DOCKER_HOST_IP"

echo "Substituting IP address in index.html..."
sed -i "s/138.94.56.72/${DOCKER_HOST_IP}/g" /var/www/html/index.html
echo "Substitution completed."
