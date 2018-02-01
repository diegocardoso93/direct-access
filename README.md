# direct-access
Project sample or bootstrap for PHP7+, Doctrine2, GraphQL application.

    composer install
    vendor/bin/doctrine orm:schema-tool:create

    curl http://localhost/direct-access/index.php -d '{"query": "query { users{ email } }" }' 
    curl http://localhost/direct-access/index.php -d '{"query": "query { users(id: 1) { email } }" }' 

    apollo-codegen introspect-schema http://localhost/direct-access/index.php/graphql --output schema.json
