<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * Test for Shopify shop ID 1
     *
     * @return void
     */
    public function test_shopify()
    {
        $response = $this->get('/stores/1/products');

        // check that the response contains a given ID
        $response->assertStatus(200)
            ->assertJson([['id' => 632910392]]);
    }

    /**
     * Test for WooCommerce shop ID 2
     *
     * @return void
     */
    public function test_woocommerce()
    {
        $response = $this->get('/stores/2/products');

        // check that the response contains a given ID
        $response->assertStatus(200)
            ->assertJson([['id' => 799]]);
    }
}
