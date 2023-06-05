# PHP Exercise

## Start a php cli useing Dockerfile

### Create php image
```
docker build -t tarekmonjur/php .
```

### Create php cli container from image
```
docker run -it --name php-test --rm tarekmonjur/php bash
```

#### Use ctr+\ for exit when use **-it** for ctr+c or ctr+p to exit use **-t -i**

<br/>

### Using Volume
```
docker run -it --name php-test -v $(pwd)/:/var/www/html/ --rm tarekmonjur/php bash
```
