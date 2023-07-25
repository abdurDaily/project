<?php

namespace Database\Seeders;

use App\Models\BlogSubCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogIndexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogs = new BlogSubCategory();
        $blogs->title = 'IIUC Programming Contest Challenges Developers Worldwide';
        $blogs->slug = 'Programming';
        $blogs->author = 'Abdur Rahman';
        $blogs->image = env("APP_URL").'/custom_images/iiuc-logo.png';
        $blogs->blog_categorie_id  = 1;
        $blogs->video  = "https://www.youtube.com/watch?v=SyPqRvXY0R4";
        $blogs->highlight_text  = "Lorem ipsum dolor sit amet, conse ctetur adipi sicing elit, sed do eiusm od tempor incidi dunt ut labore et dolore magna aliqua. Ut enim fugiat nulla pariaatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit";
        $blogs->blog_details_one = "I apologize, but as an AI language model, my responses are based on pre-existing knowledge up until September 2021. Therefore, I don't have access to real-time news or specific details about programming contests that have taken place recently. It's always a good idea to check reliable news sources or specialized programming contest platforms for the latest information on programming contests, such as Codeforces, Topcoder, AtCoder, or HackerRank. These platforms often provide updates on upcoming contests, results, and other relevant details.";
        $blogs->blog_details_two = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.";
        $blogs->save();
    }
}