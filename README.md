# direct-access
Project sample or bootstrap for PHP7+, Doctrine2, GraphQL application.

------------
    vendor/bin/doctrine orm:schema-tool:create

    curl http://localhost/direct-access/index.php -d '{"query": "query { users{ email, creationDate } }" }' 
    curl http://localhost/direct-access/index.php -d '{"query": "query { users(id: 1) { email, creationDate } }" }' 
------------