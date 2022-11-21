<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use App\Models\Department; # Make our Project Model accessible
use App\Models\Project; # Make our Project Model accessible
use Faker\Factory; # We’ll use this library to generate random/fake data

class ProjectsTableSeeder extends Seeder
{
    private $faker;

    /**
     * This run method is the first method you should have in all your Seeder class files
     * This method will be invoked when we invoke this seeder
     * In this method you should put code that will cause data to be entered into your tables
     * (in this case, that's the `books` table)
     * 
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                # https://fakerphp.github.io
                $this->faker = Factory::create();


                # Three different examples of how to add books
                //$this->addOneBook();
                $this->addAllProjectsFromProjectsDotJsonFile();
                //$this->addRandomlyGeneratedBooksUsingFaker();
    }
        /**
     *
     */
    private function addOneProject()
    {
        //fix the variables
        $project = new project();
        $project->created_at = $this->faker->dateTime();
        $project->updated_at = $project->created_at;
        $project->slug = 'the-martian';
        $project->title = 'The Martian';
        $project->author = 'Anthony Weir';
        $project->published_year = 2011;
        $project->cover_url = 'https://hes-projectmark.s3.amazonaws.com/the-martian.jpg';
        $project->info_url = 'https://en.wikipedia.org/wiki/The_Martian_(Weir_novel)';
        $project->purchase_url = 'https://www.barnesandnoble.com/w/the-martian-andy-weir/1114993828';
        $project->description = 'The Martian is a 2011 science fiction novel written by Andy Weir. It was his debut novel under his own name. It was originally self-published in 2011; Crown Publishing purchased the rights and re-released it in 2014. The story follows an American astronaut, Mark Watney, as he becomes stranded alone on Mars in the year 2035 and must improvise in order to survive.';
        $project->save();
    }

    /**
     *
     */
    private function addAllProjectsFromProjectsDotJsonFile()
    {
        $projectData = file_get_contents(database_path('projects.json'));
        $projects = json_decode($projectData, true);

        foreach ($projects as $slug => $projectData) {

            # Extract just the last name from the book data...
            # F. Scott Fitzgerald => ['F.', 'Scott', 'Fitzgerald'] => 'Fitzgerald'
            $name = $projectData['department'];
            # Find that author in the authors table
            $department_id = Department::where('name', '=', $name)->pluck('id')->first();

            $project = new Project();
            $project->created_at = $this->faker->dateTimeThisMonth();
            $project->updated_at = $project->created_at;
            $project->slug = $slug;
            $project->title = $projectData['title'];
            $project->staff_first = $projectData['staff_first'];
            $project->staff_last = $projectData['staff_last'];
            $project->department_id = $department_id;
            $project->location = $projectData['location'];
            $project->additional_staff = $projectData['additional_staff'];
            $project->estimated_cost = $projectData['estimated_cost'];
            $project->additional_equip = $projectData['additional_equip'];
            $project->additional_services = $projectData['additional_services'];
            $project->summary = $projectData['summary'];
            $project->has_dependent = $projectData['has_dependent'];
            $project->depends_on = $projectData['depends_on'];
            $project->estimated_duration = $projectData['estimated_duration'];
            $project->start_date = $projectData['start_date'];
            $project->end_date = $projectData['start_date'];


            $project->save();
        }
    }

    /**
     *
     */
    private function addRandomlyGeneratedprojectsUsingFaker()
    {
        for ($i = 0; $i < 100; $i++) {
            $project = new project();
            
            $title = $this->faker->words(rand(3, 6), true);
            $project->created_at =  $this->faker->dateTimeThisMonth();
            $project->updated_at =  $project->created_at;
            $project->title = Str::title($title);
            $project->slug = Str::slug($title, '-');
            $project->author = $this->faker->firstName . ' ' . $this->faker->lastName;
            $project->published_year = $this->faker->year;
            $project->cover_url = 'https://hes-projectmark.s3.amazonaws.com/cover-placeholder.png';
            $project->info_url = 'https://en.wikipedia.org/wiki/' . $project->slug;
            $project->purchase_url = 'https://www.barnesandnoble.com/' . $project->slug;
            $project->description = $this->faker->paragraphs(1, true);

            $project->save();
        }
    }
}
