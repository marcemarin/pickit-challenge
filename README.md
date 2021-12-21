
# Pickit Challenge

Car workshop Rest api


## Run Locally

Clone the project

```bash
  git clone https://github.com/marcemarin/pickit-challenge.git
```

Go to the project directory

```bash
  cd pickit-challenge
```

Install dependencies

```bash
  docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

Start the server

```bash
  ./vendor/bin/sail up
```

Run migrations and seed database (inside the docker container)

```bash
  php artisan migrate --seed
```
## Environment Variables

To run this project, you will need to add the following environment variables to your .env file

`APP_PORT`

`DB_DATABASE`

`DB_USERNAME`

`DB_PASSWORD`
## API Reference

#### Get all services for a car

```http
  GET /api/cars/{car_id}/services
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `car_id` | `int` | **Required**. The car id |

## Authors

- [@marcemarin](https://github.com/marcemarin)

