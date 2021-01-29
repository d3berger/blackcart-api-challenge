## BlackCart E-Commerce API Challenge Question

Created a products API using Laravel to integrate with e-commerce platform APIs. For the purposes of this challenge, I have only integrated with the `Shopify` and the `WooCommerce` products API.

Created a `stores` table that identifies the different platforms.
- 1 Shopify
- 2 WooCommerce

## Request structure

`GET http://localhost:8989/stores/{storeId}/products`

Where `{storeId}` is either `1` or `2`.

## Response structure

The response will be a list of products from the e-commerce platform that was specified by the `{storeId}` parameter. 
The Response is `json`. Format example is below.

```
[
    {
        "id": 632910392,
        "name": "IPod Nano - 8GB",
        "variations": [
            {
                "size": [],
                "colour": [
                    [
                        "Pink",
                        "Red",
                        "Green",
                        "Black"
                    ]
                ],
                "quantity": 10,
                "price": [
                    {
                        "currency": "USD",
                        "amount": "199.00"
                    }
                ],
                "weight": "1.25 lb"
            },
            ...
        ]
    ],
    ...
]
```

## Setup

First clone this repository.
`git clone blackcart-api-challenge`

Change to cloned directory.
`cd blackcart-api-challenge`

To setup you will need to have either `PHP` and `composer` installed or use `docker`.

Install composer dependancies.
`composer install`
or
`docker run --rm -v $(pwd):/app composer install`

Create Laravel environment file.
`cp .env.example .env`

Generate key.
`php artisan key:generate`
or
`docker run --rm -v $(pwd):/app -w /app php:7.4-cli php artisan key:generate`

Migrate database.
`php artisan migrate`
or
`docker run --rm -v $(pwd):/app -w /app php:7.4-cli php artisan migrate`

Start development environment.
`php artisan serve`
or
`docker run --rm -v $(pwd):/app -w /app -p 8989:8989 -it php:7.4 php artisan serve --host=0.0.0.0 --port=8989`

## Running tests

After the environment is setup, you can run tests.
`php artisan test`
or
`docker run --rm -v $(pwd):/app -w /app php:7.4-cli php artisan test`

## Adding another e-commerce platform

- To add another platform you would simply add a new row to the `stores` table. 
- Then create a new `Services` model that extends the `Platform` class. 
- Then add a case to the `ProductController` with the platform name.

## To Do

- I would have liked to take the data from each e-commerce API platform and save it as a `Product` model. Then I could use a `Resource` to format the data and output as `json` as a `Resource Collection`. That would have made it a bit more towards Laravel conventions.
- I wish I had better examples of the product data, especially from WoCommerce, to experiment with. I used the data from their API references but with a larger set of data I could have been more confident that the code would be getting all the proper information that was required.
- Test connecting to the e-commerce platforms to make sure the connection code is working. Currently the connection code is commented out but should be ready to be used with the e-commerce platform when posessing a valid API key etc.