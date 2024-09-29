<?php

namespace Database\Seeders;

use App\Models\Food;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
   {
        $FastFood=[
            
               [
                    "name"=> "Cheeseburger",
                    "ingredients"=> "Beef patty, Cheese, Lettuce, Tomato, Onion, Pickles, Ketchup, Mustard",
                    "image"=> "cheeseburger.jpg",
                    "category_id"=> 2,
                    "price"=> 5.99
               ],
               [
                    "name"=> "Veggie Burger",
                    "ingredients"=> "Veggie patty, Lettuce, Tomato, Onion, Pickles, Avocado, Ketchup, Mustard",
                    "image"=> "veggie_burger.jpg",
                    "category_id"=> 2,
                    "price"=> 6.49
               ],
               [
                    "name"=> "Chicken Nuggets",
                    "ingredients"=> "Chicken breast, Breadcrumbs, Spices, Dipping Sauce",
                    "image"=> "chicken_nuggets.jpg",
                    "category_id"=> 3,
                    "price"=> 4.99
               ],
               [
                    "name"=> "French Fries",
                    "ingredients"=> "Potatoes, Salt, Vegetable Oil",
                    "image"=> "french_fries.jpg",
                    "category_id"=> 3,
                    "price"=> 2.99
               ],
               [
                    "name"=> "Pepperoni Pizza",
                    "ingredients"=> "Pizza dough, Tomato sauce, Mozzarella cheese, Pepperoni slices",
                    "image"=> "pepperoni_pizza.jpg",
                    "category_id"=> 1,
                    "price"=> 8.99
               ],
               [
                    "name"=> "Caesar Salad",
                    "ingredients"=> "Romaine lettuce, Caesar dressing, Croutons, Parmesan cheese, Grilled chicken",
                    "image"=> "caesar_salad.jpg",
                    "category_id"=> 4,
                    "price"=> 7.49
               ],
               [
                    "name"=> "Chocolate Milkshake",
                    "ingredients"=> "Milk, Chocolate syrup, Vanilla ice cream, Whipped cream",
                    "image"=> "chocolate_milkshake.jpg",
                    "category_id"=>6,
                    "price"=> 3.99
               ],
               [
                    "name"=> "Chicken Sandwich",
                    "ingredients"=> "Chicken breast, Lettuce, Tomato, Mayo, Brioche bun",
                    "image"=> "chicken_sandwich.jpg",
                    "category_id"=> 7,
                    "price"=> 5.49
               ],
               [
                    "name"=> "Onion Rings",
                    "ingredients"=> "Onions, Batter, Vegetable Oil, Spices",
                    "image"=> "onion_rings.jpg",
                    "category_id"=> 3,
                    "price"=> 3.49
               ],
            
            
        ];
        Food::insert($FastFood);
    }
}
