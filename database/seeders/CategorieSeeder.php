<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categorie;
use App\Models\OutilAI;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create categories
        $chat = Categorie::create(['nom' => 'Chat', 'groupe' => 'Communication']);
        $image = Categorie::create(['nom' => 'Génération d\'images', 'groupe' => 'Créatif']);
        $code = Categorie::create(['nom' => 'Génération de code', 'groupe' => 'Développement']);
        $video = Categorie::create(['nom' => 'Vidéo IA', 'groupe' => 'Multimédia']);
        $audio = Categorie::create(['nom' => 'Audio IA', 'groupe' => 'Multimédia']);
        $traduction = Categorie::create(['nom' => 'Traduction', 'groupe' => 'Langue']);

        // Create sample tools
        OutilAI::create([
            'nom' => 'ChatGPT',
            'description' => 'Assistant conversationnel basé sur l\'IA de OpenAI',
            'site_url' => 'https://chat.openai.com',
            'categorie_id' => $chat->id,
        ]);

        OutilAI::create([
            'nom' => 'DALL-E',
            'description' => 'Génération d\'images à partir de texte',
            'site_url' => 'https://openai.com/dall-e-2',
            'categorie_id' => $image->id,
        ]);

        OutilAI::create([
            'nom' => 'GitHub Copilot',
            'description' => 'Complétion de code avec IA',
            'site_url' => 'https://github.com/features/copilot',
            'categorie_id' => $code->id,
        ]);

        OutilAI::create([
            'nom' => 'Runway',
            'description' => 'Édition vidéo et génération de contenu vidéo IA',
            'site_url' => 'https://runwayml.com',
            'categorie_id' => $video->id,
        ]);

        OutilAI::create([
            'nom' => 'AIVA',
            'description' => 'Création musicale avec intelligence artificielle',
            'site_url' => 'https://www.aiva.ai',
            'categorie_id' => $audio->id,
        ]);

        OutilAI::create([
            'nom' => 'DeepL',
            'description' => 'Traduction automatique avancée',
            'site_url' => 'https://www.deepl.com',
            'categorie_id' => $traduction->id,
        ]);
    }
}
