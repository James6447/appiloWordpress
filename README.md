## APPLIQUE PROJECT
A website build with Wordpress.


### How to use this project
- ####Using normal docker image setting should look like:
```
version: '3.3'

services:
   db:
     image: mysql:5.7
     volumes:
       - db_data:/var/lib/mysql
     restart: always
     environment:
       MYSQL_ROOT_PASSWORD: somewordpress
       MYSQL_DATABASE: wordpress
       MYSQL_USER: wordpress
       MYSQL_PASSWORD: wordpress

   wordpress:
     depends_on:
       - db
     image: wordpress:latest
     ports:
       - "8000:80"
#   catch the data from container 
    volumes:
      - .:/var/www/html
    restart: always
    environment:
      WORDPRESS_DB_HOST: db:3306
      WORDPRESS_DB_USER: wordpress
      WORDPRESS_DB_PASSWORD: wordpress
      WORDPRESS_DB_NAME: wordpress
volumes:
    db_data: {}
    
```
- #### If using external link with database, please use following code: 
```
version: '3.3'

services:
  wordpress:
#    depends_on:
#       - db
    image: wordpress:latest
    ports:
      - "8000:80"
#   catch the data from container 
    volumes:
      - .:/var/www/html
    restart: always
    environment:
      WORDPRESS_DB_HOST: 172.17.0.1:xxxx
      WORDPRESS_DB_USER: username
      WORDPRESS_DB_PASSWORD: password
      WORDPRESS_DB_NAME: wordpress

networks:
  default:
    external:
      name: networks_name
 
```

- ####build wordpress image
```
docker-compose up --build -d
```


- ####Use All-In-One WP Migration plugins to import the data.