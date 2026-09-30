<?php

namespace App\Models;

class CategoryModel
{
    private array $categories = [
        'theory-of-machine-lab' => [
            'slug' => 'theory-of-machine-lab',
            'num' => '01',
            'title' => 'Theory of Machine Lab',
            'subtitle' => 'Kinematics, Dynamics, Balancing, Cams, Gyroscopic Precession & Vibration Analysis',
            'hero_img' => 'https://images.unsplash.com/photo-1581093803931-46e730e7622e?w=1600&h=800&fit=crop&auto=format',
            'desc' => 'Theory of Machine Lab deals with the study of relative motion between the various parts of a machine, and the forces acting upon them. The main objective of this laboratory is to impart practical knowledge on the design, kinematics, and dynamic analysis of mechanisms for specified machine motions. Ambros India manufactures and exports a comprehensive range of precision educational apparatus calibrated for university curricula across India and worldwide.',
            'learning_outcomes' => [
                'Analyze planar mechanisms, degrees of freedom, and kinematic inversions.',
                'Perform static and dynamic multi-plane balancing of rotating masses.',
                'Evaluate gyroscopic couple and stability in aircraft, ships, and automobile systems.',
                'Study centrifugal governors and sensitivity under varying load characteristics.',
                'Measure critical whirling speeds of shafts with different end-support configurations.',
                'Generate involute gear tooth profiles and examine interference and undercutting phenomena.'
            ],
            'featured_products' => [
                [
                    'code' => '1100',
                    'name' => 'Static & Dynamic Balancing Apparatus',
                    'img' => 'https://images.unsplash.com/photo-1581093803931-46e730e7622e?w=600&h=450&fit=crop&auto=format',
                    'desc' => 'Precision test bench with four unbalance planes, optical angular measurement, and dynamic counterweights for multi-plane balancing study.',
                    'specs' => 'Shaft dia: 15mm | Motor: Variable speed DC with controller | Unbalance masses: Brass calibrated'
                ],
                [
                    'code' => '1101',
                    'name' => 'Motorised Gyroscope Apparatus',
                    'img' => 'https://images.unsplash.com/photo-1581093577421-f561a654a353?w=600&h=450&fit=crop&auto=format',
                    'desc' => 'Heavy brass rotor coupled to variable speed motor mounted in double gimbal frame to verify gyroscopic couple relationship T = I.ω.ωp.',
                    'specs' => 'Rotor: Precision balanced brass | Speed: 0-3000 RPM | Counter weights: Calibrated stainless steel'
                ],
                [
                    'code' => '1102',
                    'name' => 'Motorised Governor Apparatus',
                    'img' => 'https://images.unsplash.com/photo-1602052577122-f73b9710adba?w=600&h=450&fit=crop&auto=format',
                    'desc' => 'Interchangeable test rig for Watt, Porter, Proell and Hartnell governors with speed sensors and sleeve displacement scale.',
                    'specs' => 'Governor heads: 4 interchangeable sets | Drive: Variable speed motor | Measurement: Digital RPM & Linear scale'
                ],
                [
                    'code' => '1103',
                    'name' => 'Whirling of Shaft Apparatus',
                    'img' => 'https://images.unsplash.com/photo-1716191299980-a6e8827ba10b?w=600&h=450&fit=crop&auto=format',
                    'desc' => 'Demonstrates primary and secondary nodes and critical speeds of continuous shafts under various end fixation conditions.',
                    'specs' => 'Shaft specimens: 3 dia sizes | Length: 1000mm | Fixation: Supported-Supported, Fixed-Supported, Fixed-Fixed'
                ],
                [
                    'code' => '1104',
                    'name' => 'Cam Analysis Apparatus',
                    'img' => 'https://images.unsplash.com/photo-1532186773960-85649e5cb70b?w=600&h=450&fit=crop&auto=format',
                    'desc' => 'Motorized cam and follower apparatus with dial indicator and digital sensor to plot cam profiles and study jump phenomena.',
                    'specs' => 'Cams: Circular arc, Tangent, Eccentric | Followers: Roller, Flat, Knife-edge | Spring rating: Variable'
                ],
                [
                    'code' => '1105',
                    'name' => 'Universal Vibration Lab (11 Experiments)',
                    'img' => 'https://images.unsplash.com/photo-1717386255773-1e3037c81788?w=600&h=450&fit=crop&auto=format',
                    'desc' => 'Comprehensive modular test frame covering free, forced, damped, undamped, torsional, and transverse vibrations.',
                    'specs' => 'Frame: Heavy-duty slotted frame | Exciter: Mechanical/Electrodynamic | Damping: Viscous fluid dashpot'
                ]
            ],
            'products_table' => [
                ['code' => '1100', 'name' => 'Static Dynamic Balancing Apparatus', 'category' => 'Balancing Systems'],
                ['code' => '1101', 'name' => 'Motorised Gyroscope Apparatus', 'category' => 'Gyroscopic Systems'],
                ['code' => '1102', 'name' => 'Motorised Governor Apparatus (Watt, Porter, Proell, Hartnell)', 'category' => 'Governor Systems'],
                ['code' => '1103', 'name' => 'Whirling Of Shaft Apparatus', 'category' => 'Dynamics & Vibration'],
                ['code' => '1104', 'name' => 'Cam Analysis Apparatus with Jump Phenomenon Study', 'category' => 'Mechanism Analysis'],
                ['code' => '1105', 'name' => 'Vibration Lab Test Rig (Complete 11 Experiments)', 'category' => 'Dynamics & Vibration'],
                ['code' => '1106', 'name' => 'Generation Of Involute Gear Tooth Profile Apparatus', 'category' => 'Gear & Mechanism'],
                ['code' => '1107', 'name' => 'Interference & Undercutting Gear Demonstration Model', 'category' => 'Gear & Mechanism'],
                ['code' => '1108', 'name' => 'Coriolis Component Of Acceleration Test Rig', 'category' => 'Kinematic Analysis'],
                ['code' => '1109', 'name' => 'Slip & Creep Measurement Apparatus', 'category' => 'Friction & Power Transmission'],
                ['code' => '1110', 'name' => 'Epicyclic Gear Train Holding Torque Apparatus', 'category' => 'Gear Trains'],
                ['code' => '1111', 'name' => 'Journal Bearing Pressure Distribution Apparatus', 'category' => 'Tribology & Bearings'],
                ['code' => '1112', 'name' => 'Dead Weight Pressure Gauge Tester', 'category' => 'Calibration & Measurement'],
                ['code' => '1113A', 'name' => 'Milling Tool Dynamometer (3-Component Strain Gauge)', 'category' => 'Cutting Force Measurement'],
                ['code' => '1113B', 'name' => 'Grinder Tool Dynamometer', 'category' => 'Cutting Force Measurement'],
                ['code' => '1113C', 'name' => 'Lathe Tool Dynamometer (2-Component / 3-Component)', 'category' => 'Cutting Force Measurement'],
                ['code' => '1113D', 'name' => 'Drilling Tool Dynamometer (Torque & Thrust)', 'category' => 'Cutting Force Measurement']
            ]
        ],

        'fluid-mechanics-lab' => [
            'slug' => 'fluid-mechanics-lab',
            'num' => '02',
            'title' => 'Fluid Mechanics Lab',
            'subtitle' => 'Hydraulics, Flow Measurement, Boundary Layer, Bernoulli, Reynolds & Turbomachinery',
            'hero_img' => 'https://images.unsplash.com/photo-1602052577122-f73b9710adba?w=1600&h=800&fit=crop&auto=format',
            'desc' => 'Fluid Mechanics Lab offers precision equipment to investigate fluid properties, hydrostatic pressure, conservation laws, pipe friction losses, boundary layer development, and hydraulic machines. Our flow channels and test benches are constructed with corrosion-resistant stainless steel and acrylic observation sections for maximum clarity and experimental accuracy.',
            'learning_outcomes' => [
                'Verify Bernoulli theorem along converging-diverging venturi channels.',
                'Determine discharge coefficient (Cd) for orifice, mouthpiece, and venturimeter.',
                'Measure major and minor losses in pipes, bends, valves, and sudden expansions.',
                'Visualize laminar, transitional, and turbulent flow regimes via Reynolds apparatus.',
                'Evaluate hydraulic efficiency of Pelton wheel, Francis turbine, and Centrifugal pumps.'
            ],
            'featured_products' => [
                [
                    'code' => '1201',
                    'name' => "Bernoulli's Theorem Verification Apparatus",
                    'img' => 'https://images.unsplash.com/photo-1602052577122-f73b9710adba?w=600&h=450&fit=crop&auto=format',
                    'desc' => 'Transparent acrylic test duct with piezometer tubes and pitot probe for direct static and total head measurement.',
                    'specs' => 'Channel: Clear perspex | Piezometers: 9 multi-tube manometer | Flow rate: Up to 40 LPM'
                ],
                [
                    'code' => '1202',
                    'name' => 'Venturimeter & Orifice Meter Test Rig',
                    'img' => 'https://images.unsplash.com/photo-1581093803931-46e730e7622e?w=600&h=450&fit=crop&auto=format',
                    'desc' => 'Closed-circuit hydraulic bench with interchangeable flow meters and differential mercury manometer.',
                    'specs' => 'Pipe size: 25mm / 32mm | Sump tank: 100L SS304 | Measuring tank: Calibrated with level indicator'
                ],
                [
                    'code' => '1203',
                    'name' => "Reynolds Apparatus for Flow Visualization",
                    'img' => 'https://images.unsplash.com/photo-1716191299980-a6e8827ba10b?w=600&h=450&fit=crop&auto=format',
                    'desc' => 'Glass tube flow column with dye injection needle and constant-head header tank to observe critical Reynolds number.',
                    'specs' => 'Tube dia: 20mm clear glass | Dye: Potassium permanganate injector | Base: Stainless steel'
                ],
                [
                    'code' => '1204',
                    'name' => 'Pipe Friction Loss & Minor Losses Apparatus',
                    'img' => 'https://images.unsplash.com/photo-1532186773960-85649e5cb70b?w=600&h=450&fit=crop&auto=format',
                    'desc' => 'Multi-line pipe manifold to quantify Darcy-Weisbach friction factor and loss coefficients for fittings.',
                    'specs' => 'Test pipes: 4 diameters (15, 20, 25, 32mm) | Fittings: Gate valve, globe valve, elbows, sudden contraction'
                ]
            ],
            'products_table' => [
                ['code' => '1201', 'name' => "Bernoulli's Theorem Apparatus", 'category' => 'Fundamental Flow'],
                ['code' => '1202', 'name' => 'Venturimeter and Orifice Meter Test Rig', 'category' => 'Flow Measurement'],
                ['code' => '1203', 'name' => "Reynolds Apparatus for Flow Visualization", 'category' => 'Boundary Layer & Regimes'],
                ['code' => '1204', 'name' => 'Pipe Friction Loss Apparatus (Major & Minor Losses)', 'category' => 'Pipe Flow & Losses'],
                ['code' => '1205', 'name' => 'Notches and Weirs Flow Test Channel (V-Notch, Rectangular)', 'category' => 'Open Channel Flow'],
                ['code' => '1206', 'name' => 'Metacentric Height Measurement Apparatus', 'category' => 'Hydrostatics'],
                ['code' => '1207', 'name' => 'Pelton Wheel Turbine Test Rig with Dynamometer', 'category' => 'Turbomachinery'],
                ['code' => '1208', 'name' => 'Francis Turbine Test Rig', 'category' => 'Turbomachinery'],
                ['code' => '1209', 'name' => 'Centrifugal Pump Test Rig (Single & Multi-Stage)', 'category' => 'Pumps & Turbines']
            ]
        ],

        'heat-transfer-lab' => [
            'slug' => 'heat-transfer-lab',
            'num' => '03',
            'title' => 'Heat Transfer Lab',
            'subtitle' => 'Conduction, Convection, Radiation, Heat Exchangers, Boiling & Thermal Conductivity',
            'hero_img' => 'https://images.unsplash.com/photo-1717386255773-1e3037c81788?w=1600&h=800&fit=crop&auto=format',
            'desc' => 'Heat Transfer Lab covers steady and transient heat transfer regimes across solid media, fluid streams, and radiative surfaces. Designed with precision thermocouples, PID temperature controllers, and digital wattmeters for exact empirical verification of Fourier, Newton, and Stefan-Boltzmann thermal laws.',
            'learning_outcomes' => [
                'Determine thermal conductivity of metal rods, insulating powders, and composite walls.',
                'Analyze natural and forced convection coefficients in air ducts and pin fins.',
                'Evaluate Stefan-Boltzmann radiation constant and emissivity of test plates.',
                'Calculate logarithmic mean temperature difference (LMTD) in parallel and counter-flow heat exchangers.'
            ],
            'featured_products' => [
                [
                    'code' => '1301',
                    'name' => 'Thermal Conductivity of Metal Rod Apparatus',
                    'img' => 'https://images.unsplash.com/photo-1717386255773-1e3037c81788?w=600&h=450&fit=crop&auto=format',
                    'desc' => 'Insulated copper test bar with band heater and multi-point thermocouples to verify Fourier 1D conduction.',
                    'specs' => 'Specimen: 25mm dia electrolytic copper | Thermocouples: 8 Type-K | Controller: Digital PID'
                ],
                [
                    'code' => '1302',
                    'name' => 'Parallel & Counter Flow Concentric Tube Heat Exchanger',
                    'img' => 'https://images.unsplash.com/photo-1602052577122-f73b9710adba?w=600&h=450&fit=crop&auto=format',
                    'desc' => 'Double pipe heat exchanger equipped with valve manifold for instant parallel/counter flow switching.',
                    'specs' => 'Tubes: Copper inner / GI outer | Hot water bath: Insulated SS with immersion heater'
                ],
                [
                    'code' => '1303',
                    'name' => "Stefan-Boltzmann Radiation Constant Apparatus",
                    'img' => 'https://images.unsplash.com/photo-1581093803931-46e730e7622e?w=600&h=450&fit=crop&auto=format',
                    'desc' => 'Hemispherical enclosure with water jacket and copper test disc to experimentally determine radiation constant sigma.',
                    'specs' => 'Enclosure: 200mm dia copper hemisphere | Sensor: Thermocouple with millivoltmeter'
                ]
            ],
            'products_table' => [
                ['code' => '1301', 'name' => 'Thermal Conductivity of Metal Rod Apparatus', 'category' => 'Conduction'],
                ['code' => '1302', 'name' => 'Thermal Conductivity of Insulating Powder', 'category' => 'Conduction'],
                ['code' => '1303', 'name' => 'Composite Wall Heat Transfer Apparatus', 'category' => 'Conduction'],
                ['code' => '1304', 'name' => 'Pin-Fin Heat Transfer Apparatus (Natural & Forced Convection)', 'category' => 'Convection'],
                ['code' => '1305', 'name' => 'Forced Convection Heat Transfer Inside Tube', 'category' => 'Convection'],
                ['code' => '1306', 'name' => "Stefan-Boltzmann Radiation Apparatus", 'category' => 'Radiation'],
                ['code' => '1307', 'name' => 'Emissivity Measurement Apparatus', 'category' => 'Radiation'],
                ['code' => '1308', 'name' => 'Parallel & Counter Flow Shell and Tube Heat Exchanger', 'category' => 'Heat Exchangers'],
                ['code' => '1309', 'name' => 'Plate Type Heat Exchanger Test Rig', 'category' => 'Heat Exchangers']
            ]
        ],

        'refrigeration-lab' => [
            'slug' => 'refrigeration-lab',
            'num' => '08',
            'title' => 'Refrigeration & Air Conditioning Lab',
            'subtitle' => 'Vapor Compression, Air Conditioning Tutors, Heat Pumps, Psychrometry & Cascade Systems',
            'hero_img' => 'assets/images/refrigeration-lab.jpg',
            'desc' => 'Refrigeration systems refer to the different physical components that make up the total refrigeration unit. The different stages in the refrigeration cycle are undergone in these physical systems. Ambros India manufactures complete teaching laboratories covering Vapor Compression Test Rigs, Air Conditioning Tutors, Domestic Refrigerator Cut-sections, Ice Plant Trainers, and Heat Pump Demonstration units calibrated with digital pressure transducers and energy meters.',
            'learning_outcomes' => [
                'Quantify Coefficient of Performance (COP) of Vapor Compression Refrigeration systems.',
                'Plot pressure-enthalpy (P-h) and temperature-entropy (T-s) cycles under varying expansion devices.',
                'Perform psychrometric processes: sensible heating, cooling, humidification, and dehumidification.',
                'Diagnose refrigerant flow behaviors using capillary tubes vs thermostatic expansion valves (TXV).'
            ],
            'featured_products' => [
                [
                    'code' => '1801',
                    'name' => 'Vapor Compression Refrigeration Test Rig',
                    'img' => 'assets/images/refrigeration-lab.jpg',
                    'desc' => 'Industrial hermetic compressor unit with air-cooled condenser, rotameter, and dual expansion devices for COP analysis.',
                    'specs' => 'Compressor: 1/3 HP Hermetic | Refrigerant: R134a eco-friendly | Evaporator: Water calorimeter tank'
                ],
                [
                    'code' => '1802',
                    'name' => 'Air Conditioning Tutor / Trainer Test Bench',
                    'img' => 'https://images.unsplash.com/photo-1717386255773-a456c611dc4e?w=600&h=450&fit=crop&auto=format',
                    'desc' => 'Complete duct air conditioning trainer equipped with pre-heater, humidifier, cooling coil, and reheating stage.',
                    'specs' => 'Duct: Clear acrylic with anemometer | Instrumentation: Digital psychrometer, dry/wet bulb sensors'
                ],
                [
                    'code' => '1803',
                    'name' => 'Domestic Refrigerator & Cut-Section Trainer',
                    'img' => 'https://images.unsplash.com/photo-1716191299980-a6e8827ba10b?w=600&h=450&fit=crop&auto=format',
                    'desc' => 'Cut-section and running domestic refrigeration unit showing internal piston, valves, condenser tubing, and freezer.',
                    'specs' => 'Capacity: 165L | Cut-section: Color-coded internal flow paths | Frame: Heavy-duty mobile trolley'
                ]
            ],
            'products_table' => [
                ['code' => '1801', 'name' => 'Vapor Compression Refrigeration Test Rig', 'category' => 'Vapor Compression'],
                ['code' => '1802', 'name' => 'Air Conditioning Tutor / Test Rig with Psychrometric Duct', 'category' => 'Air Conditioning'],
                ['code' => '1803', 'name' => 'Domestic Refrigerator Cut-Section Demonstration Model', 'category' => 'Educational Models'],
                ['code' => '1804', 'name' => 'Water Cooler Test Rig', 'category' => 'Cooling Systems'],
                ['code' => '1805', 'name' => 'Ice Plant Test Tutor', 'category' => 'Industrial Refrigeration'],
                ['code' => '1806', 'name' => 'Mechanical Heat Pump Demonstration Unit', 'category' => 'Heat Pumps'],
                ['code' => '1807', 'name' => 'Cascade Refrigeration System Trainer', 'category' => 'Advanced Refrigeration'],
                ['code' => '1808', 'name' => 'Cut-Section Rotary & Reciprocating Compressors', 'category' => 'Compressor Models']
            ]
        ]
    ];

    public function __construct()
    {
        $filePath = WRITEPATH . 'categories.json';
        if (file_exists($filePath)) {
            $saved = json_decode(file_get_contents($filePath), true);
            if (is_array($saved) && !empty($saved)) {
                $this->categories = $saved;
            }
        }
    }

    public function getAllCategories(): array
    {
        return $this->categories;
    }

    public function getCategory(string $slug): ?array
    {
        return $this->categories[$slug] ?? null;
    }

    public function saveCategory(array $data): bool
    {
        $slug = $data['slug'] ?? url_title(strtolower($data['title']), '-', true);
        $data['slug'] = $slug;

        $this->categories[$slug] = array_merge($this->categories[$slug] ?? [], $data);

        $filePath = WRITEPATH . 'categories.json';
        return file_put_contents($filePath, json_encode($this->categories, JSON_PRETTY_PRINT)) !== false;
    }

    public function deleteCategory(string $slug): bool
    {
        if (isset($this->categories[$slug])) {
            unset($this->categories[$slug]);
            $filePath = WRITEPATH . 'categories.json';
            return file_put_contents($filePath, json_encode($this->categories, JSON_PRETTY_PRINT)) !== false;
        }
        return false;
    }
}
