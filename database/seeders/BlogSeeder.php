<?php

namespace Database\Seeders;

use App\Helpers\ImageHelper\ImageHelper;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imageHelper = new ImageHelper();

        $blogs = [
            [
                'title' => 'Pentingnya Perencanaan yang Matang dalam Konstruksi',
                'thumbnail' => $imageHelper->createDummyImageWithTextSizeAndPosition(370, 240, 'center', 'center', 'random', 'large'),
                'content' => 'Perencanaan yang matang merupakan kunci kesuksesan dalam setiap proyek konstruksi. Dengan perencanaan yang baik, risiko kesalahan dapat diminimalkan dan efisiensi waktu serta biaya dapat dioptimalkan.',
                'slug' => 'pentingnya-perencanaan-dalam-konstruksi',
            ],
            [
                'title' => 'Teknologi Terkini dalam Industri Konstruksi',
                'thumbnail' => $imageHelper->createDummyImageWithTextSizeAndPosition(370, 240, 'center', 'center', 'random', 'large'),
                'content' => 'Industri konstruksi terus berkembang dengan adanya teknologi baru. Artikel ini akan membahas beberapa teknologi terkini yang sedang mempengaruhi cara kerja dalam industri konstruksi.',
                'slug' => 'teknologi-terkini-dalam-konstruksi',
            ],
            [
                'title' => 'Strategi Manajemen Risiko dalam Proyek Konstruksi',
                'thumbnail' => $imageHelper->createDummyImageWithTextSizeAndPosition(370, 240, 'center', 'center', 'random', 'large'),
                'content' => 'Manajemen risiko adalah hal yang penting dalam setiap proyek konstruksi. Dengan menerapkan strategi manajemen risiko yang tepat, kontraktor dapat mengurangi kemungkinan terjadinya masalah yang dapat mempengaruhi kelancaran proyek.',
                'slug' => 'manajemen-risiko-dalam-konstruksi',
            ],
            [
                'title' => 'Tren Desain Arsitektur Modern',
                'thumbnail' => $imageHelper->createDummyImageWithTextSizeAndPosition(370, 240, 'center', 'center', 'random', 'large'),
                'content' => 'Desain arsitektur terus mengalami perkembangan seiring berjalannya waktu. Artikel ini akan membahas beberapa tren desain arsitektur modern yang sedang populer saat ini.',
                'slug' => 'tren-desain-arsitektur-modern',
            ],
            [
                'title' => 'Mengoptimalkan Efisiensi Energi dalam Bangunan',
                'thumbnail' => $imageHelper->createDummyImageWithTextSizeAndPosition(370, 240, 'center', 'center', 'random', 'large'),
                'content' => 'Penting untuk mengoptimalkan efisiensi energi dalam bangunan agar dapat mengurangi dampak negatif terhadap lingkungan dan juga menghemat biaya energi. Artikel ini akan membahas beberapa cara untuk mengoptimalkan efisiensi energi dalam bangunan.',
                'slug' => 'mengoptimalkan-efisiensi-energi-dalam-bangunan',
            ],
        ];

        foreach ($blogs as $blog) {
            $newBlog = new Blog;
            $newBlog->title = $blog['title'];
            $newBlog->thumbnail = $blog['thumbnail']->store('assets/blog/thumbnails', 'public');
            $newBlog->content = $blog['content'];
            $newBlog->slug = $blog['slug'];
            $newBlog->save();

            $maxTags = BlogTag::count();
            $tags = BlogTag::inRandomOrder()->limit(rand(1, $maxTags))->get();
            $newBlog->tags()->attach($tags);

            $maxCategories = BlogCategory::count();
            $categories = BlogCategory::inRandomOrder()->limit(rand(1, $maxCategories))->get();
            $newBlog->categories()->attach($categories);
        }
    }
}
