# Composer and autoloading
## dans le terminal vs code 
    composer init 
    composer install 
## dans l'autoload

```json
    "autoload": {
        "psr-4": {
            "Project\\": "src/"
        }
    }
```
- Reset l'autoload
```shell
composer dump-autoload
```
```shell
cd .\public\
```
```shell
php -S localhost:8000
```