<?php

namespace Database\Seeders;

use CoreConstants;
use App\Services\Contracts\AboutInterface;
use App\Services\Contracts\EducationInterface;
use App\Services\Contracts\ExperienceInterface;
use App\Services\Contracts\MessageInterface;
use App\Services\Contracts\PortfolioConfigInterface;
use App\Services\Contracts\ProjectInterface;
use App\Services\Contracts\ServiceInterface;
use App\Services\Contracts\SkillInterface;
use App\Services\Contracts\VisitorInterface;
use Config;
use Illuminate\Database\Seeder;
use Log;
use Str;
use Faker\Factory as Faker;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            $faker = Faker::create();

            $portfolioConfig = resolve(PortfolioConfigInterface::class);
            $about = resolve(AboutInterface::class);
            $education = resolve(EducationInterface::class);
            $skill = resolve(SkillInterface::class);
            $experience = resolve(ExperienceInterface::class);
            $project = resolve(ProjectInterface::class);
            $service = resolve(ServiceInterface::class);
            $visitor = resolve(VisitorInterface::class);
            $message = resolve(MessageInterface::class);

            //portfolio config table seed

            //template
            $data = [
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__TEMPLATE,
                'setting_value' => 'procyon',
                'default_value' => 'procyon',
            ];
            $portfolioConfig->insertOrUpdate($data);

            //accent color
            $data = [
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__ACCENT_COLOR,
                'setting_value' => '#1890ff',
                'default_value' => '#1890ff',
            ];
            $portfolioConfig->insertOrUpdate($data);

            //google analytics ID
            $data = [
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__GOOGLE_ANALYTICS_ID,
                'setting_value' => Config::get('custom.demo_mode') ? 'G-PS8JF33VLD' : '',
                'default_value' => Config::get('custom.demo_mode') ? 'G-PS8JF33VLD' : '',
            ];
            $portfolioConfig->insertOrUpdate($data);

            //maintenance mode
            $data = [
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__MAINTENANCE_MODE,
                'setting_value' => CoreConstants::FALSE,
                'default_value' => CoreConstants::FALSE,
            ];
            $portfolioConfig->insertOrUpdate($data);

            //visibility
            $data = [
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__VISIBILITY_ABOUT,
                'setting_value' => CoreConstants::TRUE,
                'default_value' => CoreConstants::TRUE,
            ];
            $portfolioConfig->insertOrUpdate($data);

            $data = [
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__VISIBILITY_SKILL,
                'setting_value' => CoreConstants::TRUE,
                'default_value' => CoreConstants::TRUE,
            ];
            $portfolioConfig->insertOrUpdate($data);

            $data = [
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__VISIBILITY_EDUCATION,
                'setting_value' => CoreConstants::TRUE,
                'default_value' => CoreConstants::TRUE,
            ];
            $portfolioConfig->insertOrUpdate($data);

            $data = [
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__VISIBILITY_EXPERIENCE,
                'setting_value' => CoreConstants::TRUE,
                'default_value' => CoreConstants::TRUE,
            ];
            $portfolioConfig->insertOrUpdate($data);

            $data = [
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__VISIBILITY_PROJECT,
                'setting_value' => CoreConstants::TRUE,
                'default_value' => CoreConstants::TRUE,
            ];
            $portfolioConfig->insertOrUpdate($data);

            $data = [
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__VISIBILITY_SERVICE,
                'setting_value' => CoreConstants::TRUE,
                'default_value' => CoreConstants::TRUE,
            ];
            $portfolioConfig->insertOrUpdate($data);

            $data = [
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__VISIBILITY_CONTACT,
                'setting_value' => CoreConstants::TRUE,
                'default_value' => CoreConstants::TRUE,
            ];
            $portfolioConfig->insertOrUpdate($data);

            $data = [
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__VISIBILITY_FOOTER,
                'setting_value' => CoreConstants::TRUE,
                'default_value' => CoreConstants::TRUE,
            ];
            $portfolioConfig->insertOrUpdate($data);

            $data = [
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__VISIBILITY_CV,
                'setting_value' => CoreConstants::TRUE,
                'default_value' => CoreConstants::TRUE,
            ];
            $portfolioConfig->insertOrUpdate($data);

            $data = [
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__VISIBILITY_SKILL_PROFICIENCY,
                'setting_value' => CoreConstants::TRUE,
                'default_value' => CoreConstants::TRUE,
            ];
            $portfolioConfig->insertOrUpdate($data);

            //header script
            $data = [
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__SCRIPT_HEADER,
                'setting_value' => '',
                'default_value' => '',
            ];
            $portfolioConfig->insertOrUpdate($data);

            //footer script
            $data = [
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__SCRIPT_FOOTER,
                'setting_value' => '',
                'default_value' => '',
            ];
            $portfolioConfig->insertOrUpdate($data);

            //meta title
            $data = [
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__META_TITLE,
                'setting_value' => '',
                'default_value' => '',
            ];
            $portfolioConfig->insertOrUpdate($data);

            //meta author
            $data = [
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__META_AUTHOR,
                'setting_value' => '',
                'default_value' => '',
            ];
            $portfolioConfig->insertOrUpdate($data);

            //meta description
            $data = [
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__META_DESCRIPTION,
                'setting_value' => '',
                'default_value' => '',
            ];
            $portfolioConfig->insertOrUpdate($data);

            //meta image
            try {
                if (is_dir('public/assets/common/img/meta-image')) {
                    $dir = 'public/assets/common/img/meta-image';
                } else {
                    $dir = 'assets/common/img/meta-image';
                }
                $leave_files = array('.gitkeep');
                
                foreach (glob("$dir/*") as $file) {
                    if (!in_array(basename($file), $leave_files)) {
                        unlink($file);
                    }
                }
            } catch (\Throwable $th) {
                Log::error($th->getMessage());
            }
            $data = [
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__META_IMAGE,
                'setting_value' => '',
                'default_value' => '',
            ];
            $portfolioConfig->insertOrUpdate($data);


            //about table seed
            try {
                try {
                    //avatar
                    if (is_dir('public/assets/common/img/avatar')) {
                        $dir = 'public/assets/common/img/avatar';
                    } else {
                        $dir = 'assets/common/img/avatar';
                    }
                    $leave_files = array('.gitkeep');
                    
                    foreach (glob("$dir/*") as $file) {
                        if (!in_array(basename($file), $leave_files)) {
                            unlink($file);
                        }
                    }

                    if (is_dir('public/assets/common/img/avatar')) {
                        copy('public/assets/common/default/avatar/default.png', $dir.'/default.png');
                    } else {
                        copy('assets/common/default/avatar/default.png', $dir.'/default.png');
                    }
                } catch (\Throwable $th) {
                    Log::error($th->getMessage());
                }

                try {
                    //cover
                    if (is_dir('public/assets/common/img/cover')) {
                        $dir = 'public/assets/common/img/cover';
                    } else {
                        $dir = 'assets/common/img/cover';
                    }
                    $leave_files = array('.gitkeep');
                    
                    foreach (glob("$dir/*") as $file) {
                        if (!in_array(basename($file), $leave_files)) {
                            unlink($file);
                        }
                    }

                    if (is_dir('public/assets/common/img/cover')) {
                        copy('public/assets/common/default/cover/default.png', $dir.'/default.png');
                    } else {
                        copy('assets/common/default/cover/default.png', $dir.'/default.png');
                    }
                } catch (\Throwable $th) {
                    Log::error($th->getMessage());
                }

                try {
                    //cv
                    if (is_dir('public/assets/common/cv')) {
                        $dir = 'public/assets/common/cv';
                    } else {
                        $dir = 'assets/common/cv';
                    }

                    $leave_files = array('.gitkeep');
                    
                    foreach (glob("$dir/*") as $file) {
                        if (!in_array(basename($file), $leave_files)) {
                            unlink($file);
                        }
                    }
                    if (is_dir('public/assets/common/default/cv/')) {
                        copy('public/assets/common/default/cv/CV_English.pdf', $dir.'/CV_English.pdf');
                    } else {
                        copy('assets/common/default/cv/CV_English.pdf', $dir.'/CV_English.pdf');
                    }
                } catch (\Throwable $th) {
                    Log::error($th->getMessage());
                }
                
                $data = [
                    'name' => 'Francisco Javier',
                    'email' => 'franc.javier.flores@gmail.com',
                    'avatar' => 'assets/common/img/avatar/default.png',
                    'cover' => 'assets/common/img/cover/default.png',
                    'phone' => '52+ 33 3408 7192',
                    'address' => '45589, San Pedro Tlaquepaque, Jal.',
                    'description' => 'I am a technology enthusiast, I like to integrate technology with all kinds of applications. I am fascinated by creating hardware designs with specialized firmware to interfaces to integrate computing technologies such as: cloud applications, artificial intelligence, machine learning, mixed with the internet of things (IoT) and industry 4.0.',
                    'taglines' => ["I am Software and Hardware Engineer with a focus on Embedded Systems", "I am Technology Integration Engineer", "I am Full Stack Developer"],
                    'social_links' => [
                        [
                            'title' => 'LinkedIn',
                            'iconClass' => 'fab fa-linkedin-in',
                            'link' => 'https://linkedin.com/in/francisco-javier-flores-zermeño'
                        ],
                        [
                            'title' => 'Github',
                            'iconClass' => 'fab fa-github',
                            'link' => 'https://github.com/fjlic'
                        ],
                        [
                            'title' => 'Twitter',
                            'iconClass' => 'fab fa-twitter',
                            'link' => 'https://twitter.com/fjlic'
                        ],
                        [
                            'title' => 'Facebook',
                            'iconClass' => 'fab fa-facebook',
                            'link' => 'https://www.facebook.com/FJLowIntegratingCost'
                        ],
                        [
                            'title' => 'Mail',
                            'iconClass' => 'far fa-envelope',
                            'link' => 'mailto:soporte@fjlic.com'
                        ],
                    ],
                    'seederCV' => 'assets/common/cv/CV_English.pdf',
                ];
                $about->store($data);

                //education table seed
                try {
                    $data = [
                        'institution' => 'Center for Advanced Technology CIATEQ, Postgraduate Masters Degrees',
                        'period' => '2019-2021',
                        'degree' => 'Intelligent Multimedia Systems',
                        'cgpa' => '97 out of 100',
                        'department' => 'Computer Science & Engineering',
                        'thesis' => 'Proposal for Improvement to Develop a Model of Application of IoT Services in Amusement Machines'
                    ];
                    $education->store($data);

                    $data = [
                        'institution' => 'University of Guadalajara',
                        'period' => '2014-2018',
                        'degree' => 'Computer Science Engineering',
                        'cgpa' => '92.7 out of 100',
                        'department' => 'Computer Science & Engineering',
                        'thesis' => 'General Examination for the Graduate of the Degree (EGEL)->(CENEVAL)'
                    ];
                    $education->store($data);
                } catch (\Throwable $th) {
                    Log::error($th->getMessage());
                }
            } catch (\Throwable $th) {
                Log::error($th->getMessage());
            }

            //skill table seed
            try {
                $data = [
                    'name' => 'PHP and Frameworks',
                    'proficiency' => '80'
                ];
                $skill->store($data);

                $data = [
                    'name' => 'JavaScript and Frameworks',
                    'proficiency' => '80'
                ];
                $skill->store($data);

                $data = [
                    'name' => 'Python and Frameworks',
                    'proficiency' => '80'
                ];
                $skill->store($data);

                $data = [
                    'name' => 'NetCore and Frameworks',
                    'proficiency' => '80'
                ];
                $skill->store($data);

                $data = [
                    'name' => 'Linux kernel operating systems (Ubuntu, Debian, CentOs) and Windows (W-10, W-Server)',
                    'proficiency' => '80'
                ];
                $skill->store($data);

                $data = [
                    'name' => 'SQL, MySQL and NoSQL',
                    'proficiency' => '80'
                ];
                $skill->store($data);

                $data = [
                    'name' => 'Embedded Software',
                    'proficiency' => '80'
                ];
                $skill->store($data);

                $data = [
                    'name' => 'Design & Hardware Prototyping',
                    'proficiency' => '80'
                ];
                $skill->store($data);

                $data = [
                    'name' => 'Platform IoT and Indutry 4.0',
                    'proficiency' => '80'
                ];
                $skill->store($data);
            } catch (\Throwable $th) {
                Log::error($th->getMessage());
            }

            //experience table seed
            try {
                $data = [
                    'company' => 'Galex Games',
                    'period' => '2019-2021',
                    'position' => 'IT Manager and Technology Integration Engineer ',
                    'details' => 'Management of technological projects derived from the design of hardware and software
                    applied for the company Diversiones Galex, support, follow up of the same, implementation of
                    development phases. '
                ];
                $experience->store($data);

                $data = [
                    'company' => 'Intralix',
                    'period' => '2016-2019',
                    'position' => 'Software and Hardware Development Engineer',
                    'details' => 'Development of web services for report management, web services for fuel load
                    comparisons, services for port information replicator, ip tcp port communication between servers, custom electronic design using microcontrollers, integration with gps devices as well as firmware
                    updates, web domain and subdomain management, email accounts email account management, remote configuration remote vpn connections, support and maintenance of services.'
                ];
                $experience->store($data);

                $data = [
                    'company' => 'EC-IDEAS',
                    'period' => '2013-2016',
                    'position' => 'Technician of Satellite Localization with GPS',
                    'details' => 'Management for the area of gps installations, monitoring with tracking platform, support with clients.'
                ];
                $experience->store($data);
            } catch (\Throwable $th) {
                Log::error($th->getMessage());
            }

            //project table seed
            try {
                try {
                    //images
                    if (is_dir('public/assets/common/img/projects')) {
                        $dir = 'public/assets/common/img/projects';
                    } else {
                        $dir = 'assets/common/img/projects';
                    }
                    
                    $leave_files = array('.gitkeep');
                    
                    foreach (glob("$dir/*") as $file) {
                        if (!in_array(basename($file), $leave_files)) {
                            unlink($file);
                        }
                    }
                } catch (\Throwable $th) {
                    Log::error($th->getMessage());
                }

                $data = [
                    'title' => 'IoT-Hotspot',
                    'categories' => ['personal'],
                    'link' => 'https://hotspot.fjlic.com',
                    'details' => 'IoT-Hotspot is a simple platform that applies Internet of Things (IoT) technology, strengthening it with a bit of statistics and an algorithm for machine learning (AI) focused on failure prediction and telemetry analysis of the devices. data collected by the devices, using prototype cards called, with these it was possible to give novel solutions to machines that required to communicate their current and operational status through the use of adaptable hardware, allowing their machines to send data To the cloud, our intention is to allow these alternative solutions to be replicated in other possible projects of a similar nature and thus contribute to the world by interconnecting electronic devices to the cloud.',
                    'seeder_thumbnail' => 'assets/common/img/projects/demo_project_1_1.png',
                    'seeder_images' => [
                        'assets/common/img/projects/demo_project_1_1.png',
                        'assets/common/img/projects/demo_project_1_2.png'
                    ]
                ];
                if (is_dir('public/assets/common/default/projects')) {
                    copy('public/assets/common/default/projects/demo_project_1_1.png', $dir.'/demo_project_1_1.png');
                    copy('public/assets/common/default/projects/demo_project_1_2.png', $dir.'/demo_project_1_2.png');
                } else {
                    copy('assets/common/default/projects/demo_project_1_1.png', $dir.'/demo_project_1_1.png');
                    copy('assets/common/default/projects/demo_project_1_2.png', $dir.'/demo_project_1_2.png');
                }
                
                $project->store($data);

                $data = [
                    'title' => 'Documentation IoT-Hotspot',
                    'categories' => ['personal'],
                    'link' => 'https://hotspot.fjlic.com/docs/1.0/overview',
                    'details' => 'There are companies that require a system 
                    system that allows them to interconnect their electronic devices to the cloud to give more 
                    to give more utility to their services, it also contributes in the knowledge to those who are interested in 
                    implementation, either in the construction of an IoT platform with minimal requirements, or in the case of carrying out a 
                    IoT platform with minimum requirements, or also in the case of carrying out the implementation for the 
                    implementation for the design of an IoT oriented modular board prototype. 
                    Although the information and implementation of the project is not limiting, it can be applied to other 
                    for this we created a documentation that explains in an intuitive way how to build your own project from scratch.',
                    'seeder_thumbnail' => 'assets/common/img/projects/demo_project_2_1.png',
                    'seeder_images' => [
                        'assets/common/img/projects/demo_project_2_1.png',
                        'assets/common/img/projects/demo_project_2_2.png'
                    ]
                ];

                if (is_dir('public/assets/common/default/projects')) {
                    copy('public/assets/common/default/projects/demo_project_2_1.png', $dir.'/demo_project_2_1.png');
                    copy('public/assets/common/default/projects/demo_project_2_2.png', $dir.'/demo_project_2_2.png');
                } else {
                    copy('assets/common/default/projects/demo_project_2_1.png', $dir.'/demo_project_2_1.png');
                    copy('assets/common/default/projects/demo_project_2_2.png', $dir.'/demo_project_2_2.png');
                }

                $project->store($data);

                $data = [
                    'title' => 'Modular prototype PCB for GPRS, GPS and WiFi',
                    'categories' => ['personal'],
                    'link' => 'https://hotspot.fjlic.com/docs/1.0/firmware-erb',
                    'details' => 'To develop the modular prototype design, we used Fritzing, KiCad EDA open source, these softwares allow us to design printed circuits of two or four layers, connect schematic diagrams, routing of printed circuits, it has support for libraries and full content libraries.
                    with it we integrated an Arduino Nano microcontroller, the ESP32 module and the A9G GPRS module with GPS + SD Card that allowed us to send telemetry to the IoT platform, this was a two-layer design to test the telemetry sending.',
                    'seeder_thumbnail' => 'assets/common/img/projects/demo_project_3_1.png',
                    'seeder_images' => [
                        'assets/common/img/projects/demo_project_3_1.png',
                        'assets/common/img/projects/demo_project_3_2.png'
                    ]
                ];
                
                if (is_dir('public/assets/common/default/projects')) {
                    copy('public/assets/common/default/projects/demo_project_3_1.png', $dir.'/demo_project_3_1.png');
                    copy('public/assets/common/default/projects/demo_project_3_2.png', $dir.'/demo_project_3_2.png');
                } else {
                    copy('assets/common/default/projects/demo_project_3_1.png', $dir.'/demo_project_3_1.png');
                    copy('assets/common/default/projects/demo_project_3_2.png', $dir.'/demo_project_3_2.png');
                }
                
                $project->store($data);
            } catch (\Throwable $th) {
                Log::error($th->getMessage());
            }

            //service table seed
            try {
                $data = [
                    'title' => 'Cloud Applications for Statistics and Learning Machines or Artificial Intelligence',
                    'icon' => 'fas fa-sitemap',
                    'details' => $faker->text()
                ];
                $service->store($data);

                $data = [
                    'title' => 'PCBS Design and Embedded Software',
                    'icon' => 'fas fa-microchip',
                    'details' => $faker->text()
                ];
                $service->store($data);

                $data = [
                    'title' => 'IoT and Industry 4.0 Integrations',
                    'icon' => 'fas fa-code-branch',
                    'details' => $faker->text()
                ];
                $service->store($data);
            } catch (\Throwable $th) {
                Log::error($th->getMessage());
            }

            try {
                //visitor table seed
                foreach (range(1, 72) as $index) {
                    $data = [
                        'tracking_id' => Str::random(30),
                        'is_new' => $faker->boolean(60),
                        'ip' => $faker->ipv4,
                        'is_desktop' => $faker->boolean(70),
                        'browser' => $faker->randomElement(['Chrome', 'Firefox', 'Safari', 'Opera', 'Edge']),
                        'platform' => $faker->randomElement(['Windows', 'OS X', 'AndroidOS', 'iOS']),
                        'location' => $faker->country,
                        'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                    ];
                    $visitor->forceStore($data);
                }
            } catch (\Throwable $th) {
                Log::error($th->getMessage());
            }

            try {
                //message table seed
                foreach (range(1, 17) as $index) {
                    $data = [
                        'name' => $faker->name(),
                        'email' => $faker->email,
                        'subject' => $faker->sentence(),
                        'body' => $faker->text(),
                        'replied' => $faker->boolean(60),
                        'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                    ];
                    $message->store($data);
                }
            } catch (\Throwable $th) {
                Log::error($th->getMessage());
            }
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }
    }
}