#! /bin/bash

URL="https://download.elasticsearch.org/elasticsearch/elasticsearch/elasticsearch-1.4.1.deb?_ga=1.81700114.460435653.1417431864" 

wget $URL -O elastic.deb

sudo dpkg -i elastic.deb
sudo update-rc.d elasticsearch defaults 95
sudo service elasticsearch start
