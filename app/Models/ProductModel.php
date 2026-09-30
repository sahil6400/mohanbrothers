<?php

namespace App\Models;

class ProductModel
{
    private array $products = [
        'static-dynamic-balancing-apparatus' => [
            'slug' => 'static-dynamic-balancing-apparatus',
            'code' => '1100',
            'name' => 'Static Dynamic Balancing Apparatus',
            'category_slug' => 'theory-of-machine-lab',
            'category_name' => 'Theory of Machine Lab',
            'img' => 'assets/images/static-dynamic-balancing.jpg',
            'badge' => 'ISO 9001:2015 Certified | CE Approved',
            'overview' => 'This equipment is designed for carrying out the experiment for balancing a rotation mass system. The apparatus consists of a stainless steel shaft fixed in a rectangular frame. A set of four blocks with a clamping arrangement is provided. For static balancing, each block is individually clamped on shaft and its relative weight is found out using cord and container system in terms of number of steel balls. For dynamic balancing, a moment polygon is drawn using relative weights and angular and axial position of blocks is determined. The block are clamped on shaft is rotated by a motor to check dynamic balance of the system. The system is provided with angular and longitudinal scales and is suspended with chains for dynamic balancing.',
            'experiments' => [
                'To balance the masses statically and dynamically of a single rotating mass system.',
                'To observation of effect of unbalance in a rotating mass system.',
                'To verify theoretical moment polygon with dynamic vibration equilibrium.'
            ],
            'utilities' => [
                'Electricity Supply' => '0.5 kW, 220 V, 50 Hz, Single Phase AC',
                'Working Space' => '1.5 m × 0.8 m Rigid Bench Top',
                'Mounting' => 'Bench suspended with high-tensile damping chains'
            ],
            'specifications' => [
                'Drive Motor' => 'Fractional Horsepower (FHP) Motor, variable speed, with solid-state thyristor speed controller',
                'Balancing Weight' => '4 Nos. of Stainless Steel with different sized eccentric Mass for varying unbalance',
                'Rotating Shaft' => 'Material Stainless Steel (Precision ground, Dia 15 mm, Length 450 mm)',
                'Structure & Frame' => 'The whole Set-up is well designed and arranged in a good quality painted Structure with chain suspension',
                'Scale & Angular Disc' => '360° Circular protractor disc (1° graduation) and SS longitudinal scale (1 mm graduation)',
                'Accessories' => 'Supplied with cord & container set, calibrated steel balls, spanner set and manual'
            ],
            'features' => [
                'Quick-clamping split collar design for rapid repositioning of test blocks.',
                'Direct digital RPM display with high accuracy optical sensor.',
                'Dual-mode operation: Static gravity balancing and motorized dynamic rotation.',
                'Supplied complete with instructional manual, calculation sheets, and sample moment polygon charts.'
            ],
            'related' => [
                ['code' => '1101', 'slug' => 'motorised-gyroscope-apparatus', 'name' => 'Motorised Gyroscope Apparatus', 'img' => 'https://images.unsplash.com/photo-1581093577421-f561a654a353?w=500&h=350&fit=crop&auto=format'],
                ['code' => '1102', 'slug' => 'motorised-governor-apparatus', 'name' => 'Motorised Governor Apparatus', 'img' => 'https://images.unsplash.com/photo-1602052577122-f73b9710adba?w=500&h=350&fit=crop&auto=format'],
                ['code' => '1103', 'slug' => 'whirling-of-shaft-apparatus', 'name' => 'Whirling of Shaft Apparatus', 'img' => 'https://images.unsplash.com/photo-1716191299980-a6e8827ba10b?w=500&h=350&fit=crop&auto=format'],
                ['code' => '1104', 'slug' => 'cam-analysis-apparatus', 'name' => 'Cam Analysis Apparatus', 'img' => 'https://images.unsplash.com/photo-1532186773960-85649e5cb70b?w=500&h=350&fit=crop&auto=format']
            ]
        ],

        'motorised-gyroscope-apparatus' => [
            'slug' => 'motorised-gyroscope-apparatus',
            'code' => '1101',
            'name' => 'Motorised Gyroscope Apparatus',
            'category_slug' => 'theory-of-machine-lab',
            'category_name' => 'Theory of Machine Lab',
            'img' => 'https://images.unsplash.com/photo-1581093577421-f561a654a353?w=800&h=600&fit=crop&auto=format',
            'badge' => 'ISO 9001:2015 Precision Calibrated',
            'overview' => 'The Motorised Gyroscope Apparatus is designed to demonstrate and verify the fundamental laws of gyroscopic precession. It comprises a dynamically balanced heavy brass disc rotor driven by a variable-speed motor and mounted inside a double-gimbal frame. The frame allows free angular motion about the spin axis, precession axis, and active gyroscopic couple axis. Students can experimentally measure precession velocity for various rotor speeds and applied torque weights to verify the mathematical relation T = I·ω·ωp.',
            'experiments' => [
                'To determine the gyroscopic couple experimentally and compare with theoretical value (T = I·ω·ωp).',
                'To study the effect of gyroscopic couple on stability of aeroplanes, marine ships, and automobiles.',
                'To observe the direction of precession corresponding to the direction of spin and applied couple.'
            ],
            'utilities' => [
                'Power Supply' => '220 V AC, 50 Hz, Single Phase (0.5 kW)',
                'Bench Space' => '1.0 m × 0.8 m rigid vibration-free table'
            ],
            'specifications' => [
                'Rotor Disc' => 'High-density brass disc, dynamically balanced (Dia 300 mm, thickness 30 mm)',
                'Drive Motor' => 'High-speed fractional DC motor with electronic dimmer control (0 - 3000 RPM)',
                'Gimbal System' => 'Double concentric gimbal rings mounted on precision ball bearings',
                'Torque Arm' => 'Calibrated lever arm with pan for holding dead weights (up to 2 kg)',
                'Tachometer' => 'Digital non-contact optical tachometer with LED display'
            ],
            'features' => [
                'Precision zero-friction gimbal bearings ensure exact precessional rates.',
                'Counter-balance adjustment allows neutral static equilibrium before load application.',
                'Supplied complete with calibrated stainless steel weights set.'
            ],
            'related' => [
                ['code' => '1100', 'slug' => 'static-dynamic-balancing-apparatus', 'name' => 'Static & Dynamic Balancing Apparatus', 'img' => 'https://images.unsplash.com/photo-1581093803931-46e730e7622e?w=500&h=350&fit=crop&auto=format'],
                ['code' => '1102', 'slug' => 'motorised-governor-apparatus', 'name' => 'Motorised Governor Apparatus', 'img' => 'https://images.unsplash.com/photo-1602052577122-f73b9710adba?w=500&h=350&fit=crop&auto=format'],
                ['code' => '1105', 'slug' => 'universal-vibration-apparatus', 'name' => 'Universal Vibration Lab', 'img' => 'https://images.unsplash.com/photo-1717386255773-1e3037c81788?w=500&h=350&fit=crop&auto=format']
            ]
        ],

        'motorised-governor-apparatus' => [
            'slug' => 'motorised-governor-apparatus',
            'code' => '1102',
            'name' => 'Motorised Governor Apparatus',
            'category_slug' => 'theory-of-machine-lab',
            'category_name' => 'Theory of Machine Lab',
            'img' => 'https://images.unsplash.com/photo-1602052577122-f73b9710adba?w=800&h=600&fit=crop&auto=format',
            'badge' => 'ISO 9001:2015 Precision Calibrated',
            'overview' => 'The Motorised Governor Apparatus is an essential bench-top educational unit to study the characteristics and performance of centrifugal governors. The unit is supplied with four interchangeable governor mechanisms: Watt Governor (gravity-controlled), Porter Governor (dead-weight central sleeve), Proell Governor (open fly-weights), and Hartnell Governor (spring-loaded centrifugal). A variable speed DC motor drives the spindle, while sleeve displacement is monitored against speed variations to plot sensitivity, stability, and isochronism curves.',
            'experiments' => [
                'To determine sleeve displacement versus spindle speed for Watt, Porter, Proell, and Hartnell governors.',
                'To plot characteristic curves of controlling force against governor ball radius of rotation.',
                'To investigate governor sensitivity, stability, effort, and power under varying spring preloads.'
            ],
            'utilities' => [
                'Power Supply' => '220 V AC, 50 Hz, Single Phase (0.5 kW)',
                'Bench Space' => '1.0 m × 0.8 m table'
            ],
            'specifications' => [
                'Governor Mechanisms' => 'Watt, Porter, Proell, and Hartnell interchangeable assemblies',
                'Drive Spindle' => 'Vertical drive spindle with quick-coupling clamp',
                'Motor Drive' => 'Variable speed DC motor (0 - 800 RPM) with solid-state regulator',
                'Instrumentation' => 'Digital speed indicator (RPM) and precision linear dial scale for sleeve lift (0 - 50 mm)',
                'Weights & Springs' => 'Calibrated central dead weights and interchangeable compression springs'
            ],
            'features' => [
                'Transparent acrylic safety shield surrounding rotating governor mechanism.',
                'Quick modular changeover between governor configurations in under 2 minutes.',
                'Heavy vibration-damped base plate with rubber leveling mounts.'
            ],
            'related' => [
                ['code' => '1100', 'slug' => 'static-dynamic-balancing-apparatus', 'name' => 'Static & Dynamic Balancing Apparatus', 'img' => 'https://images.unsplash.com/photo-1581093803931-46e730e7622e?w=500&h=350&fit=crop&auto=format'],
                ['code' => '1101', 'slug' => 'motorised-gyroscope-apparatus', 'name' => 'Motorised Gyroscope Apparatus', 'img' => 'https://images.unsplash.com/photo-1581093577421-f561a654a353?w=500&h=350&fit=crop&auto=format'],
                ['code' => '1104', 'slug' => 'cam-analysis-apparatus', 'name' => 'Cam Analysis Apparatus', 'img' => 'https://images.unsplash.com/photo-1532186773960-85649e5cb70b?w=500&h=350&fit=crop&auto=format']
            ]
        ],

        'vapor-compression-refrigeration-test-rig' => [
            'slug' => 'vapor-compression-refrigeration-test-rig',
            'code' => '1801',
            'name' => 'Vapor Compression Refrigeration Test Rig',
            'category_slug' => 'refrigeration-lab',
            'category_name' => 'Refrigeration & Air Conditioning Lab',
            'img' => 'assets/images/refrigeration-lab.jpg',
            'badge' => 'ISO 9001:2015 Precision Calibrated',
            'overview' => 'The Vapor Compression Refrigeration Test Rig is an industrial-standard teaching unit designed to demonstrate the fundamental thermodynamic vapor-compression cycle. The system utilizes an eco-friendly refrigerant (R134a) circulated through an insulated water calorimeter evaporator, a forced air-cooled condenser, and a hermetic reciprocating compressor. Instrumentation includes digital temperature indicators at all 4 cycle state points, dual pressure gauges, a rotameter for refrigerant flow rate, and electrical energy meters to calculate actual COP, Carnot COP, and refrigeration tonnage.',
            'experiments' => [
                'To evaluate the actual Coefficient of Performance (COP) and Carnot COP of the refrigeration system.',
                'To plot the refrigeration cycle on Pressure-Enthalpy (P-h) and Temperature-Entropy (T-s) charts.',
                'To calculate the refrigeration capacity in Tons of Refrigeration (TR) by water calorimeter method.',
                'To analyze the effect of condensing and evaporating temperatures on system performance.'
            ],
            'utilities' => [
                'Power Supply' => '220 V AC, 50 Hz, Single Phase (1.5 kW)',
                'Water Supply' => 'Continuous tap water connection for calorimeter',
                'Floor Space' => '1.5 m × 1.0 m mobile footprint'
            ],
            'specifications' => [
                'Compressor' => '1/3 HP Hermetically sealed reciprocating compressor (Emerson / Danfoss)',
                'Refrigerant' => 'R-134a (CFC-free eco-friendly)',
                'Condenser' => 'Forced air-cooled finned copper tube condenser with axial fan',
                'Evaporator' => 'Insulated stainless steel immersion coil in water calorimeter tank with stirrer',
                'Expansion' => 'Capillary tube and thermostatic expansion valve (TXV) with selector valves',
                'Pressure' => 'Dual glycerine-filled pressure gauges for suction and discharge lines',
                'Temperature' => 'Multi-channel digital temperature indicator with calibrated PT100 sensors'
            ],
            'features' => [
                'Dual expansion device setup allows side-by-side comparison of capillary vs TXV.',
                'Mounted on a heavy-duty powder-coated mobile frame with castor wheels and locks.',
                'Complete electrical control panel with MCB protection, voltmeter, ammeter, and energy meter.'
            ],
            'related' => [
                ['code' => '1802', 'slug' => 'air-conditioning-tutor', 'name' => 'Air Conditioning Tutor / Test Rig', 'img' => 'https://images.unsplash.com/photo-1717386255773-a456c611dc4e?w=500&h=350&fit=crop&auto=format'],
                ['code' => '1803', 'slug' => 'domestic-refrigerator-cut-section', 'name' => 'Domestic Refrigerator Cut-Section Model', 'img' => 'https://images.unsplash.com/photo-1716191299980-a6e8827ba10b?w=500&h=350&fit=crop&auto=format']
            ]
        ]
    ];

    public function getProduct(string $slug): ?array
    {
        if (isset($this->products[$slug])) {
            return $this->products[$slug];
        }

        // Search by code or slug normalized
        $cleanSlug = strtolower(trim($slug));
        foreach ($this->products as $key => $p) {
            if ($key === $cleanSlug || strtolower($p['code']) === $cleanSlug || strtolower($p['slug']) === $cleanSlug) {
                return $p;
            }
        }

        // Check in CategoryModel products_table to generate full product data
        $categoryModel = new CategoryModel();
        foreach ($categoryModel->getAllCategories() as $catKey => $cat) {
            if (!empty($cat['products_table'])) {
                foreach ($cat['products_table'] as $row) {
                    $rowSlug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $row['name']), '-'));
                    if ($row['code'] === $slug || $rowSlug === $cleanSlug) {
                        return [
                            'slug' => $rowSlug,
                            'code' => $row['code'],
                            'name' => $row['name'],
                            'category_slug' => $cat['slug'],
                            'category_name' => $cat['title'],
                            'img' => $cat['hero_img'] ?? 'https://images.unsplash.com/photo-1581093803931-46e730e7622e?w=800&h=600&fit=crop&auto=format',
                            'badge' => 'ISO 9001:2015 Precision Calibrated',
                            'overview' => 'The ' . $row['name'] . ' is an advanced educational test apparatus manufactured by Ambros India for academic curricula, technical research laboratories, and engineering colleges. Built with industrial-grade precision components, digital sensor instrumentation, and robust corrosion-resistant framing for long service life and repeatable empirical experiments.',
                            'experiments' => [
                                'To study the fundamental operating principles and verify mathematical models of ' . $row['name'] . '.',
                                'To calculate experimental efficiency, error margins, and performance curves.',
                                'To evaluate behavior under varying load, speed, and operating conditions.'
                            ],
                            'utilities' => [
                                'Electrical Supply' => '220 V AC, 50 Hz, Single Phase (0.5 kW - 1.5 kW)',
                                'Test Bench' => 'Standard rigid laboratory bench top'
                            ],
                            'specifications' => [
                                'Model System' => $row['name'] . ' (Code ' . $row['code'] . ')',
                                'Category' => $row['category'] ?? 'Laboratory Apparatus',
                                'Instrumentation' => 'Digital indicator & calibrated precision sensors',
                                'Frame Material' => 'Heavy-duty steel structure with powder-coated anti-corrosive finish',
                                'Manual & Charts' => 'Supplied complete with operating manual, calculations & circuit diagrams'
                            ],
                            'features' => [
                                'High accuracy sensors with direct digital readouts.',
                                'Safety guards and overload protection integrated.',
                                'Comprehensive lab manual and calculation sheets included.'
                            ],
                            'related' => [
                                ['code' => '1100', 'slug' => 'static-dynamic-balancing-apparatus', 'name' => 'Static Dynamic Balancing Apparatus', 'img' => 'assets/images/static-dynamic-balancing.jpg'],
                                ['code' => '1101', 'slug' => 'motorised-gyroscope-apparatus', 'name' => 'Motorised Gyroscope Apparatus', 'img' => 'https://images.unsplash.com/photo-1581093577421-f561a654a353?w=500&h=350&fit=crop&auto=format'],
                                ['code' => '1102', 'slug' => 'motorised-governor-apparatus', 'name' => 'Motorised Governor Apparatus', 'img' => 'https://images.unsplash.com/photo-1602052577122-f73b9710adba?w=500&h=350&fit=crop&auto=format']
                            ]
                        ];
                    }
                }
            }
        }

        // Return default product (static-dynamic-balancing-apparatus)
        $first = reset($this->products);
        return $first;
    }

    public function __construct()
    {
        $filePath = WRITEPATH . 'products.json';
        if (file_exists($filePath)) {
            $saved = json_decode(file_get_contents($filePath), true);
            if (is_array($saved) && !empty($saved)) {
                $this->products = $saved;
            }
        }
    }

    public function getAllProducts(): array
    {
        return $this->products;
    }

    public function saveProduct(array $data): bool
    {
        $slug = $data['slug'] ?? url_title(strtolower($data['name']), '-', true);
        $data['slug'] = $slug;

        $this->products[$slug] = array_merge($this->products[$slug] ?? [], $data);

        $filePath = WRITEPATH . 'products.json';
        return file_put_contents($filePath, json_encode($this->products, JSON_PRETTY_PRINT)) !== false;
    }

    public function deleteProduct(string $slug): bool
    {
        if (isset($this->products[$slug])) {
            unset($this->products[$slug]);
            $filePath = WRITEPATH . 'products.json';
            return file_put_contents($filePath, json_encode($this->products, JSON_PRETTY_PRINT)) !== false;
        }
        return false;
    }
}
