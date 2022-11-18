<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Project;
use App\Models\Rating;

class ProjectRatingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    # Goal: Add ratings to a project
    $project = Project::where('slug', '=', 'love-stories-from-the-national-portrait-gallery-london')->first();

    $ratings = [
         'existing_donor',
         'donor_area',
         'foundation_timing'/*,
         'strategic_plan',
         'campus_plan',
         'campaign_priority',
         'program_impact',
         'legal_obligation',
         'fund_obligation',
         'completes_cert',
         'support',
         'grant',
         'historic_credit',
         'visitation_revenue',
         'audience_expansion',
         'special_ticket',
         'other_potential',
         'deai_staff',
         'interpretation',
         'includes_race',
         'includes_gender',
         'includes_sexuality',
         'includes_physical',
         'includes_psychiatric',
         'primary_representation',
         'secondary_representation',
         'diverse_audience',
         'diverse_support',
         'diverse_vendor',
         'curatorial_staff',
         'tech',
         'community',
         'academic',
         'permanent_collection',
         'new_donors',
         'visitor_experience',
         'collection_strength',
         'storage_turnover',
         'conservation_opportunity',
         'interpretive_update',
         'enhance_display',
         'steward',
         'code_law_regulation',
         'art_environment',
         'cooling_heating_art',
         'cooling_heating_nonart',
         'service_improvement',
         'efficient_process',
         'public_aesthetics',
         'nonpublic_aesthetics',
         'education_staff',
         'visitation',
         'program_enhancement',
         'curricular_connection',
         'programming_space',
         'augmentation',
         'families',
         'accessible',
         'way_finding',
         'view_variety',
         'existing_community',
         'new_community',
         'education_market',
         'deai_initiatives',
         'storage_capacity',
         'collections_access',
         'site_storage',
         'swing_space',
         'add_storage',
         'positive_impact',
         'inventory',
         'av_staff',
         'current_collection',
         'loan_embargo',
         'acquisitions_embargo',
         'resource_conflict'*/
    ];

    foreach ($ratings as $handle) {
         $rating = Rating::where('handle', '=', $handle)->first();
         $project->ratings()->save($project, ['grade' => rand(1,5)]);
    }

    }
}