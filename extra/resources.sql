-- Adminer 4.8.0 MySQL 8.0.23-0ubuntu0.20.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

INSERT INTO `resources` (`id`, `title`, `author`, `url`, `skills`, `percentage_completed`, `note`, `completed_at`, `priority_id`, `source_id`, `status_id`, `type_id`, `created_at`, `updated_at`) VALUES
(21,	'Building a shopping cart app with Laravel, Vue + Stripe',	'Andrew Schmelyun',	'https://www.youtube.com/watch?v=uUDxCUVkdLY',	'cart, ecommerce, vue, stripe',	NULL,	'14 videos. 3,481 views. Updated 12-31-2020',	NULL,	5,	7,	2,	1,	'2021-01-06 12:36:16',	'2021-01-06 12:36:16'),
(22,	'Building Blog With Laravel/Jetstream/InertiaJs on Backend and Vue/Tailwind on Frontend',	'Laratips',	'https://www.youtube.com/playlist?list=PL2DahmvUpeuuCgEC4fpp7GhmEZJqGJD7v',	'Laravel, Jetstream, InertiaJs, Vue, Tailwind',	NULL,	'29 videos. 2,857 views. Last updated on Dec 26, 2020',	NULL,	5,	7,	2,	1,	'2021-01-07 01:49:59',	'2021-01-07 01:49:59'),
(23,	'Todo List App with Laravel and Vue.js',	'Scrypster',	'https://www.youtube.com/watch?v=UHSipe7pSac&t=199s',	'laravel, vue',	NULL,	'6,564 views. Premiered Nov 20, 2020',	NULL,	4,	7,	1,	1,	'2021-01-07 05:40:12',	'2021-02-09 01:21:12'),
(24,	'PHP Laravel & Vue Js Tutorial 2021 - Customer Retail Management App Like Monday.com',	'Bolt Skills',	'https://www.youtube.com/watch?v=sH75VEfQKSc',	'laravel, vue, CRM',	NULL,	'554 views. Dec 14, 2020',	NULL,	4,	7,	2,	1,	'2021-01-07 05:52:12',	'2021-01-07 05:52:12'),
(25,	'Build a Movie App With Vue JS - A Vue 3 Beginners tutorial',	'Tyler Potts',	'https://www.youtube.com/watch?v=UHewcsv6uJY',	'laravel, vue, movie',	NULL,	'2,176 views. Jan 1, 2021',	NULL,	4,	7,	2,	1,	'2021-01-07 06:09:50',	'2021-01-07 06:09:50'),
(26,	'Build a Twitter UI Clone with Vue JS & TailwindCSS ~ Home Page',	'Tyler Potts',	'https://www.youtube.com/watch?v=eue3jbwxQS0',	'laravel, vue, tailwind',	NULL,	'811 views. Jan 4, 2021',	NULL,	4,	7,	2,	1,	'2021-01-07 06:19:36',	'2021-01-07 06:19:36'),
(27,	'Laravel Backup - How to Set up Automatic DB Backup in Laravel',	'QiroLab',	'https://www.youtube.com/watch?v=tKu7EqGgu_A',	'laravel, backup',	NULL,	'686 views. Premiered Dec 14, 2020',	NULL,	3,	7,	2,	1,	'2021-01-07 06:23:11',	'2021-01-07 06:23:11'),
(28,	'Media attachments with Laravel and InertiaJS',	'Constantin Druc',	'https://www.youtube.com/watch?v=-Sc7yVtdPCc',	'Laravel, InertiaJs, Vue',	NULL,	'492 views. Dec 14, 2020',	NULL,	5,	7,	2,	1,	'2021-01-07 06:25:06',	'2021-01-07 06:25:06'),
(29,	'Re-create Airbnb\'s Home Page with Tailwind CSS',	'Web-Crunch',	'https://www.youtube.com/watch?v=7phZqghhho0',	'design, tailwind',	NULL,	'15,933 views. Oct 30, 2019',	NULL,	4,	7,	2,	2,	'2021-01-07 06:31:44',	'2021-01-07 06:31:44'),
(30,	'Laravel 8: Jetstream + Inertia and Vue Walkthrough',	'Tech Chess',	'https://www.youtube.com/watch?v=XbkY8VM6EK4',	'Laravel, Jetstream, InertiaJs, Vue',	NULL,	'3,720 views. Oct 12, 2020',	NULL,	4,	7,	2,	1,	'2021-01-07 06:33:23',	'2021-01-07 06:33:23'),
(31,	'How to Add Stripe One-Time Payment Form to Laravel Project',	'Povilas Korop',	'https://blog.quickadminpanel.com/how-to-add-stripe-one-time-payment-form-to-laravel-project/',	'stripe',	NULL,	'November 15, 2020',	NULL,	5,	1,	2,	1,	'2021-01-07 06:34:48',	'2021-01-07 06:34:48'),
(32,	'Inertia.js for Laravel & Vue - Server Driven Single Page Apps',	'Andre Madarang',	'https://www.youtube.com/watch?v=JZDmBWRPWlw&t=1443s',	'Laravel, InertiaJs, Vue',	NULL,	'48,054 views. May 13, 2019',	NULL,	3,	7,	2,	1,	'2021-01-07 10:41:18',	'2021-01-07 10:41:18'),
(33,	'Getting Started with Vue 3: Composition API',	'Holly Lloyd',	'https://auth0.com/blog/getting-started-with-vue-3-composition-api/',	'vue3',	NULL,	'March 19, 2020',	NULL,	3,	1,	2,	1,	'2021-01-07 10:44:28',	'2021-01-07 10:44:28'),
(34,	'Ensuring Consistent Polymorphic Relationships with Laravel',	'Aaron Francis',	'https://aaronfrancis.com/2020/laravel-consistent-morphs?ref=laravelnews',	'Polymorphic',	NULL,	'OCTOBER 26, 2020',	NULL,	3,	1,	2,	1,	'2021-01-07 10:55:04',	'2021-01-07 10:55:04'),
(35,	'Building Laravel and Vue.js Web Apps',	'Michael Sullivan',	'https://www.lynda.com/Laravel-tutorials/Building-Laravel-Vue-js-Web-Apps/800211-2.html',	'laravel, vue',	NULL,	'Released 2/21/2019. Duration 2h 47m',	NULL,	3,	5,	2,	1,	'2021-01-07 10:59:45',	'2021-01-07 10:59:45'),
(36,	'Billing With Laravel Cashier',	'Andre Madarang',	'https://laracasts.com/series/billing-with-laravel-cashier',	'cashier',	NULL,	'7 episodes. 1h 29m',	NULL,	4,	4,	2,	1,	'2021-01-07 11:07:30',	'2021-01-07 11:07:30'),
(37,	'Build a Stock Tracker App',	'JEFFREY WAY',	'https://laracasts.com/series/build-a-stock-tracker-app',	'Detailed Console Output',	NULL,	'14 episodes. 2h 50m',	NULL,	4,	4,	2,	1,	'2021-01-07 11:11:09',	'2021-01-07 11:11:09'),
(38,	'Build a Twitter Clone',	'Alex Garrett',	'https://codecourse.com/courses/build-a-twitter-clone',	'laravel, vue',	NULL,	'10 hours 57 mins. Released March 2020',	NULL,	5,	3,	2,	1,	'2021-01-07 11:19:50',	'2021-01-07 11:19:50'),
(39,	'Super Fast Data Nesting',	'Alex Garrett',	'https://codecourse.com/courses/super-fast-data-nesting',	'comments',	NULL,	'9 lessons. 51 mins. Released 2019',	NULL,	5,	3,	2,	1,	'2021-01-07 11:24:27',	'2021-01-07 11:24:27'),
(40,	'Laravel Subscriptions',	'Alex Garrett',	'https://codecourse.com/courses/laravel-subscriptions-platform',	'cashier',	NULL,	'32 lessons. 3 hours 22 mins. Jun 2020',	NULL,	4,	3,	2,	1,	'2021-01-07 11:27:25',	'2021-01-07 11:27:25'),
(41,	'Vue Multiple File Drag & Drop Uploader',	'Alex Garrett',	'https://codecourse.com/courses/vue-multiple-file-drag-and-drop-uploader',	'vue, file upload',	NULL,	'19 lessons. 1 hour 47 mins. Released Jan 2020',	NULL,	4,	3,	2,	1,	'2021-01-07 11:29:56',	'2021-01-07 11:29:56'),
(42,	'Let\'s Build A Forum with Laravel and TDD',	'JEFFREY WAY',	'https://laracasts.com/series/lets-build-a-forum-with-laravel',	'laravel, vue',	NULL,	'102 episodes. 19h 29m. 2018',	NULL,	3,	4,	2,	1,	'2021-01-07 11:31:45',	'2021-01-07 11:31:45'),
(43,	'Full-Stack Vue.js 2 and Laravel 5',	'Anthony Gore',	'https://proquestcombo-safaribooksonline-com.mcpl.idm.oclc.org/book/web-development/9781788299589',	'laravel, vue',	NULL,	'December 28, 2017. 376 pages',	NULL,	4,	2,	2,	1,	'2021-01-07 11:34:10',	'2021-01-07 11:34:10'),
(44,	'The Liker Project 2.0',	'Alex Garrett',	'https://codecourse.com/courses/the-liker-project-2.0',	'laravel',	NULL,	'19 lessons. 2 hours 2 mins. Released Jan 2019',	NULL,	3,	3,	2,	1,	'2021-01-07 11:43:58',	'2021-01-07 11:43:58'),
(45,	'Rebuilding Allbirds.com with Tailwind CSS',	'Adam Wathan',	'https://www.youtube.com/watch?v=u2jiRjyUbwA',	'design, tailwind',	NULL,	'20,132 views. Streamed live on Nov 27, 2020',	NULL,	5,	7,	2,	2,	'2021-01-08 02:25:47',	'2021-01-08 02:25:47'),
(46,	'File upload with Laravel and VueJS',	'Arthur Henrique',	'https://blog.usejournal.com/file-upload-with-laravel-and-vuejs-a70ae85e34a1',	'file upload',	NULL,	'May 29, 2018 · 13 min read',	NULL,	4,	1,	2,	1,	'2021-01-08 09:22:16',	'2021-01-08 09:22:16'),
(47,	'Build a Laravel CRUD App with Authentication',	'Holly Lloyd',	'https://auth0.com/blog/build-a-laravel-6-app-with-authentication/?ref=laravelnews',	'auth, travel',	NULL,	'Last Updated On: March 12, 2020',	NULL,	3,	1,	2,	1,	'2021-01-08 09:24:05',	'2021-01-08 09:24:05'),
(48,	'File Upload in Laravel: The Ultimate Guide',	'Povilas Korop',	'https://blog.quickadminpanel.com/file-upload-in-laravel-the-ultimate-guide/',	'file upload',	NULL,	'December 20, 2017',	NULL,	4,	1,	2,	1,	'2021-01-08 09:25:36',	'2021-01-08 09:25:36'),
(49,	'Building a Kanban Board with Tailwind CSS',	'Adam Wathan',	'https://www.youtube.com/watch?v=_H38A6E8Nsg&t=152s',	'design, tailwind',	NULL,	'Streamed live on Nov 11, 2019',	NULL,	3,	7,	2,	2,	'2021-01-08 09:27:44',	'2021-01-08 09:27:44'),
(50,	'Smooth image upload and resize in laravel',	'Mohd Saqueib',	'https://www.qcode.in/smooth-image-upload-and-resize-in-laravel/',	'file upload',	NULL,	'September 24, 2018',	NULL,	3,	1,	2,	1,	'2021-01-08 09:29:42',	'2021-01-08 09:29:42'),
(51,	'Mail server DNS records - setup and configuration explained',	'The Digital Life',	'https://www.youtube.com/watch?v=o66UFsodUYo&feature=youtu.be',	'mail server',	100,	'3,465 views. Sep 20, 2020',	'2021-01-17',	5,	7,	1,	1,	'2021-01-08 11:51:39',	'2021-01-17 12:48:06'),
(52,	'Creating Category Input and Picker from Scratch using Vue 3',	'Code Tube',	'https://www.youtube.com/watch?v=er_0dIWE6T0',	'vue3, input picker',	NULL,	'450 views•Dec 12, 2020',	NULL,	4,	7,	2,	1,	'2021-01-09 00:58:22',	'2021-01-09 00:58:22'),
(53,	'Avatar image input component with VueJS, Inertia, and Tailwind CSS',	'Constantin Druc',	'https://www.youtube.com/watch?v=ubc6sqLA7EI',	'Laravel, InertiaJs, Vue',	100,	'212 views•Dec 30, 2020',	'2021-01-10',	5,	7,	1,	1,	'2021-01-10 09:35:20',	'2021-01-10 12:19:25'),
(54,	'Vue.js Scroll Progress Indicator',	'Yossi Abramov',	'https://yossiabramov.com/blog/vue-js-scroll-progress-indicator?ref=laravelnews',	'scroll, vue',	NULL,	'02/01/2021. 4 min read',	NULL,	3,	1,	2,	1,	'2021-01-11 01:46:56',	'2021-01-11 01:46:56'),
(55,	'From zero to full mail server in 20 minutes with Mailu Docker images!',	'Mohlmann Solutions',	'https://www.youtube.com/watch?v=ScarlmgD0dU',	'webmail hosting',	100,	'17,610 views•Oct 23, 2019',	'2021-01-17',	5,	7,	1,	3,	'2021-01-12 12:35:27',	'2021-01-17 12:41:35'),
(56,	'Build a Complete Responsive Website | HTML and CSS Tutorial',	'Julio Codes',	'https://www.youtube.com/watch?v=j_Xa7Kn59Es',	'design',	NULL,	'271,057 views•Aug 18, 2019',	NULL,	3,	7,	2,	2,	'2021-01-14 23:32:20',	'2021-01-14 23:32:20'),
(57,	'Build a Responsive Website | HTML, CSS Grid, Flexbox & More',	'Traversy Media',	'https://www.youtube.com/watch?v=p0bGHP-PXD4',	'design, Grid, Flexbox, animation',	NULL,	'209,676 views•Oct 23, 2020',	NULL,	3,	7,	2,	2,	'2021-01-14 23:34:21',	'2021-01-14 23:34:21'),
(58,	'How To Make Responsive Website | Animated Hamburger Menu | HTML & CSS | Step By Step Tutorial 2020',	'codeSTACKr',	'https://www.youtube.com/watch?v=nME3fE3c9Qw',	'design, Flexbox, animation, transition',	NULL,	'14,594 views•Sep 24, 2020',	NULL,	3,	7,	2,	2,	'2021-01-14 23:38:13',	'2021-01-14 23:38:13'),
(59,	'Let\'s Build: With Tailwind CSS - Movie Production Landing Page',	'Web-Crunch',	'https://www.youtube.com/watch?v=uo3i6HZiVMQ&list=PL01nNIgQ4uxMRCRuCHUKeIjVtNlviObLq&index=5',	'design, tailwind',	NULL,	'11,091 views. Jul 1, 2019',	NULL,	3,	7,	2,	2,	'2021-01-14 23:43:59',	'2021-01-14 23:43:59'),
(60,	'Rebuilding Meetup w/ Tailwind CSS v1.0',	'Andre Madarang',	'https://www.youtube.com/watch?v=ULe6yKJrFuI&t=189s',	'design, tailwind',	NULL,	'5,825 views May 27, 2019',	NULL,	2,	7,	2,	2,	'2021-01-14 23:54:45',	'2021-01-14 23:54:45'),
(61,	'Build a Gym Website Using The Tailwind Starter Kit',	'Traversy Media',	'https://www.youtube.com/watch?v=mO3aXUgjnIE',	'design, tailwind',	NULL,	'50,728 views. Oct 2, 2020',	NULL,	3,	7,	2,	2,	'2021-01-15 01:06:20',	'2021-01-15 01:06:20'),
(62,	'Build a Responsive Website with Animations | HTML 5 and CSS 3 Tutorial',	'Julio Codes',	'https://www.youtube.com/watch?v=FZQxPTV3cFk',	'design, restaurant',	NULL,	'235,098 views. Dec 8, 2019',	NULL,	4,	7,	2,	2,	'2021-01-15 01:07:34',	'2021-01-15 01:07:34'),
(63,	'Responsive Hotel Website',	'Julio Codes',	'https://www.youtube.com/playlist?list=PLu2kVjdzlY91fYpgiW44tZnMNvAx8Pra6',	'design, hotel',	NULL,	'4 videos. 6,635 views. Last updated on Oct 16, 2020',	NULL,	4,	7,	2,	2,	'2021-01-15 01:09:50',	'2021-01-15 01:09:50'),
(64,	'Modern Responsive Bootstrap 4 Animated Website',	'Julio Codes',	'https://www.youtube.com/playlist?list=PLu2kVjdzlY916VMzE78tkds7lYKlbIyFt',	'design, cake, animation',	NULL,	'5 videos. 8,868 views. Last updated on Feb 24, 2020',	NULL,	4,	7,	2,	2,	'2021-01-15 01:11:53',	'2021-01-15 01:11:53'),
(65,	'How To Make Website Using HTML CSS | Crete Full Website Step by Step Tutorial',	'Easy Tutorials',	'https://www.youtube.com/watch?v=lBfshkPlMW8',	'design, barber, animation',	NULL,	'115,937 views. Oct 13, 2020',	NULL,	3,	7,	2,	2,	'2021-01-15 01:13:53',	'2021-01-15 01:13:53'),
(66,	'How To Make A Website Using HTML CSS Bootstrap | Complete Website Design Tutorial',	'Easy Tutorials',	'https://www.youtube.com/watch?v=v0IgI8vYD_o',	'design',	NULL,	'606,409 views. Jan 18, 2019',	NULL,	2,	7,	2,	2,	'2021-01-15 02:07:07',	'2021-01-15 02:07:07'),
(67,	'Complete Responsive Blooger Website Using HTML/CSS',	'Daily Tuition',	'https://www.youtube.com/watch?v=CrSC1ZA9j0M',	'design',	NULL,	'780,851 views. Sep 24, 2019',	NULL,	2,	7,	2,	2,	'2021-01-15 02:16:40',	'2021-01-15 02:16:40'),
(68,	'Starbucks Landing Page Website Design using Html CSS & Javascript | Step By Step Web Design Tutorial',	'Online Tutorials',	'https://www.youtube.com/watch?v=91Q6RvKvd7o',	'design',	NULL,	'80,142 views. Nov 3, 2020',	NULL,	2,	7,	2,	2,	'2021-01-15 02:18:20',	'2021-01-15 02:18:20'),
(69,	'Complete Responsive Website from Scratch using Html CSS & Javascript | Mobile Friendly Website',	'Online Tutorials',	'https://www.youtube.com/watch?v=ac5nmWOkBEY',	'design, restaurant',	NULL,	'78,518 views. Oct 14, 2020',	NULL,	4,	7,	2,	2,	'2021-01-15 02:24:02',	'2021-01-15 02:24:02'),
(70,	'Your First Tailwind Website',	'Traversy Media',	'https://www.youtube.com/watch?v=NRagrTU_v8o',	'design, tailwind',	NULL,	'49,772 views. Aug 14, 2020',	NULL,	2,	7,	2,	2,	'2021-01-15 02:26:30',	'2021-01-15 02:26:30'),
(71,	'Build A Responsive Website With On Scroll Animations Using Editor X',	'Julio Codes',	'https://www.youtube.com/watch?v=F-CKVZVbLPM',	'design, editor x',	NULL,	'2,956 views. Dec 17, 2020',	NULL,	3,	7,	2,	2,	'2021-01-15 02:29:06',	'2021-01-15 02:29:06'),
(72,	'Responsive Ecommerce Website Using HTML CSS JAVASCRIPT (How To Make An e-commerce Website)',	'codevo',	'https://www.youtube.com/watch?v=lEarRTKXpGg',	'design, ecommerce',	NULL,	'55,753 views. Sep 4, 2020',	NULL,	4,	7,	2,	2,	'2021-01-15 02:35:19',	'2021-01-15 02:35:19'),
(73,	'Responsive Website Design Using HTML CSS And JavaScript | Website Restaurant Light/Dark mode',	'Bedimcode',	'https://www.youtube.com/watch?v=5RIFrZEjURA',	'design, restaurant',	NULL,	'42,121 views. Nov 26, 2020',	NULL,	4,	7,	2,	2,	'2021-01-15 02:36:58',	'2021-01-15 02:36:58'),
(74,	'Beautiful Responsive Login Form Using HTML, CSS & tailwindcss',	'Proud Creation',	'https://www.youtube.com/watch?v=nGywT5TP7Fk',	'login',	NULL,	'1,867 views. Apr 25, 2020',	NULL,	3,	7,	2,	2,	'2021-01-17 04:45:40',	'2021-01-17 04:45:40'),
(88,	'Blade Component Cookbook',	'JEFFREY WAY',	'https://laracasts.com/series/blade-component-cookbook',	'blade',	NULL,	'11 episodes. 2h 3m. Added 5 months ago',	NULL,	4,	4,	2,	1,	'2021-01-18 11:02:35',	'2021-01-18 11:02:35'),
(89,	'Advanced Laravel and Vue.js: Build a YouTube Clone',	'Kati Frantz',	'https://learning-oreilly-com.mcpl.idm.oclc.org/videos/advanced-laravel-and/9781800200449/9781800200449-video1_1',	'laravel, vue',	NULL,	'Youtube',	NULL,	5,	9,	2,	1,	'2021-01-20 02:08:03',	'2021-03-10 04:59:58'),
(90,	'￼Domain-Driven Laravel: Learn to Implement Domain-Driven Design Using Laravel',	'Jesse Griffin',	'https://learning-oreilly-com.mcpl.idm.oclc.org/library/view/domain-driven-laravel-learn/9781484260234/',	'Domain-Driven Design',	NULL,	'Release Date: October 2020',	NULL,	4,	2,	2,	1,	'2021-01-20 02:43:12',	'2021-01-20 02:43:12'),
(91,	'Hands-On Web Development with Vue.js',	'Roman Kuba',	'https://learning-oreilly-com.mcpl.idm.oclc.org/videos/hands-on-web-development/9781787283039',	'Vue',	NULL,	'Packt Publishing 2018, 6 chapters, 4h 55m',	NULL,	4,	9,	2,	1,	'2021-01-20 04:33:57',	'2021-01-20 04:33:57'),
(92,	'Laravel From Scratch',	'JEFFREY WAY',	'https://laracasts.com/series/laravel-6-from-scratch',	'laravel',	NULL,	'68 episodes. 8h 59m. LATEST EPISODE IN THIS SERIES added March 2020',	NULL,	4,	4,	2,	1,	'2021-01-22 11:19:29',	'2021-01-22 11:19:29'),
(93,	'Stripe Checkout & Customer Portal with Laravel Jetstream (Inertia)',	'Owen Conti',	'https://www.youtube.com/watch?v=RRCHnpqdsAs',	'Stripe',	NULL,	'60 views. Jan 25, 2021',	NULL,	5,	7,	2,	1,	'2021-01-26 12:21:01',	'2021-01-26 12:21:01'),
(94,	'Let\'s Build a Job Board with Laravel',	'Andrew Schmelyun',	'https://www.youtube.com/watch?v=NWr2H35jV9I',	'Jobs',	NULL,	'2,599 views. Streamed live on Jan 31, 2021',	NULL,	3,	7,	2,	1,	'2021-02-03 04:11:10',	'2021-02-03 04:11:10'),
(95,	'TastyIgniter: Open Source Restaurant Software',	'Paul Redmond',	'https://laravel-news.com/tastyigniter-open-source-restaurant-software',	'Restaurant',	NULL,	'February 5th, 2021\r\nhttps://github.com/tastyigniter/TastyIgniter\r\nhttps://tastyigniter.com/demo',	NULL,	4,	1,	2,	7,	'2021-02-10 06:24:10',	'2021-02-10 06:24:10'),
(96,	'Integrate PayPal Plus on Laravel 8',	'Laravel School',	'http://laravel-school.com/posts/integrate-paypal-plus-on-laravel-8-79?ref=laravelnews',	'PayPal',	NULL,	'20 Oct, 2020',	NULL,	4,	1,	2,	1,	'2021-02-15 12:59:20',	'2021-02-15 12:59:20'),
(97,	'Tailwind CSS: From Zero to Production',	'Tailwind Labs',	'https://www.youtube.com/playlist?list=PL5f_mz_zU5eXWYDXHUDOLBE0scnuJofO0',	'TailwindCSS',	NULL,	'9 videos. 14,806 views. Updated Feb 17, 2021',	NULL,	5,	7,	2,	2,	'2021-02-22 03:31:40',	'2021-02-22 03:31:40'),
(98,	'tastyigniter / TastyIgniter',	'Samuel Adepoyigi',	'https://github.com/tastyigniter/TastyIgniter',	'Restaurant',	NULL,	'Powerful, yet easy to use, open source restaurant online ordering, table reservation and restaurant management system',	NULL,	3,	6,	2,	1,	'2021-02-25 10:43:45',	'2021-02-25 10:43:45'),
(99,	'Building an Ecommerce Store with Laravel',	'CodingWithStef',	'https://www.youtube.com/playlist?list=PLTpd5KsiVlsDg5UiiPh5DRQ0XrQ2N_Lmu',	'ecommerce',	NULL,	'2 videos. 29 views. Updated Feb 24, 2021',	NULL,	4,	7,	2,	1,	'2021-02-25 10:46:00',	'2021-02-25 10:46:00'),
(100,	'Animated Scrolling Card with Tailwind: As Seen on Laravel News',	'Better Dev',	'https://www.youtube.com/watch?v=RICYdLm89Tg&feature=emb_logo',	'TailwindCSS, custom css, animated scrolling',	NULL,	'2,770 views. Feb 22, 2021',	NULL,	4,	7,	2,	2,	'2021-03-01 01:28:01',	'2021-03-01 01:28:01'),
(101,	'Vue JS Crash Course 2021',	'Traversy Media',	'https://www.youtube.com/watch?v=qZXt1Aom3Cs',	'Vuejs',	NULL,	'29,085 views. Feb 24, 2021',	NULL,	3,	7,	2,	1,	'2021-03-01 01:31:03',	'2021-03-01 01:31:03'),
(102,	'laravel-medialibrary',	'spatie',	'https://github.com/spatie/laravel-medialibrary',	'file upload',	NULL,	'Associate files with Eloquent models',	NULL,	3,	6,	2,	1,	'2021-03-08 03:42:23',	'2021-03-08 03:42:23'),
(106,	'Learning Vuex',	'Alexander Zanfir',	'https://www.lynda.com/Vue-js-tutorials/Learning-Vuex/2810943-2.html',	'Vue',	NULL,	'Skill Level Intermediate. 1h 15m Duration. Released: 7/12/2019',	NULL,	3,	5,	2,	1,	'2021-03-10 04:52:37',	'2021-03-10 04:52:37'),
(107,	'Vue.js: Creating and Hosting a Full-Stack Site',	'Shaun Wassell',	'https://www.lynda.com/Angular-tutorials/Vue-js-Creating-Hosting-Full-Stack-Site/2980055-2.html',	'Vue, Node, MongoDB, Hosting',	NULL,	'Skill Level Intermediate. 3h 46m Duration. Released: 10/27/2020',	NULL,	4,	5,	2,	1,	'2021-03-10 04:56:17',	'2021-03-10 04:56:17'),
(108,	'Vue.js for Web Designers',	'Joe Chellman',	'https://www.lynda.com/Vue-tutorials/Vue-js-Web-Designers/782145-2.html',	'Vue',	NULL,	'Skill Level Beginner. 1h 57m Duration. Released: 1/31/2019',	NULL,	3,	5,	2,	1,	'2021-03-10 04:58:28',	'2021-03-10 04:58:28'),
(109,	'Vue - The Road To Enterprise',	'Thomas Findlay',	'https://theroadtoenterprise.com/?utm_source=newsletter_vuedevs&utm_medium=email&utm_campaign=vue_the_road_to_enterprise',	'Vue 2 and Vue 3',	NULL,	'The book is written with a very hands-on approach',	NULL,	4,	2,	2,	1,	'2021-03-10 05:08:15',	'2021-03-10 05:08:15'),
(110,	'Front-End Development Projects with Vue.js',	'Raymond Camden, Hugo Di Francesco, Clifford Gurney, Philip Kirkbride, Maya Shavin',	'https://learning-oreilly-com.mcpl.idm.oclc.org/library/view/front-end-development-projects/9781838984823/',	'Vuejs',	NULL,	'Release Date: November 2020',	NULL,	4,	2,	2,	1,	'2021-03-10 05:13:17',	'2021-03-10 05:13:17'),
(111,	'Vue.js in Action',	'Ben Listwon, Erik Hanchett',	'https://learning-oreilly-com.mcpl.idm.oclc.org/library/view/vuejs-in-action/9781617294624/',	'Vuejs',	NULL,	'Vue.js in Action is your guide to building modern web apps. You’ll start by exploring the reactive UI model while you get comfortable with Vue’s unique features. Then, you’ll go deeper as you build a shopping cart with an admin interface and the ability to manage stock! Finally, you’ll extend your app, adding transitions, tests, and other key features until it’s production ready.',	NULL,	3,	2,	2,	1,	'2021-03-10 05:15:49',	'2021-03-10 05:15:49'),
(112,	'Vue.js 2 Academy: Learn Vue Step by Step',	'Chris Dixon',	'https://learning-oreilly-com.mcpl.idm.oclc.org/videos/vue-js-2-academy/9781838985455/',	'Vuejs',	NULL,	'Estimated time to complete: 8h 30m. Packt Publishing 2019',	NULL,	4,	9,	2,	1,	'2021-03-10 05:18:35',	'2021-03-10 05:18:35'),
(113,	'Getting to Know Vue.js: Learn to Build Single Page Applications in Vue from Scratch',	'Brett Nelson',	'https://learning-oreilly-com.mcpl.idm.oclc.org/library/view/getting-to-know/9781484237816/',	'Vuejs',	NULL,	'Release Date: August 2018',	NULL,	3,	2,	2,	1,	'2021-03-10 05:20:43',	'2021-03-10 05:20:43'),
(114,	'Vue.js 3 Cookbook',	'Heitor Ramon Ribeiro',	'https://learning-oreilly-com.mcpl.idm.oclc.org/library/view/vuejs-3-cookbook/9781838826222/',	'Vuejs',	NULL,	'Release Date: September 2020',	NULL,	3,	2,	2,	1,	'2021-03-10 05:21:59',	'2021-03-10 05:21:59'),
(115,	'Building Progressive Web Applications with Vue.js : Reliable, Fast, and Engaging Apps with Vue.js',	'Carlos Rojas',	'https://learning-oreilly-com.mcpl.idm.oclc.org/library/view/building-progressive-web/9781484253342/',	'Vuejs',	NULL,	NULL,	NULL,	3,	2,	2,	1,	'2021-03-10 05:24:43',	'2021-03-10 05:24:43'),
(116,	'Testing Vue.js Applications',	'Edd Yerburgh',	'https://learning-oreilly-com.mcpl.idm.oclc.org/library/view/testing-vuejs-applications/9781617295249/',	'Vuejs',	NULL,	'Release Date: January 2019. Discover effective testing methods for Vue applications.',	NULL,	3,	2,	2,	1,	'2021-03-10 05:25:43',	'2021-03-10 05:25:43'),
(117,	'Laravel: Up & Running, 2nd Edition',	'Matt Stauffer',	'https://learning-oreilly-com.mcpl.idm.oclc.org/library/view/laravel-up/9781492041207/',	'laravel',	NULL,	'Release Date: April 2019.',	NULL,	3,	2,	2,	1,	'2021-03-10 05:27:04',	'2021-03-10 05:27:04'),
(118,	'Learning Laravel\'s Eloquent',	'Francesco Malatesta',	'https://learning-oreilly-com.mcpl.idm.oclc.org/library/view/learning-laravels-eloquent/9781784391584/',	'laravel',	NULL,	'Release Date: July 2015',	NULL,	3,	2,	2,	1,	'2021-03-10 05:28:31',	'2021-03-10 05:28:31'),
(119,	'vue-js-modal',	'Yev Vlasenko euvl',	'https://github.com/euvl/vue-js-modal',	NULL,	NULL,	'Easy to use, highly customizable Vue.js modal library.',	NULL,	4,	6,	2,	8,	'2021-03-10 06:10:29',	'2021-03-10 06:10:29'),
(120,	'vue-numerals',	'Hugo Alliaume Kocal',	'https://github.com/Kocal/vue-numerals/tree/v3',	'Vuejs',	NULL,	'Use Numeral.js as a Vue filter to formatting numbers.',	NULL,	3,	6,	2,	8,	'2021-03-10 10:26:19',	'2021-03-10 10:26:19'),
(121,	'vue-moment',	'Brock Reece BrockReece',	'https://github.com/brockpetrie/vue-moment#readme',	'Vuejs',	NULL,	'Handy Moment.js filters for your Vue.js project.',	NULL,	3,	6,	2,	8,	'2021-03-10 10:45:56',	'2021-03-10 10:54:34'),
(122,	'vue-clickaway',	'Denis Karabaza simplesmiler',	'https://github.com/simplesmiler/vue-clickaway',	'Vuejs',	NULL,	'Reusable clickaway directive for reusable Vue.js components',	NULL,	3,	6,	2,	8,	'2021-03-10 10:48:25',	'2021-03-10 10:48:25'),
(123,	'vue-toastr',	'A.Kadir Mutlu s4l1h',	'https://github.com/s4l1h/vue-toastr',	'Vuejs',	NULL,	'Vuejs Toast : Plugin and Component Capability.',	NULL,	3,	6,	2,	8,	'2021-03-10 10:54:04',	'2021-03-10 10:54:04'),
(124,	'v-selectpage',	'Terry Zeng TerryZ',	'https://github.com/TerryZ/v-selectpage',	'Vuejs',	NULL,	'SelectPage for Vue2, list or table view of pagination, use tags for multiple selection, i18n and server side resources supports',	NULL,	3,	6,	2,	8,	'2021-03-10 10:57:12',	'2021-03-10 10:57:12'),
(125,	'Laravel-Excel',	'Patrick Brouwers patrickbrouwers',	'https://github.com/maatwebsite/Laravel-Excel',	'Excel',	NULL,	'Supercharged Excel exports and imports in Laravel',	NULL,	3,	6,	2,	8,	'2021-03-10 11:00:05',	'2021-03-10 11:04:02'),
(126,	'spatie/image',	'spatie',	'https://github.com/spatie/image',	'laravel',	NULL,	'Manipulate images with an expressive API',	NULL,	3,	6,	2,	8,	'2021-03-10 11:03:37',	'2021-03-10 11:03:37'),
(127,	'breeze',	'Laravel',	'https://github.com/laravel/breeze',	'laravel',	NULL,	'Breeze provides a minimal and simple starting point for building a Laravel application with authentication.',	NULL,	3,	6,	2,	8,	'2021-03-10 11:06:07',	'2021-03-10 11:06:07'),
(128,	'jetstream',	'Laravel',	'https://github.com/laravel/jetstream',	'laravel',	NULL,	'Laravel Jetstream is a beautifully designed application scaffolding for Laravel. Jetstream provides the perfect starting point for your next Laravel application and includes login, registration, email verification, two-factor authentication, session management, API support via Laravel Sanctum, and optional team management.',	NULL,	3,	6,	2,	8,	'2021-03-10 11:08:06',	'2021-03-10 11:08:06'),
(129,	'Cybersecurity for IT Professionals',	'Malcolm Shore',	'https://www.lynda.com/IT-tutorials/Cybersecurity-IT-Professionals/5016724-2.html',	'Security',	NULL,	'Skill Level Beginner. 2h 27m Duration. Released: 4/22/2019',	NULL,	3,	5,	2,	4,	'2021-03-10 12:34:20',	'2021-03-10 12:34:20'),
(130,	'Cybersecurity for Executives',	'Kip Boyle',	'https://www.lynda.com/IT-Infrastructure-tutorials/Cybersecurity-Executives/734650-2.html',	'Security',	NULL,	'Skill Level Intermediate. 1h 46m Duration. Released: 9/17/2018',	NULL,	3,	5,	2,	4,	'2021-03-10 12:36:15',	'2021-03-10 12:36:15'),
(131,	'Learning MongoDB',	'Justin Jenkins',	'https://www.lynda.com/MongoDB-tutorials/Learning-MongoDB/2835008-2.html',	'MongoDB',	NULL,	'Skill Level Beginner. 2h 22m Duration. Released: 8/27/2020',	NULL,	3,	5,	2,	5,	'2021-03-10 12:38:37',	'2021-03-10 12:38:37'),
(132,	'Leading Projects',	'Daniel Stanton',	'https://www.lynda.com/Project-Management-tutorials/Leading-Projects/483102-2.html',	NULL,	NULL,	'Skill Level Intermediate. 2h 11m Duration. Updated: 6/24/2020. Released: 12/20/2016',	NULL,	3,	5,	2,	6,	'2021-03-10 12:44:10',	'2021-03-10 12:44:10'),
(133,	'Critical Thinking',	'Mike Figliuolo',	'https://www.lynda.com/Business-Skills-tutorials/Critical-Thinking/424116-2.html',	'Leadership, Business Skills, Management',	NULL,	'Skill Level Intermediate. 59m 36s Duration. Updated: 10/6/2020. Released: 6/6/2016',	NULL,	3,	5,	2,	6,	'2021-03-10 12:46:13',	'2021-03-10 12:46:13'),
(134,	'Time Management Tips',	'Dave Crenshaw',	'https://www.lynda.com/Business-Software-tutorials/Time-Management-Tips-Weekly/440668-2.html',	'Productivity, Business Skills, Time Management',	NULL,	'Skill Level Intermediate. 7h 51m Duration. Updated: 4/15/2019. Released: 4/11/2016',	NULL,	3,	5,	2,	6,	'2021-03-10 12:49:31',	'2021-03-10 12:49:31'),
(135,	'Influencing Others',	'John Ullmen',	'https://www.lynda.com/Business-Skills-tutorials/Influencing-Others/148625-2.html',	'Business Skills, Career Development, Communication, Management, Leadership',	NULL,	'Skill Level Intermediate. 41m 49s Duration. Updated: 7/17/2019. Released: 4/21/2014',	NULL,	3,	5,	2,	6,	'2021-03-10 12:52:26',	'2021-03-10 12:52:26'),
(136,	'Improving Your Focus',	'Dave Crenshaw',	'https://www.lynda.com/Business-Software-tutorials/Improving-Your-Focus/533302-2.html',	'Business Skills, Marketing, Time Management',	NULL,	'Skill Level Intermediate. 56m 3s Duration. Released: 1/25/2017',	NULL,	3,	5,	2,	6,	'2021-03-10 12:55:04',	'2021-03-10 12:55:04'),
(137,	'Getting Things Done',	'David Allen',	'https://www.lynda.com/Business-Skills-tutorials/Getting-Things-Done/170776-2.html',	'Business Skills, Marketing, Productivity, Time Management',	NULL,	'Skill Level Beginner. 30m 11s Duration. Updated: 10/12/2018. Released: 5/22/2014',	NULL,	3,	7,	2,	1,	'2021-03-10 12:57:17',	'2021-03-10 12:57:17'),
(138,	'Social Media Marketing Foundations (2017)',	'Brian Honigman',	'https://www.lynda.com/Marketing-tutorials/Marketing-Foundations-Social-Media/567790-2.html',	'Marketing, Social Media Marketing',	NULL,	'Skill Level Beginner. 1h 56m Duration. Released: 6/19/2017',	NULL,	3,	5,	2,	6,	'2021-03-10 12:58:53',	'2021-03-10 13:04:26'),
(139,	'Improve SEO for Your Ecommerce Site',	'Sam Dey',	'https://www.lynda.com/Marketing-tutorials/Improve-SEO-Your-Ecommerce-Site/2817189-2.html',	'PPC, Advertising, SEM, SEO, Marketing',	NULL,	'Skill Level Intermediate. 55m 28s Duration. Released: 11/6/2019',	NULL,	3,	5,	2,	7,	'2021-03-10 13:06:58',	'2021-03-10 13:06:58'),
(140,	'Agile Software Development',	'Shashi Shekhar',	'https://www.lynda.com/Software-Development-tutorials/Agile-Software-Development/704138-2.html',	'Business Skills, Management',	NULL,	'Skill Level Beginner. 1h 53m Duration. Released: 6/25/2018',	NULL,	3,	5,	2,	6,	'2021-03-10 13:09:55',	'2021-03-10 13:09:55'),
(141,	'Agile at Work: Reporting with Agile Charts and Boards',	'Doug Rose',	'https://www.lynda.com/Business-Skills-tutorials/Agile-Work-Reporting-Agile-Charts-Boards/175962-2.html',	'Business Skills, Project Management',	NULL,	'Skill Level Beginner. 44m 22s Duration. Updated: 10/15/2019. Released: 12/11/2015',	NULL,	3,	5,	2,	6,	'2021-03-10 13:11:42',	'2021-03-10 13:11:42'),
(142,	'you need to learn Kubernetes RIGHT NOW!!',	'NetworkChuck',	'https://www.youtube.com/watch?v=7bA0gTroJjw',	'Kubernetes',	NULL,	'278,434 views. Sep 8, 2020',	NULL,	3,	7,	2,	3,	'2021-03-12 02:41:08',	'2021-03-12 02:42:28'),
(143,	'Kubernetes Tutorial for Beginners [FULL COURSE in 4 Hours]',	'TechWorld with Nana',	'https://www.youtube.com/watch?v=X48VuDVv0do',	'Kubernetes',	NULL,	'703,688 views. Nov 6, 2020',	NULL,	3,	7,	2,	3,	'2021-03-12 02:43:41',	'2021-03-12 02:43:41'),
(144,	'vue-observe-visibility',	'Guillaume Chau Akryum',	'https://github.com/Akryum/vue-observe-visibility#installation',	'Infinite Scroll',	NULL,	'Detect when an element is becoming visible or hidden on the page.',	NULL,	3,	6,	2,	1,	'2021-03-14 05:04:10',	'2021-03-14 05:04:10');

-- 2021-03-15 05:32:05