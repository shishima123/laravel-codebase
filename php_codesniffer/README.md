Run command below in docker to check style code:

    ./php_codesniffer/vendor/bin/phpcs --standard=PSR2 -sp --basepath=. --ignore=vendor ./app ./config ./database ./routes
