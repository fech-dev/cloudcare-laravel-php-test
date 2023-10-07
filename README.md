## Setup

- Install dependencies with `composer install` and run the project with `sail up -d` 

- This project uses [tymon/jwt-auth](https://jwt-auth.readthedocs.io) package for jwt authentication.
Run `sail artisan jwt:secret` command to generate the jwt secret key.

- Run database migrations and seeders `sail artisan migrate --seed`

## APIs

### POST /api/auth/login

Authenticate the user.
Responds with 401 code if credentials are not valid.

*Body*
```json
{
    "username": "root",
    "password": "password"
}
```

*Response*
```json
{
    "access_token": "<token>",
    "token_type": "Bearer",
    "expires_in": 3600
}
```

### GET /api/beers

Responds with a paginated list of beers

#### Pagination
Use the `page` and `per_page` query params to use pagination.
By default API will respond with 25 beers.

*Response*
```json
{
    "data": [
        {
            ...Punk API Beer Object
        },
        ...
    ]
}
```
