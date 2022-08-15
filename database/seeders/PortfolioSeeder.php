<?php

namespace Database\Seeders;

use CoreConstants;
use App\Services\Contracts\AboutInterface;
use App\Services\Contracts\EducationInterface;
use App\Services\Contracts\ExperienceInterface;
use App\Services\Contracts\MessageInterface;
use App\Services\Contracts\PortfolioConfigInterface;
use App\Services\Contracts\PublicationInterface;
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
            $publication = resolve(PublicationInterface::class);
            $project = resolve(ProjectInterface::class);
            $service = resolve(ServiceInterface::class);
            $visitor = resolve(VisitorInterface::class);
            $message = resolve(MessageInterface::class);

            //portfolio config table seed

            //template
            $data = [
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__TEMPLATE,
                'setting_value' => 'rigel',
                'default_value' => 'rigel',
            ];
            $portfolioConfig->insertOrUpdate($data);

            //accent color
            $data = [
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__ACCENT_COLOR,
                'setting_value' => '#144a96',
                'default_value' => '#144a96',
                //'setting_value' => '#1890ff',
                //'default_value' => '#1890ff',
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
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__VISIBILITY_PUBLICATION,
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
                    'name' => 'FJ Low Integration Codes',
                    'email' => 'support@fjlic.com',
                    'avatar' => 'assets/common/img/avatar/default.png',
                    'cover' => 'assets/common/img/cover/default.png',
                    'phone' => '52+ 33 3408 7192',
                    'address' => 'San Pedro Tlaquepaque, Jal.',
                    'description' => 'I am a technology enthusiast, I like to integrate technology with all kinds of applications. I am fascinated by creating hardware designs with specialized firmware to interfaces to integrate computing technologies such as: cloud applications, artificial intelligence, machine learning, mixed with the internet of things (IoT) and industry 4.0.',
                    'taglines' => ["I am Software and Hardware Engineer with a focus on Embedded Systems", "I am Technology Integration Engineer", "I am Full Stack Developer", "I am Francisco Flores"],
                    'social_links' => [
                        [
                            'title' => 'Documentation',
                            'iconClass' => 'fab fa-codepen',
                            'link' => 'https://fjlic.com/docs/1.0/overview'
                        ],
                        [
                            'title' => 'LinkedIn',
                            'iconClass' => 'fab fa-linkedin-in',
                            'link' => 'https://linkedin.com/in/francisco-javier-flores-zermeño'
                        ],
                        [
                            'title' => 'Github',
                            'iconClass' => 'fab fa-github',
                            'link' => 'https://github.com/fjlic/Fjlic-Cms'
                        ],
                        [
                            'title' => 'Twitter',
                            'iconClass' => 'fab fa-twitter',
                            'link' => 'https://twitter.com/fjlic'
                        ],
                        [
                            'title' => 'Facebook',
                            'iconClass' => 'fab fa-facebook',
                            'link' => 'https://facebook.com/FJLowIntegrationCodes'
                        ],
                        [
                            'title' => 'Mail',
                            'iconClass' => 'far fa-envelope',
                            'link' => 'mailto:support@fjlic.com'
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

                    $data = [
                        'institution' => 'National Institute of Astrophysics, Optics and Electronics National',
                        'period' => '2022-2022',
                        'degree' => 'Computer Science Engineering',
                        'cgpa' => '400 hour course',
                        'department' => 'Computer Science & Engineering',
                        'thesis' => 'Specialized Talent Development Program: Pre-silicon Verification Course'
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
                    'proficiency' => '90'
                ];
                $skill->store($data);

                $data = [
                    'name' => 'JavaScript and Frameworks',
                    'proficiency' => '80'
                ];
                $skill->store($data);

                $data = [
                    'name' => 'Python and Frameworks',
                    'proficiency' => '85'
                ];
                $skill->store($data);

                $data = [
                    'name' => 'NetCore and Frameworks',
                    'proficiency' => '70'
                ];
                $skill->store($data);

                $data = [
                    'name' => 'Linux kernel operating systems (Ubuntu, Debian, CentOs) and Windows (W-10, W-Server)',
                    'proficiency' => '90'
                ];
                $skill->store($data);

                $data = [
                    'name' => 'SQL, MySQL and NoSQL',
                    'proficiency' => '90'
                ];
                $skill->store($data);

                $data = [
                    'name' => 'Embedded Software',
                    'proficiency' => '85'
                ];
                $data = [
                    'name' => 'Modeling, Simulation, and Implementation on FPGAs',
                    'proficiency' => '75'
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
                    'company' => 'Galex Game',
                    'period' => '2019-2021',
                    'position' => 'IT Manager and Technology Integration Engineer ',
                    'details' => 'Management of technological projects derived from the design of hardware and software
                    applied for the company, support, follow up of the same, implementation of
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

            //publication table seed
            try {
                try {
                    //images
                    if (is_dir('public/assets/common/img/publications')) {
                        $dir = 'public/assets/common/img/publications';
                    } else {
                        $dir = 'assets/common/img/publications';
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
                    'title' => 'Academia Journals',
                    'categories' => ['article'],
                    'link' => 'https://ciateq.repositorioinstitucional.mx/jspui/handle/1020/543',
                    'details' => 'Title: Internet of Things (IoT) applications, approaches and trends: systematic literature review.  
                                  Published: 22 oct. 2021.  
                                  Resume: This article presents a systematic review of the literature to know the current state of the IoT, although it does not intend to cover all existing IoT topics at present, but tries to respond based on the published works and through the review of them, to obtain an understanding of the use of IoT descriptively through the following points to investigate: the applications that are developed, the approaches that are taken and what are the proposals put forward by experts on the subject without neglecting the current trends in the use of IoT in society, industry, and business.  
                                  Keywords: IoT, Industry 4.0, Artificial intelligence, Trends.',
                    'seeder_thumbnail' => 'assets/common/img/publications/demo_publication_1_1.png',
                    'seeder_images' => [
                        'assets/common/img/publications/demo_publication_1_1.png',
                        'assets/common/img/publications/demo_publication_1_2.png'
                    ]
                ];
                if (is_dir('public/assets/common/default/publications')) {
                    copy('public/assets/common/default/publications/demo_publication_1_1.png', $dir.'/demo_publication_1_1.png');
                    copy('public/assets/common/default/publications/demo_publication_1_2.png', $dir.'/demo_publication_1_2.png');
                } else {
                    copy('assets/common/default/publications/demo_publication_1_1.png', $dir.'/demo_publication_1_1.png');
                    copy('assets/common/default/publications/demo_publication_1_2.png', $dir.'/demo_publication_1_2.png');
                }
                
                $publication->store($data);

                $data = [
                    'title' => 'Micai',
                    'categories' => ['article'],
                    'link' => 'In Process',
                    'details' => 'Title: Implementation of Interface for Device and Smart IoT Platform Integration.  
                                  Published: 27 oct. 2021.  
                                  Resume: The implementation described in this document aims to show the parts that make up the construction of an intelligent IoT system. The system is adaptable to a number of technological applications that require sending information to the cloud.  
                                  Keywords: IoT, Intelligent System, Intelligent Device, API, Telemetry.',
                    'seeder_thumbnail' => 'assets/common/img/publications/demo_publication_2_1.png',
                    'seeder_images' => [
                        'assets/common/img/publications/demo_publication_2_1.png',
                        'assets/common/img/publications/demo_publication_2_2.png'
                    ]
                ];

                if (is_dir('public/assets/common/default/publications')) {
                    copy('public/assets/common/default/publications/demo_publication_2_1.png', $dir.'/demo_publication_2_1.png');
                    copy('public/assets/common/default/publications/demo_publication_2_2.png', $dir.'/demo_publication_2_2.png');
                } else {
                    copy('assets/common/default/publications/demo_publication_2_1.png', $dir.'/demo_publication_2_1.png');
                    copy('assets/common/default/publications/demo_publication_2_2.png', $dir.'/demo_publication_2_2.png');
                }

                $publication->store($data);

                $data = [
                    'title' => 'Ciniai',
                    'categories' => ['article'],
                    'link' => 'In Process',
                    'details' => 'Title: Intelligent IoT Platform to Predict Failures in the Reception of Equipment Te-lemetry Requests.  
                                  Published: 26 nov. 2021.  
                                  Resume: This paper presents an implementation of an IoT platform that shows the telemetry of equipment through temperature sensors, magnetic sensors, actuators and voltage detection, which allows the application of statistical and linear regression formulas to analyze the behavior and prediction in the reception of information from the elec-tronic device to the IoT platform.  
                                  Keywords: IoT, Sensors, Telemetry, Linear regression, Predictive maintenance.',
                    'seeder_thumbnail' => 'assets/common/img/publications/demo_publication_3_1.png',
                    'seeder_images' => [
                        'assets/common/img/publications/demo_publication_3_1.png',
                        'assets/common/img/publications/demo_publication_3_2.png'
                    ]
                ];
                
                if (is_dir('public/assets/common/default/publications')) {
                    copy('public/assets/common/default/publications/demo_publication_3_1.png', $dir.'/demo_publication_3_1.png');
                    copy('public/assets/common/default/publications/demo_publication_3_2.png', $dir.'/demo_publication_3_2.png');
                } else {
                    copy('assets/common/default/publications/demo_publication_3_1.png', $dir.'/demo_publication_3_1.png');
                    copy('assets/common/default/publications/demo_publication_3_2.png', $dir.'/demo_publication_3_2.png');
                }
                
                $publication->store($data);

                $data = [
                    'title' => 'CIATEQ, A.C.',
                    'categories' => ['thesis'],
                    'link' => 'https://ciateq.repositorioinstitucional.mx/jspui/handle/1020/569',
                    'details' => 'Title: Improvement proposal to develop an application model for IoT services in entertainment machines.  
                                  Published: 27 dec. 2021.  
                                  Resume: The purpose of the document is to describe the structure for the development of the detailed design of the IoT platform, the document shows the division of the IoT solution into individual software modules to show in a simple way the design of the solution. The purpose of the study is to test the effectiveness in sending information from an electronic device to an IoT system in the cloud, this requires a prototype of a modular type card, which will be integrated into the platform and thus send the telemetry collected from the video game machine.  
                                  Keywords: Internet of things(IoT), API, Data transmission devices.',
                    'seeder_thumbnail' => 'assets/common/img/publications/demo_publication_4_1.png',
                    'seeder_images' => [
                        'assets/common/img/publications/demo_publication_4_1.png',
                        'assets/common/img/publications/demo_publication_4_2.png'
                    ]
                ];
                
                if (is_dir('public/assets/common/default/publications')) {
                    copy('public/assets/common/default/publications/demo_publication_4_1.png', $dir.'/demo_publication_4_1.png');
                    copy('public/assets/common/default/publications/demo_publication_4_2.png', $dir.'/demo_publication_4_2.png');
                } else {
                    copy('assets/common/default/publications/demo_publication_4_1.png', $dir.'/demo_publication_4_1.png');
                    copy('assets/common/default/publications/demo_publication_4_2.png', $dir.'/demo_publication_4_2.png');
                }
                
                $publication->store($data);
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
                    'details' => 'IoT-Hotspot is a simple platform that applies Internet of Things (IoT) technology, strengthening it with a bit of statistics and an algorithm for machine learning (AI) focused on failure prediction and telemetry analysis of the devices. Data collected by the devices, using prototype cards, with these it was possible to give novel solutions to machines that required to communicate their current and operational status through the use of adaptable hardware, allowing their machines to send data To the cloud, our intention is to allow these alternative solutions to be replicated in other possible projects of a similar nature and thus contribute to the world by interconnecting electronic devices to the cloud.',
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
                    'details' => 'There are companies that require a system that allows them to interconnect their electronic devices to the cloud to provide more subtlety to their services, it also provides knowledge to those who are interested in the development and implementation, either in the construction of a Platform IoT with minimum requirements, or also in the case of carrying out the implementation for the design of IoT-oriented modular board prototypes. Although the information and implementation of the project is not limiting, it can be applied to any use, for this we have created a documentation that explains in an intuitive way how to build your own IoT project from scratch.',
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
                    'title' => 'Modular Prototype PCB for GPRS, GPS and WiFi',
                    'categories' => ['personal'],
                    'link' => 'https://hotspot.fjlic.com/docs/1.0/firmware-erb',
                    'details' => 'To develop the design of the modular prototype we prefer to use Fritzing, KiCad EDA open source, these softwares allow us to design two or four layer printed circuits, connect schematic diagrams, routing of printed circuits, it has support for full content libraries. with it we integrated modules with microcontrollers such as: Arduino Nano, ESP32 and A9G GPRS with GPS + SD Card that allowed us to send telemetry to the IoT platform, this was a two-layer design to validate the sending of telemetry.',
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
                    'details' => 'We understand that availability is important, thats why we acquire spaces in the cloud (VPS) with a strong infrastructure with companies such as Google Cloud, Amazon AWS, Digital Ocean, IONOS 1 and 1.'
                ];
                $service->store($data);

                $data = [
                    'title' => 'PCBS Design and Embedded Software',
                    'icon' => 'fas fa-microchip',
                    'details' => 'We understand that the prototypes of electronic cards for embedded systems are sometimes essential to validate projects with Hardware and Software in the best way, for this reason we use PcbWay, JlcPcb and KingPcb as supplier and manufacturer of pcbs to have the best quality and price in your assembled prototype in the shortest possible time.'
                ];
                $service->store($data);

                $data = [
                    'title' => 'IoT and Industry 4.0 Integrations',
                    'icon' => 'fas fa-code-branch',
                    'details' => 'Use interfaces to interconnect the prototype cards to the cloud through the use of Api-Rest or Web Sockets applying the Mqtt protocol.'
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
