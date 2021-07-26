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

### 4. Generate a unique application key

```shell
$ docker-compose exec app php artisan key:generate
```

### 5. Running migrations

```shell
$ docker-compose exec app php artisan migrate:fresh --seed
```

### 6. Use `http://localhost:8080` to access the application.
