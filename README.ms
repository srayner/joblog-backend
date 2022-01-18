# Example backend PHP application using Symfony, Doctrine and MySQL, to list and log jobs.

## prerequisite

The following installation instructions assume you have git and Docker installed. You do not need PHP or composer installed as the
application is built using a docker image and also runs inside docker containers.

The database is accesible on port 33067, and the backend API is accessible on port 8000. If you system is alreading using these port numbers then
they can be altered by editing the docker-compose.yml file. If you do change port 8000 then remember to make the same change in the .env.local
file for the front end.

## Installation instructions

Clone this repo...

    git clone https://github.com/srayner/joblog-backend.git
    
Build the backend application...

    docker run --rm --interactive --tty --volume $PWD/server:/app composer install

Spin up docker contains for both the backend application and a MySQL database server.

    docker-compose up -d
    
Wait a minute or so to ensure the database server is fully up and accepting requests, then create and initialise the database...

    docker exec -e DATABASE_URL="mysql://root:example@database:3306/joblog?serverVersion8.0" joblog-api /usr/local/bin/php /var/www/html/bin/console doctrine:database:create --env=prod 
    docker exec -e DATABASE_URL="mysql://root:example@database:3306/joblog?serverVersion8.0" joblog-api /usr/local/bin/php /var/www/html/bin/console doctrine:migrations:migrate --env=prod

