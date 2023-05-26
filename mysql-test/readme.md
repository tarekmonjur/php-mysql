# MySql Exercise

## Start a mysql server useing Dockerfile

### Create mysql image
```
docker build -t tarekmonjur/mysql .
```

### Create mysql server container from image
```
docker run -it --name mysql-test --rm tarekmonjur/mysql
```
#### Using Port
```
docker run -it --name mysql-test -p 3307:3306 --rm tarekmonjur/mysql
```

#### Use ctr+\ for exit when use **-it** for ctr+c or ctr+p to exit use **-t -i**
