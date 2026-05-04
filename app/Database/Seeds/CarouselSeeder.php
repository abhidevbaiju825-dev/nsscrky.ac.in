<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\CarouselModel;

class CarouselSeeder extends Seeder
{
    public function run()
    {
        $model = new CarouselModel();

        // Check if already seeded
        if ($model->countAll() > 0) {
            return;
        }

        $data = [
            [
                'template_type' => 'hero',
                'slide_eyebrow' => 'Nair Service Society · Affiliated to MG University',
                'slide_title' => 'Shaping Minds,<br/><em>Building Futures</em><br/>Since 1995',
                'slide_description' => 'A premier institution of higher education in Kerala\'s High Ranges, offering world-class undergraduate programmes designed for a rapidly evolving professional landscape.',
                'bg_image_class' => 's1-bg',
                'primary_cta_text' => 'Explore Our College',
                'primary_cta_link' => 'Home/about',
                'secondary_cta_text' => 'View Programmes',
                'secondary_cta_link' => 'Home/programs',
                'extra_data' => [
                    'stats' => [
                        [
                            'label_top' => 'Established',
                            'number' => '1995',
                            'label_bottom' => '30 Years of Excellence'
                        ],
                        [
                            'label_top' => 'Programmes Offered',
                            'number' => '05',
                            'label_bottom' => 'UG Degree Courses'
                        ]
                    ],
                    'affiliation_top' => 'Affiliated To',
                    'affiliation_bottom' => "Mahatma Gandhi<br/>University, Kottayam"
                ],
                'slide_order' => 1,
                'is_active' => 1
            ],
            [
                'template_type' => 'ranklist',
                'slide_eyebrow' => 'Hall of Fame · 2024 Results',
                'slide_title' => 'University<br/><em>Rank Holders</em><br/>2024–25',
                'slide_description' => 'Our students have consistently brought pride to NSS College Rajakumari with outstanding performances at Mahatma Gandhi University examinations.',
                'bg_image_class' => 's2-bg',
                'primary_cta_text' => 'View Achievers',
                'primary_cta_link' => 'Home/university_toppers',
                'secondary_cta_text' => '',
                'secondary_cta_link' => '',
                'extra_data' => [
                    'dynamic_students' => true // Fetches dynamically from DB in view if true
                ],
                'slide_order' => 2,
                'is_active' => 1
            ],
            [
                'template_type' => 'admissions',
                'slide_eyebrow' => 'Admissions 2025–26 · Applications Invited',
                'slide_title' => 'Your Academic<br/><em>Journey</em> Begins<br/>in the Highlands',
                'slide_description' => 'Situated on a picturesque hilltop near Kulapparachal, NSS College Rajakumari invites students to join five distinguished undergraduate programmes for the academic year 2025–26.',
                'bg_image_class' => 's3-bg',
                'primary_cta_text' => 'View Programmes',
                'primary_cta_link' => 'Home/programs',
                'secondary_cta_text' => 'Contact Admissions',
                'secondary_cta_link' => 'Home/contact',
                'extra_data' => [
                    'tags' => ['BBA', 'BCA', 'B.Sc. Electronics', 'B.Com Model II', 'B.Com CA']
                ],
                'slide_order' => 3,
                'is_active' => 1
            ]
        ];

        foreach ($data as $slide) {
            $model->insert($slide);
        }
    }
}
