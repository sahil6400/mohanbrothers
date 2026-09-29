<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Mohan Brothers — Ambross India | Laboratory Equipment & Educational Models',
            'meta_description' => 'Precision engineering laboratory equipment, fluid mechanics, heat transfer, thermodynamics, and automobile lab systems by Ambross India / Mohan Brothers.',
            
            'labs' => [
                [
                    'slug' => 'theory-of-machine-lab',
                    'num' => '01',
                    'title' => "Theory of\nMachine Lab",
                    'desc' => 'Kinematics, dynamics, gear trains, cams and followers — apparatus that makes mechanical theory tangible.',
                    'img' => 'https://images.unsplash.com/photo-1581093803931-46e730e7622e?w=900&h=700&fit=crop&auto=format',
                ],
                [
                    'slug' => 'fluid-mechanics-lab',
                    'num' => '02',
                    'title' => "Fluid\nMechanics Lab",
                    'desc' => "Venturimeter, Bernoulli's apparatus, Reynolds experiment — precision flow measurement equipment.",
                    'img' => 'https://images.unsplash.com/photo-1602052577122-f73b9710adba?w=900&h=700&fit=crop&auto=format',
                ],
                [
                    'slug' => 'heat-transfer-lab',
                    'num' => '03',
                    'title' => "Heat\nTransfer Lab",
                    'desc' => "Fourier's law, conduction, convection and radiation apparatus for systematic thermal analysis.",
                    'img' => 'https://images.unsplash.com/photo-1717386255773-1e3037c81788?w=900&h=700&fit=crop&auto=format',
                ],
                [
                    'slug' => 'theory-of-machine-lab',
                    'num' => '04',
                    'title' => "Thermodynamics\nLab",
                    'desc' => 'Steam turbine models, refrigeration test rigs and calorimeter apparatus for thermal engineering.',
                    'img' => 'https://images.unsplash.com/photo-1716191299980-a6e8827ba10b?w=900&h=700&fit=crop&auto=format',
                ],
                [
                    'slug' => 'theory-of-machine-lab',
                    'num' => '05',
                    'title' => "Structural\nMechanics Lab",
                    'desc' => 'Beam deflection, column buckling, universal testing machines for structural performance studies.',
                    'img' => 'https://images.unsplash.com/photo-1532186773960-85649e5cb70b?w=900&h=700&fit=crop&auto=format',
                ],
                [
                    'slug' => 'theory-of-machine-lab',
                    'num' => '06',
                    'title' => "Engineering\nModels & Charts",
                    'desc' => 'High-precision anatomical and engineering models, wall charts and demonstration apparatus.',
                    'img' => 'https://images.unsplash.com/photo-1581093577421-f561a654a353?w=900&h=700&fit=crop&auto=format',
                ],
                [
                    'slug' => 'theory-of-machine-lab',
                    'num' => '07',
                    'title' => "Automobile &\nI.C. Engine Lab",
                    'desc' => 'Cut-section models, engine test rigs, fuel system apparatus for automotive engineering study.',
                    'img' => 'https://images.unsplash.com/photo-1717386255773-a456c611dc4e?w=900&h=700&fit=crop&auto=format',
                ],
                [
                    'slug' => 'refrigeration-lab',
                    'num' => '08',
                    'title' => "Refrigeration & Air\nConditioning Lab",
                    'desc' => 'Refrigeration systems refer to the different physical components that make up the total refrigeration unit. The different stages in the refrigeration cycle are undergone in these physical systems.',
                    'img' => base_url('assets/images/refrigeration-lab.jpg'),
                ],
            ],

            'products' => [
                ['name' => "Laboratory\nEquipment", 'img' => 'https://images.unsplash.com/photo-1602052577122-f73b9710adba?w=600&h=500&fit=crop&auto=format'],
                ['name' => "Engineering\nModels", 'img' => 'https://images.unsplash.com/photo-1581093577421-f561a654a353?w=600&h=500&fit=crop&auto=format'],
                ['name' => "Demonstration\nApparatus", 'img' => 'https://images.unsplash.com/photo-1582273953509-3972288b909e?w=600&h=500&fit=crop&auto=format'],
                ['name' => "Training\nEquipment", 'img' => 'https://images.unsplash.com/photo-1716191299980-a6e8827ba10b?w=600&h=500&fit=crop&auto=format'],
                ['name' => 'Wall Charts', 'img' => 'https://images.unsplash.com/photo-1532186773960-85649e5cb70b?w=600&h=500&fit=crop&auto=format'],
                ['name' => "Automobile\nLab Equipment", 'img' => 'https://images.unsplash.com/photo-1717386255773-a456c611dc4e?w=600&h=500&fit=crop&auto=format'],
            ],

            'applications' => [
                ['title' => 'Mechanical Engineering', 'img' => 'https://images.unsplash.com/photo-1581093803931-46e730e7622e?w=700&h=500&fit=crop&auto=format'],
                ['title' => 'Automobile Engineering', 'img' => 'https://images.unsplash.com/photo-1717386255773-a456c611dc4e?w=700&h=500&fit=crop&auto=format'],
                ['title' => 'Civil Engineering', 'img' => 'https://images.unsplash.com/photo-1532186773960-85649e5cb70b?w=700&h=500&fit=crop&auto=format'],
                ['title' => 'Thermal Engineering', 'img' => 'https://images.unsplash.com/photo-1717386255773-1e3037c81788?w=700&h=500&fit=crop&auto=format'],
                ['title' => 'Fluid Mechanics', 'img' => 'https://images.unsplash.com/photo-1602052577122-f73b9710adba?w=700&h=500&fit=crop&auto=format'],
                ['title' => 'Engineering Education', 'img' => 'https://images.unsplash.com/photo-1581093577421-f561a654a353?w=700&h=500&fit=crop&auto=format'],
            ],

            'why_reasons' => [
                ['num' => '01', 'title' => 'Engineering Precision', 'desc' => 'Every instrument calibrated to exact tolerance, built for repeatable experimental outcomes.'],
                ['num' => '02', 'title' => 'Educational Focus', 'desc' => 'Designed in close collaboration with academics to align with university curricula across India.'],
                ['num' => '03', 'title' => 'Robust Construction', 'desc' => 'Industrial-grade materials ensuring decades of reliable use in high-frequency lab environments.'],
                ['num' => '04', 'title' => 'Practical Learning', 'desc' => 'Theory made visible — apparatus that brings textbook equations to life through hands-on experiment.'],
                ['num' => '05', 'title' => 'Institutional Support', 'desc' => 'Dedicated support teams for installation, calibration, maintenance and faculty training programmes.'],
            ],

            'categories' => [
                'Theory of Machine Lab',
                'Fluid Mechanics Lab',
                'Heat Transfer Lab',
                'Thermodynamics Lab',
                'Structural Mechanics Lab',
                'Engineering Apparatus & Models',
                'Automobile & I.C. Engine Lab',
            ],

            'countries' => [
                'India', 'United States', 'United Kingdom', 'UAE', 'Saudi Arabia',
                'Singapore', 'Malaysia', 'Bangladesh', 'Nepal', 'Sri Lanka', 'Other',
            ],
        ];

        return view('home/index', $data);
    }
}
