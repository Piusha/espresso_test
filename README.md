
## Technologies

- Docker
- Laravel 9
- PHPUnit Test

## How to Setup

1. Ensure you have Docker installed and that http://localhost[:port] can access the containers once set up (in our docker-compose, we configure port 4545 on the host to forward to the nginx's port 45)

*Special case for Linux on Windows, read here: https://nickjanetakis.com/blog/setting-up-docker-for-windows-and-wsl-to-work-flawlessly#install-docker-and-docker-compose-within-wsl*

2. Clone the github repository into your local dev folder.
3. Copy contents from file `.env.example` to `.env`. If yor are using docker keep DB Connection properties as it is.
4. Run `docker-compose up -d --build` 
    * -d - Run as Deamon
    * --build - If your image has not been created, it will create new image
5. Once you setup docker you can login to the container with `docker-compose exec app bash`
6. Cool..... So far you are good if you are able to login to docker terminal. 2 more steps.
7. Run `composer install`
10. Yes All done

## Run Test Cases

1. Login to the container with `docker-compose exec app bash`
2. Run `./vendor/bin/phpunit`
