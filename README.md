git clone https://github.com/jeysonlr/laminas-mezzio-api.git

### run project
```
docker-compose up -d --build
```

### enter container for install dependencies
```
docker exec -it teste-mezzio_laminas bash

composer install
```


### Do NOT run development mode on your production server!

```bash
$ composer development-enable
```

### To disable development mode

```bash
$ composer development-disable
```

### Development mode status

```bash
$ composer development-status
```

```
project run port 8082
```
### documentation routes 

https://web.postman.co/collections/7013209-3b2022c9-ce7f-47d0-b37d-95ad3f038f8c?version=latest&workspace=1b67e6bd-dc28-4c35-8acc-77f6c073c138#introduction


### reports
``
jeysonlr@gmail.com
``
