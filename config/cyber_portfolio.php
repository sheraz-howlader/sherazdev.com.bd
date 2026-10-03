<?php

return [
    'profile' => [
        'name' => 'Sheraz Howlader',
        'role' => 'Full Stack Developer & Infrastructure Engineer',
        'location' => 'Bangladesh',
        'email' => 'sheraz@zenexcloud.com',
        'tagline' => 'Building a better digital future...',
        'availability' => 'Open for Opportunities',
    ],

    'hero' => [
        'eyebrow' => 'Full Stack Developer & Cloud Infrastructure Engineer',
        'title' => 'Building systems behind the interface.',
        'description' => 'I build web applications, manage cloud infrastructure and solve complex production problems. From code to servers, I deliver scalable, reliable and secure solutions.',
    ],

    'metrics' => [
        ['value' => '5+', 'label' => 'Years Experience', 'icon' => 'fas fa-clock'],
        ['value' => '100+', 'label' => 'Hosting Environments', 'icon' => 'fas fa-server'],
        ['value' => '500+', 'label' => 'Websites Migrated', 'icon' => 'fas fa-layer-group'],
        ['value' => '99.9%', 'label' => 'Uptime Focus', 'icon' => 'fas fa-bullseye'],
        ['value' => '20+', 'label' => 'Projects Delivered', 'icon' => 'fas fa-briefcase'],
    ],

    'skills' => [
        ['name' => 'Laravel', 'icon' => 'fab fa-laravel'],
        ['name' => 'Next.js', 'icon' => 'fas fa-circle'],
        ['name' => 'Vue.js', 'icon' => 'fab fa-vuejs'],
        ['name' => 'Node.js', 'icon' => 'fab fa-node-js'],
        ['name' => 'PHP', 'icon' => 'fab fa-php'],
        ['name' => 'JavaScript', 'icon' => 'fab fa-js-square'],
        ['name' => 'TypeScript', 'icon' => 'fas fa-code'],
        ['name' => 'MySQL', 'icon' => 'fas fa-database'],
        ['name' => 'Linux', 'icon' => 'fab fa-linux'],
        ['name' => 'cPanel / WHM', 'icon' => 'fas fa-server'],
        ['name' => 'CloudLinux', 'icon' => 'fas fa-cloud'],
        ['name' => 'LiteSpeed', 'icon' => 'fas fa-bolt'],
        ['name' => 'WHMCS', 'icon' => 'fas fa-gears'],
        ['name' => 'Docker', 'icon' => 'fab fa-docker'],
        ['name' => 'AWS', 'icon' => 'fab fa-aws'],
        ['name' => 'VPS / Cloud', 'icon' => 'fas fa-cloud'],
        ['name' => 'BIND / PowerDNS', 'icon' => 'fas fa-globe'],
        ['name' => 'HAProxy', 'icon' => 'fas fa-network-wired'],
        ['name' => 'Imunify360', 'icon' => 'fas fa-shield-virus'],
        ['name' => 'Git', 'icon' => 'fab fa-git-alt'],
        ['name' => 'Bash', 'icon' => 'fas fa-terminal'],
    ],

    'projects' => [
        [
            'title' => 'ZenexCloud Platform',
            'description' => 'Complete hosting platform with WHMCS, provisioning and multi-server setup.',
            'image' => 'frontend/images/projects/6800ac314e403.jpg',
            'tags' => ['Laravel', 'WHMCS', 'Cloud'],
        ],
        [
            'title' => 'WHMCS Customization',
            'description' => 'Custom billing, product mapping and ERP integration with automation workflows.',
            'image' => 'frontend/images/projects/6800ae132c4f2.jpg',
            'tags' => ['PHP', 'MySQL', 'API'],
        ],
        [
            'title' => 'Server Migration',
            'description' => 'Large-scale migration of websites, databases, emails and DNS.',
            'image' => 'frontend/images/projects/680146f763cb5.jpg',
            'tags' => ['Linux', 'cPanel', 'Migration'],
        ],
        [
            'title' => 'Malware Monitoring',
            'description' => 'Automated monitoring and detection system for suspicious file changes.',
            'image' => 'frontend/images/projects/6801485000ca8.jpg',
            'tags' => ['Bash', 'Security', 'Automation'],
        ],
    ],

    'case_studies' => [
        [
            'title' => 'Recurrent Malware Infection',
            'description' => 'Detected and resolved malware injections across multiple WordPress sites.',
            'image' => 'frontend/images/projects/6800af26ca5c5.jpg',
            'tags' => ['Security', 'Linux', 'Imunify360'],
        ],
        [
            'title' => 'MySQL Connection Issues',
            'description' => 'Resolved “Too many connections” issue and optimized server performance.',
            'image' => 'frontend/images/projects/6800af9dbc4f3.jpg',
            'tags' => ['MySQL', 'Tuning', 'Monitoring'],
        ],
        [
            'title' => 'Softaculous Installation Errors',
            'description' => 'Fixed Softaculous 500 errors and plugin integration issues.',
            'image' => 'frontend/images/projects/6801485000ca8.jpg',
            'tags' => ['cPanel', 'Softaculous', 'Debugging'],
        ],
    ],

    'services' => [
        ['title' => 'Web Development', 'description' => 'Laravel, Next.js, Vue.js, PHP, Node.js', 'icon' => 'fab fa-laravel'],
        ['title' => 'Cloud Infrastructure', 'description' => 'VPS, S3, GPU, AWS, Server Management', 'icon' => 'fas fa-cloud-upload-alt'],
        ['title' => 'Server Administration', 'description' => 'Linux, cPanel, WHM, CloudLinux, LiteSpeed', 'icon' => 'fas fa-server'],
        ['title' => 'Security & Monitoring', 'description' => 'Imunify360, Malware Detection, Hardening', 'icon' => 'fas fa-shield-alt'],
        ['title' => 'DevOps & Automation', 'description' => 'Deployment, CI/CD, Monitoring, Backups', 'icon' => 'fas fa-robot'],
        ['title' => 'Billing & Hosting', 'description' => 'WHMCS, Stripe, ERP Automation', 'icon' => 'fas fa-file-invoice-dollar'],
        ['title' => 'DNS & Networking', 'description' => 'BIND, PowerDNS, HAProxy, Keepalived', 'icon' => 'fas fa-globe'],
        ['title' => 'Consulting', 'description' => 'Infrastructure planning, Migration, Optimization', 'icon' => 'fas fa-drafting-compass'],
    ],

    'journey' => [
        ['year' => '2021', 'title' => 'Learning & Exploration'],
        ['year' => '2022', 'title' => 'Web Development Projects'],
        ['year' => '2023', 'title' => 'Server & Infrastructure Management'],
        ['year' => '2024', 'title' => 'WHMCS & Automation'],
        ['year' => '2025', 'title' => 'Cloud & DevOps'],
        ['year' => '2026', 'title' => 'Scaling & Optimization'],
    ],
];
