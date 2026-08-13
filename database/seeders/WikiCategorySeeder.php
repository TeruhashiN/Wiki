<?php

namespace Database\Seeders;

use App\Models\WikiCategory;
use Illuminate\Database\Seeder;

class WikiCategorySeeder extends Seeder
{
    /**
     * Seed the wiki_categories table with sample categories.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Items',
                'slug' => 'items',
                'description' => 'General items, consumables, and quest-related objects.',
                'icon' => '📦',
                'sort_order' => 1,
            ],
            [
                'name' => 'Seeds',
                'slug' => 'seeds',
                'description' => 'Plantable seeds used for farming and gardening.',
                'icon' => '🌱',
                'sort_order' => 2,
            ],
            [
                'name' => 'Blocks',
                'slug' => 'blocks',
                'description' => 'Building blocks and terrain materials.',
                'icon' => '🧱',
                'sort_order' => 3,
            ],
            [
                'name' => 'Tools',
                'slug' => 'tools',
                'description' => 'Tools and equipment for gathering and crafting.',
                'icon' => '🛠️',
                'sort_order' => 4,
            ],
            [
                'name' => 'Armor',
                'slug' => 'armor',
                'description' => 'Protective gear and defensive equipment.',
                'icon' => '🛡️',
                'sort_order' => 5,
            ],
            [
                'name' => 'Weapons',
                'slug' => 'weapons',
                'description' => 'Melee and ranged weapons for combat.',
                'icon' => '⚔️',
                'sort_order' => 6,
            ],
            [
                'name' => 'Food',
                'slug' => 'food',
                'description' => 'Edible items that restore health or provide buffs.',
                'icon' => '🍎',
                'sort_order' => 7,
            ],
            [
                'name' => 'Materials',
                'slug' => 'materials',
                'description' => 'Raw materials used in crafting and building.',
                'icon' => '⛏️',
                'sort_order' => 8,
            ],
        ];

        foreach ($categories as $category) {
            WikiCategory::updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
