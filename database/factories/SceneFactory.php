<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Scene>
 */
class SceneFactory extends Factory
{

    protected int $index = 0;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $scenesFile = base_path('datas/listeScenes.dat');
        $nomScene = file($scenesFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $descriptionScene = file_get_contents(base_path('datas/' . $nomScene[$this->index]));
        $this->index++;


        return [
            'nomScene' => $nomScene[$this->index-1],
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
