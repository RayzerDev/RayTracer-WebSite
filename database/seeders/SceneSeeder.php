<?php

namespace Database\Seeders;

use App\Models\Scene;
use App\Traits\ImageStoreInStorage;
use Illuminate\Database\Seeder;

class SceneSeeder extends Seeder
{
    use ImageStoreInStorage;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $scenesFile = base_path('datas/scenes/listeScenes.dat');
        $nomScenes = file($scenesFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($nomScenes as $nomScene){
            $formatScene = file_get_contents(base_path('datas/scenes/formats/' . $nomScene . '.txt'));
            $imageScene = base_path('datas/scenes/images/' . $nomScene . '.png');
            $fileExtension = pathinfo($imageScene, PATHINFO_EXTENSION);

            $linkImage = $this->saveImageSceneSeeder($fileExtension,
                file_get_contents(
                    base_path('datas/scenes/images/' . $nomScene . '.png')
                ));
            Scene::factory()->create([
             'nom' => $nomScene,
             'format' => $formatScene,
             'image' => $linkImage,
             'vignetteImage' => $linkImage,
         ]);
        }
    }
}
