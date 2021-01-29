<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class Shopify extends Platform
{
    /**
     * @var Client
     */
    private $client;

    /**
     * Shopify Service constructor.
     * @param Http $client
     */
    public function __construct(Http $client = null)
    {
        if ($client === null) {
            $client = Http::withHeaders([
                'Content-Type' => 'application/json',
                'X-Shopify-Access-Token' => config('services.shopify.password')
            ]);
        }
        $this->client = $client;
    }

    public function get($path)
    {
        /*
        Uncomment these lines when testing directly to e-commerce platform
        $response = $this->client->get(config('services.shopify.url') . $path);
        $items = $response->json();
        */

        /*
        example data from:
        https://shopify.dev/docs/admin-api/rest/reference/products/product#show-2021-01
        remove when using code above
         */
        $items = <<<STRING
{
    "products": [
        {
        "id": 632910392,
        "title": "IPod Nano - 8GB",
        "body_html": "<p>It's the small iPod with one very big idea: Video. Now the world's most popular music player, available in 4GB and 8GB models, lets you enjoy TV shows, movies, video podcasts, and more. The larger, brighter display means amazing picture quality. In six eye-catching colors, iPod nano is stunning all around. And with models starting at just $149, little speaks volumes.</p>",
        "vendor": "Apple",
        "product_type": "Cult Products",
        "created_at": "2021-01-11T18:12:26-05:00",
        "handle": "ipod-nano",
        "updated_at": "2021-01-11T18:12:26-05:00",
        "published_at": "2007-12-31T19:00:00-05:00",
        "template_suffix": null,
        "published_scope": "web",
        "tags": "Emotive, Flash Memory, MP3, Music",
        "admin_graphql_api_id": "gid://shopify/Product/632910392",
        "variants": [
            {
            "id": 808950810,
            "product_id": 632910392,
            "title": "Pink",
            "price": "199.00",
            "sku": "IPOD2008PINK",
            "position": 1,
            "inventory_policy": "continue",
            "compare_at_price": null,
            "fulfillment_service": "manual",
            "inventory_management": "shopify",
            "option1": "Pink",
            "option2": null,
            "option3": null,
            "created_at": "2021-01-11T18:12:26-05:00",
            "updated_at": "2021-01-11T18:12:26-05:00",
            "taxable": true,
            "barcode": "1234_pink",
            "grams": 567,
            "image_id": 562641783,
            "weight": 1.25,
            "weight_unit": "lb",
            "inventory_item_id": 808950810,
            "inventory_quantity": 10,
            "old_inventory_quantity": 10,
            "requires_shipping": true,
            "admin_graphql_api_id": "gid://shopify/ProductVariant/808950810",
            "presentment_prices": [
                {
                "price": {
                    "currency_code": "USD",
                    "amount": "199.00"
                },
                "compare_at_price": null
                }
            ]
            },
            {
            "id": 49148385,
            "product_id": 632910392,
            "title": "Red",
            "price": "199.00",
            "sku": "IPOD2008RED",
            "position": 2,
            "inventory_policy": "continue",
            "compare_at_price": null,
            "fulfillment_service": "manual",
            "inventory_management": "shopify",
            "option1": "Red",
            "option2": null,
            "option3": null,
            "created_at": "2021-01-11T18:12:26-05:00",
            "updated_at": "2021-01-11T18:12:26-05:00",
            "taxable": true,
            "barcode": "1234_red",
            "grams": 567,
            "image_id": null,
            "weight": 1.25,
            "weight_unit": "lb",
            "inventory_item_id": 49148385,
            "inventory_quantity": 20,
            "old_inventory_quantity": 20,
            "requires_shipping": true,
            "admin_graphql_api_id": "gid://shopify/ProductVariant/49148385",
            "presentment_prices": [
                {
                "price": {
                    "currency_code": "USD",
                    "amount": "199.00"
                },
                "compare_at_price": null
                }
            ]
            },
            {
            "id": 39072856,
            "product_id": 632910392,
            "title": "Green",
            "price": "199.00",
            "sku": "IPOD2008GREEN",
            "position": 3,
            "inventory_policy": "continue",
            "compare_at_price": null,
            "fulfillment_service": "manual",
            "inventory_management": "shopify",
            "option1": "Green",
            "option2": null,
            "option3": null,
            "created_at": "2021-01-11T18:12:26-05:00",
            "updated_at": "2021-01-11T18:12:26-05:00",
            "taxable": true,
            "barcode": "1234_green",
            "grams": 567,
            "image_id": null,
            "weight": 1.25,
            "weight_unit": "lb",
            "inventory_item_id": 39072856,
            "inventory_quantity": 30,
            "old_inventory_quantity": 30,
            "requires_shipping": true,
            "admin_graphql_api_id": "gid://shopify/ProductVariant/39072856",
            "presentment_prices": [
                {
                "price": {
                    "currency_code": "USD",
                    "amount": "199.00"
                },
                "compare_at_price": null
                }
            ]
            },
            {
            "id": 457924702,
            "product_id": 632910392,
            "title": "Black",
            "price": "199.00",
            "sku": "IPOD2008BLACK",
            "position": 4,
            "inventory_policy": "continue",
            "compare_at_price": null,
            "fulfillment_service": "manual",
            "inventory_management": "shopify",
            "option1": "Black",
            "option2": null,
            "option3": null,
            "created_at": "2021-01-11T18:12:26-05:00",
            "updated_at": "2021-01-11T18:12:26-05:00",
            "taxable": true,
            "barcode": "1234_black",
            "grams": 567,
            "image_id": null,
            "weight": 1.25,
            "weight_unit": "lb",
            "inventory_item_id": 457924702,
            "inventory_quantity": 40,
            "old_inventory_quantity": 40,
            "requires_shipping": true,
            "admin_graphql_api_id": "gid://shopify/ProductVariant/457924702",
            "presentment_prices": [
                {
                "price": {
                    "currency_code": "USD",
                    "amount": "199.00"
                },
                "compare_at_price": null
                }
            ]
            }
        ],
        "options": [
            {
            "id": 594680422,
            "product_id": 632910392,
            "name": "Color",
            "position": 1,
            "values": [
                "Pink",
                "Red",
                "Green",
                "Black"
            ]
            }
        ],
        "images": [
            {
            "id": 850703190,
            "product_id": 632910392,
            "position": 1,
            "created_at": "2021-01-11T18:12:26-05:00",
            "updated_at": "2021-01-11T18:12:26-05:00",
            "alt": null,
            "width": 123,
            "height": 456,
            "src": "https://cdn.shopify.com/s/files/1/0006/9093/3842/products/ipod-nano.png?v=1610406746",
            "variant_ids": [],
            "admin_graphql_api_id": "gid://shopify/ProductImage/850703190"
            },
            {
            "id": 562641783,
            "product_id": 632910392,
            "position": 2,
            "created_at": "2021-01-11T18:12:26-05:00",
            "updated_at": "2021-01-11T18:12:26-05:00",
            "alt": null,
            "width": 123,
            "height": 456,
            "src": "https://cdn.shopify.com/s/files/1/0006/9093/3842/products/ipod-nano-2.png?v=1610406746",
            "variant_ids": [
                808950810
            ],
            "admin_graphql_api_id": "gid://shopify/ProductImage/562641783"
            }
        ],
        "image": {
            "id": 850703190,
            "product_id": 632910392,
            "position": 1,
            "created_at": "2021-01-11T18:12:26-05:00",
            "updated_at": "2021-01-11T18:12:26-05:00",
            "alt": null,
            "width": 123,
            "height": 456,
            "src": "https://cdn.shopify.com/s/files/1/0006/9093/3842/products/ipod-nano.png?v=1610406746",
            "variant_ids": [],
            "admin_graphql_api_id": "gid://shopify/ProductImage/850703190"
        }
        },
        {
        "id": 921728736,
        "title": "IPod Touch 8GB",
        "body_html": "<p>The iPod Touch has the iPhone's multi-touch interface, with a physical home button off the touch screen. The home screen has a list of buttons for the available applications.</p>",
        "vendor": "Apple",
        "product_type": "Cult Products",
        "created_at": "2021-01-11T18:12:26-05:00",
        "handle": "ipod-touch",
        "updated_at": "2021-01-11T18:12:26-05:00",
        "published_at": "2008-09-25T20:00:00-04:00",
        "template_suffix": null,
        "published_scope": "web",
        "tags": "",
        "admin_graphql_api_id": "gid://shopify/Product/921728736",
        "variants": [
            {
            "id": 447654529,
            "product_id": 921728736,
            "title": "Black",
            "price": "199.00",
            "sku": "IPOD2009BLACK",
            "position": 1,
            "inventory_policy": "continue",
            "compare_at_price": null,
            "fulfillment_service": "shipwire-app",
            "inventory_management": "shipwire-app",
            "option1": "Black",
            "option2": null,
            "option3": null,
            "created_at": "2021-01-11T18:12:26-05:00",
            "updated_at": "2021-01-11T18:12:26-05:00",
            "taxable": true,
            "barcode": "1234_black",
            "grams": 567,
            "image_id": null,
            "weight": 1.25,
            "weight_unit": "lb",
            "inventory_item_id": 447654529,
            "inventory_quantity": 13,
            "old_inventory_quantity": 13,
            "requires_shipping": true,
            "admin_graphql_api_id": "gid://shopify/ProductVariant/447654529",
            "presentment_prices": [
                {
                "price": {
                    "currency_code": "USD",
                    "amount": "199.00"
                },
                "compare_at_price": null
                }
            ]
            }
        ],
        "options": [
            {
            "id": 891236591,
            "product_id": 921728736,
            "name": "Title",
            "position": 1,
            "values": [
                "Black"
            ]
            }
        ],
        "images": [],
        "image": null
        }
    ]
}
STRING;
        return json_decode($items, true);
    }
    
    public function formatProduct(array $items) {
        $formatedItems = [];
        foreach ($items['products'] as $item) {
            $variations = [];
            foreach ($item['variants'] as $variation) {
                $price = [];
                foreach ($variation['presentment_prices'] as $presentment_price) {
                    $price[] = [
                        'currency' => $presentment_price['price']['currency_code'],
                        'amount' => $presentment_price['price']['amount'],
                    ];
                }
                $size = $colour = [];
                foreach($item['options'] as $option) {
                    switch($option['name']) {
                        case 'Size':
                            $size[] = $option['values'];
                            break;
                        case 'Color':
                            $colour[] = $option['values'];
                            break;
                    }
                }
                $variations[] = [
                    'size' => $size,
                    'colour' => $colour,
                    'quantity' => $variation['inventory_quantity'],
                    'price' => $price,
                    'weight' => "{$variation['weight']} {$variation['weight_unit']}",
                ];
            }
            $formatedItems[] = [
                'id' => $item['id'],
                'name' => $item['title'],
                'variations' => $variations,
            ];
        }
        return $formatedItems;
    }
}