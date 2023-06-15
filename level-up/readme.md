# PHP Level UP

## Start a php cli useing Dockerfile

### Create php image
```
docker build -t tarekmonjur/php-apache .
```

### Create php cli container from image
```
docker run -it --name php-test -p 8080:80 --rm tarekmonjur/php-apache
```

#### Use ctr+\ for exit when use **-it** for ctr+c or ctr+p to exit use **-t -i**

<br/>

### Using Volume
```
docker run -it --name php-test -p 8080:80 -v $(pwd)/:/var/www/html/ --rm tarekmonjur/php-apache
```
