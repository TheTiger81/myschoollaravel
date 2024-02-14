<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ImmaginiTableSeeder extends Seeder
{
    public function run()
    {
        $imagesPath = public_path('images'); // Percorso alla cartella delle immagini
        $files = File::allFiles($imagesPath);

        foreach ($files as $file) {
            $filePath = '/images/' . $file->getFilename(); // Percorso relativo da salvare nel DB

            DB::table('immagini')->insert([
                'percorso' => $filePath,
                'titolo' => $file->getFilename(), // Assumi che il titolo sia il nome del file
                // 'descrizione' => 'Descrizione opzionale', // Se vuoi inserire una descrizione
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

