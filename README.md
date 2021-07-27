# Sisyphus

> “The workman of today works every day in his life at the same tasks, and this fate is no less absurd. But it is tragic only at the rare moments when it becomes conscious.”
>
> Albert Camus, *The Myth of Sisyphus*

## Instruction

### 1. Build the app image

```shell
$ docker-compose build app
```

### 2. Run the environment in background mode

```shell
$ docker-compose up -d
```

### 3. Install the application dependencies

```shell
$ docker-compose exec app composer install
```

### 4. Setting up the environment configuration file

```shell
$ cp .env.example .env
```

Please use the settings below:

```
APP_NAME=Sisyphus
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8080

LOG_CHANNEL=daily
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret

CACHE_DRIVER=redis
REDIS_CLIENT=phpredis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```

### 5. Generate a unique application key

```shell
$ docker-compose exec app php artisan key:generate
```

### 6. Running migrations

```shell
$ docker-compose exec app php artisan migrate
```

### 7. Use `http://localhost:8080` to access the application.
