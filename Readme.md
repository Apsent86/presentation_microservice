## Migrations

### Entities

Entities placed in the appropriate folder `src\Entity`.

Each entity should extend `AbstractEntity` class
because ClickHouse required `EventDate` column for each table besides `ID` field.
Table annotation should have appropriated configured options: ` options: ['eventDateColumn' => 'EventDate']`.

### New migration generation

Create new Entity(es) and fill required fields attributes. Run command to generate migration:

 ```php
bin/console doctrine:migrations:diff
 ```

### Possible issues

Doctrine migrations relies on a properly configured Database server in the connection string
to manage the table storing the migrations, also known as the metadata storage.

If you encounter the error `The metadata storage is not up to date,
please run the sync-metadata-storage command to fix this issue` please run next command to fix error:

 ```php
bin/console doctrine:migrations:sync-metadata-storage
 ```

```
db: ## prepare database
	bin/console doctrine:database:create --if-not-exists
	bin/console doctrine:migrations:migrate -n -q
	bin/console doctrine:schema:validate

fixtures: ## prepare database with test fixtures
	bin/console doctrine:fixtures:load --purge-with-truncate -q

```
