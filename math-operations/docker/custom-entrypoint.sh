#!/bin/sh
if [ $1 = "mac" ]
then
  ip -4 route list match 0/0 | awk '{print $3 " host.docker"}' >> /etc/hosts
else
  ip -4 route list match 0/0 | awk '{print $3 " host.docker.internal"}' >> /etc/hosts
fi
exec apache2-foreground
exec "$@"
