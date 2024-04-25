
## Install
Clone repo
```
git clone https://github.com/Feodal0p/citycard-practice.git
```
Copy .env.example file to .env

### Install dependencies
install dependecies using composer 
```
composer install
```
Or install dependecies using docker container
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```

### Run docker containers
```
./vendor/bin/sail up --build -d 
```

### Generate a New Application Key
```
./vendor/bin/sail artisan key:generate
```

### Run migrations
```
./vendor/bin/sail artisan migrate --seed 
```

### Go to
```
localhost
```