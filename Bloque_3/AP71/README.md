CREAMOS LA APP

    symfony new AP71 --version="7.4.x" --webapp --no-git

ENTRAMOS EN EL CONTENEDOR DE DOCKER Y NAVEGAMOS HASTA DONDE ESTA SITUADO EL PROYECTO

    docker exec -it servidor_php /bin/bash

    cd Bloque3/Tema7/AP71

INICIAMOS SYMFONY

    symfony serve --allow-all-ip

CREAMOS EL CONTROLADOR, LA ENTIDAD, LA BASE DE DATOS Y EL CRUD

    php bin/console make:controller MainController

    php bin/console make:entity

    php bin/console doctrine:database:create

    php bin/console make:crud Entidad

HACEMOS QUE EL CRUD FUNCIONE

    php bin/console make:migration

    php bin/console doctrine:migrations:migrate

    php bin/console doctrine:schema:update
