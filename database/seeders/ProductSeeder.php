<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 1; $i <= 50; $i++) { // Create 50 products
            $productId = DB::table('products')->insertGetId([
                'title' => 'Product ' . $i,
                'slug' => Str::slug('Product ' . $i),
                'description' => 'This is a description for Product ' . $i,
                'short_description' => 'Short description for Product ' . $i,
                'shipping_returns' => 'Shipping and returns policy for Product ' . $i,
                'related_products' => json_encode([]), // JSON array for related products
                'price' => rand(100, 1000),
                'compare_price' => rand(1100, 2000),
                'category_id' => rand(147, 149),
                'subcategory_id' => rand(34, 36),
                'brand_id' => rand(12, 14),
                'sku' => 'SKU-' . strtoupper(Str::random(5)),
                'barcode' => strtoupper(Str::random(10)),
                'track_qty' => ['Yes', 'No'][array_rand(['yes', 'no'])], // Random Yes or No
                'qty' => rand(10, 100),
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Add product images for each product
            for ($j = 1; $j <= rand(1, 5); $j++) { // Each product can have 1-5 images
                DB::table('product_images')->insert([
                    'product_id' => $productId,
                    'image' => 'https://via.placeholder.com/600x400?text=Product+' . $i . '+Image+' . $j,
                    'is_primary' => $j === 1, // First image is the primary image
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
