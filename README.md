# Initial setup

```bash
cp app/config/parameters.yml.dist app/config/parameters.yml
composer install
app/console doctrine:database:create
app/console doctrine:schema:create
app/console assetic:dump
```

# Development

```bash
app/console doctrine:schema:update --force
app/console assetic:watch --force
bin/php-cs-fixer fix . --level=symfony --config=sf23 --fixers=-braces,-concat_without_spaces,-phpdoc_params,-remove_lines_between_uses
```
