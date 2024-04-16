<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Category;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class PushCategoriesToProject1 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:push-categories-to-project1';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Push category data from Project 2 to Project 1 based on the specified time in the Project 2 category table.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Define the Project 1 API endpoint URL
        $project1Url = 'http://project1.test/api/categories';

        // Get the current time
        $currentTime = Carbon::now();

        // Categories from Project 2 where the 'time' field is less than or equal to the current time
        $categories = Category::where('time', '<=', $currentTime)->get();

        // Iterate through each category
        foreach ($categories as $category) {
            // Convert the 'time' field to a Carbon instance
            $time = Carbon::parse($category->time);

            // Send a POST request to Project 1 to push the category data
            $response = Http::post($project1Url, [
                'name' => $category->name,
                'time' => $time->toDateTimeString(),
            ]);
        }

        // Output a success message
        $this->info('Categories pushed to Project 1 successfully.');
    }
}
