# Elogbooks Test Backend Api

#### Requirements
1. git (https://git-scm.com/downloads)
2. composer (https://getcomposer.org/download/)
3. php with php-xml module (sudo apt-get install php-xml [ubuntu 16]) (https://symfony.com/doc/current/reference/requirements.html)
4. mysql

#### Installation
1. Get composer https://getcomposer.org/download/
2. Copy app/parameters.yml.dist to app/parameters.yml
3. Run 'composer install' in project root folder
3. Create database, load fixtures
    - php bin/console doctrine:database:create
    - php bin/console doctrine:schema:update --force
    - php bin/console doctrine:fixtures:load
4. Run 'php bin/console server:run localhost:8001'

#### Quick code guide
SF2 standard pattern so controllers are located in AppBundle/Controller, Entities in AppBundle/Entity, all forms to handle parameters and data should be located in
AppBundle/Form folder. All custom db queries including native queries should go to Repository objects located in AppBundle/Repository

#### Usefull links
1. http://jmsyst.com/libs/serializer <- JMS is used for object rest serialization.
2. http://symfony.com/doc/current/validation.html <- sf2 validation constraints doc, should be used on DTO and entities.
3. http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html <- in case of native query execution
