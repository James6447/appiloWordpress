## APPLIQUE PROJECT
A website build with Wordpress.

Demo Web:

URL: http://appiloque.lat.tw/

Username: JamesLiew

Password: uXFXNd@KORUljLdm3h


### Plugins

- All-in-One-Migration

- Page Builder by SiteOrigin

- SiteOrigin Widgets Bundle

- Ultimate Form Builder Lite

- MetaSlider

#### All-in-One-Migration

This is very helpful to export a project with data, 
and this is very familiar with database version control. 

#### Page Builder by SiteOrigin, SiteOrigin Widgets Bundle

This plugins is use to build the page more customization.

Have an interface which is very helpful when the admin is creating a page.

Only need to drag and drop when doing the typesetting.

#### MetaSlider

This plugin is use to generate a slider with interface.

All you need to do is paste the html code, very continent.

#### Ultimate Form Builder Lite

Can generate different form with interface.

Every element can also append a class or id for it, 
that means we can add different form pattern.

Most importantly,
this plugin are including the email function that you can check the form replied on admin page.
  

---

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