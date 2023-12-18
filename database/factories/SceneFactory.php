<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\File;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Scene>
 */
class SceneFactory extends Factory
{

    protected $scene;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $scenesFile = storage_path('../datas/listeScenes.dat');
        $nomScene = file($scenesFile);
        $descriptionScene = file('../datas/'.$nomScene.'.txt');

        return [
            'nom' => fake()->$nomScene,
            'description' => fake()->text,
            'lienVignetteImage' => fake()->url,
            'lienExecutable' => fake()->url,
            'dateAjout' => now(),
            'descriptionScene' => $descriptionScene,
            'lienImage' => fake()->url,
            'equipe' => 13
        ];
    }
}
