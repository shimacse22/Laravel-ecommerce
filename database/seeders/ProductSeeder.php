<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // for ($i = 1; $i <= 50; $i++) { // Create 50 products
        //     $productId = DB::table('products')->insertGetId([
        //         'title' => 'Product ' . $i,
        //         'slug' => Str::slug('Product ' . $i),
        //         'description' => 'This is a description for Product ' . $i,
        //         'short_description' => 'Short description for Product ' . $i,
        //         'shipping_returns' => 'Shipping and returns policy for Product ' . $i,
        //         'related_products' => json_encode([]), // JSON array for related products
        //         'price' => rand(100, 1000),
        //         'compare_price' => rand(1100, 2000),
        //         'category_id' => rand(147, 149),
        //         'subcategory_id' => rand(34, 36),
        //         'brand_id' => rand(12, 14),
        //         'sku' => 'SKU-' . strtoupper(Str::random(5)),
        //         'barcode' => strtoupper(Str::random(10)),
        //         'track_qty' => ['Yes', 'No'][array_rand(['yes', 'no'])], // Random Yes or No
        //         'qty' => rand(10, 100),
        //         'status' => true,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);

        //     // Add product images for each product
        //     for ($j = 1; $j <= rand(1, 5); $j++) { // Each product can have 1-5 images
        //         DB::table('product_images')->insert([
        //             'product_id' => $productId,
        //             'image' => 'https://via.placeholder.com/600x400?text=Product+' . $i . '+Image+' . $j,
        //             'is_primary' => $j === 1, // First image is the primary image
        //             'created_at' => now(),
        //             'updated_at' => now(),
        //         ]);
        //     }
        // }

        $products = Product::all(); // Get all products

        foreach ($products as $product) {
            $product->update([
                'description' => "Experience Superior Quality & Performance<br><br>
                Discover the perfect blend of innovation and craftsmanship with our {$product->name}. Designed for durability and efficiency, this product meets the highest industry standards, ensuring a seamless user experience.<br><br>
                🌟 Key Features:<br>
                ✔ Premium Quality Materials – Made from high-grade materials for longevity.<br>
                ✔ User-Friendly Design – Intuitive interface for hassle-free operation.<br>
                ✔ Advanced Technology – Equipped with the latest technology to enhance performance.<br>
                ✔ Eco-Friendly & Sustainable – Designed with sustainability in mind.<br>
                ✔ Versatile Usage – Ideal for home, office, and personal use.<br><br>
                Whether you're looking for performance, reliability, or style, the {$product->name} is the perfect choice. Upgrade your lifestyle today!",
        
                'shipping_returns' => "🚚 Shipping & Return Policy<br><br>
                We strive to provide a smooth shopping experience and ensure your satisfaction with every purchase.<br><br>
                📦 Shipping Policy:<br>
                - Processing Time: Orders are processed within 1-2 business days after payment confirmation.<br>
                - Shipping Time: Delivery typically takes 3-7 business days.<br>
                - Tracking Information: A tracking number will be provided once shipped.<br>
                - International Shipping: Available for selected locations.<br><br>
                🔄 Return & Exchange Policy:<br>
                - Return Window: Items can be returned within 7 days of delivery.<br>
                - Eligibility: Items must be unused, undamaged, and in original packaging.<br>
                - Return Process:<br>
                  1️⃣ Contact our customer support.<br>
                  2️⃣ Provide your order details.<br>
                  3️⃣ Ship the item back.<br>
                - Refund Processing: Refunds take 5-7 business days after receiving the item.<br>
                - Exchange Option: If you received a defective product, we offer a free replacement.<br><br>
                ⚠️ Non-Returnable Items:<br>
                - Items damaged due to misuse.<br>
                - Personalized or custom-made products.<br>
                - Digital products or software downloads.<br><br>
                For more details, contact our support."
            ]);
        }
   
    }
}
