<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;


class ProductFactory extends Factory
{

    public function definition(): array
    {
        $categoryIds = Category::pluck('id')->toArray();

        return [
            'name' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 1, 100),
            'description' => $this->faker->sentence, // hoặc dùng $this->faker->paragraph
            'created_at' => $this->faker->dateTime,
            'category_id' => $this->faker->randomElement($categoryIds), // Chọn một ID ngẫu nhiên từ các ID tồn tại
            'updated_at' => $this->faker->dateTime,
        ];
    }
}
