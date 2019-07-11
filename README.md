# Mon Bouquet

## Installation

```shell
composer install
npm install
php bin/console doctrine:database:drop --force
php bin/console doctrine:database:create
php bin/console doctrine:migration:migrate
php bin/console doctrine:fixtures:load 
```

## Démarrer le projet

```shell
php bin/console server:run
npm run watch
```
