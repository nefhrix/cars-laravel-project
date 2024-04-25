<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    protected $model = Car::class;

    public function definition()
    {
        return [
            'make' => $this->faker->randomElement([
                "Ford",
                "Honda",
                "Chevrolet",
                "Porsche",
                "Ferrari",
                "Lamborghini",
                "McLaren",
                "Aston Martin",
                "Bugatti",
                "Koenigsegg",
                "Lotus",
                "Maserati",
                "Alfa Romeo",
                "Pagani",
                "Bentley",
                "Ford",
                "Porsche",
                "Ferrari",
                "Lamborghini",
                "Koenigsegg",
                "Pagani"
            ]),
            'model' => $this->faker->randomElement([
                "GT",
                "NSX",
                "Corvette",
                " 911",
                "488",
                "Huracan",
                " 720S",
                " Valkyrie",
                " Chiron",
                " Jesko",
                " Evija",
                " MC20",
                " Romeo 4C",
                " Huayra",
                " Continental GT",
                " GT",
                " Taycan",
                " Roma",
                " Aventador",
                " Huayra"
            ]),
            'year' => $this->faker->numberBetween(2009, 2023),
            'color' => $this->faker->safeColorName,
            'car_image' => $this->faker->randomElement(["https://upload.wikimedia.org/wikipedia/commons/thumb/4/42/Pagani_Zonda_C12_%27chassis_001%27_Genf_2019_1Y7A5539.jpg/420px-Pagani_Zonda_C12_%27chassis_001%27_Genf_2019_1Y7A5539.jpg","https://media.evo.co.uk/image/private/s--106N062Y--/f_auto,t_content-image-full-desktop@1/v1669392371/evo/2022/11/Pagani%20Zonda%20F%20review%20main.jpg","https://s3.amazonaws.com/images.gearjunkie.com/uploads/2022/08/LotusEvoraGT-2-2048x1366-1.jpg","https://hips.hearstapps.com/hmg-prod/images/2023-maserati-mc20-cielo-spyder-28-1666275747.jpg?crop=0.542xw:0.406xh;0.152xw,0.485xh&resize=1200:*","https://cdn.motor1.com/images/mgl/eoblp6/s3/mclaren-750s-coupe-front-3-4.jpg"]),
            'emissions'=>$this->faker->randomElement(["A","B","C","D","E","F"])
           // 'manufacturer_id' => \App\Models\Manufacturer::factory(),

        ];
    }
}