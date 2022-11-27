<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $names = ["Miss Dior", "Coco Mademoiselle", "Alien", "Good Girl", "Sauvage", "Bleu de Chanel"];
    private $images = ["product1", "product2", "product3", "product4", "product5", "product6"];
    private $desc = ["Discover the NEW Miss Dior Eau de Parfum. A breath of love and optimism. Natalie Portman calls out to wake up to the beauty of the world and always… To love.",
                    "The essence of a bold and free woman. A feminine ambery fragrance with a strong personality and a surprising freshness.",
                    "Alien is a talisman capable of revealing the light and creative force of each woman. The fragrance bottle is like a gem, concealing the secret of Alien.",
                    "GOOD GIRL is inspired by Carolina Herrera's unique version of the duality of the modern woman: audacious and sexy, elegant and enigmatic, good and bad.",
                    "Sauvage is an act of creation inspired by wide-open spaces. A composition signed with a raw freshness, between power and nobility.",
                    "An ode to masculine freedom expressed in an aromatic-woody fragrance with a captivating trail. A timeless scent housed in a bottle of deep and mysterious blue."];
    private $brandIds = [4, 1, 2, 4, 6, 2];
    private $genderIds = [2, 2, 1, 1, 1, 1];
    public function run()
    {
        for($i = 0; $i<count($this->names); $i++){
            \DB::table("products")->insert([
                "name" => $this->names[$i],
                "image" => $this->images[$i]."png",
                "description" => $this->desc[$i],
                "brandId" => $this->brandIds[$i],
                "genderId" => $this->genderIds[$i]
            ]);
        }
    }
}
