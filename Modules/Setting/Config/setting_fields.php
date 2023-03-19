<?php

return [
  'app' => [
    'title' => 'General',
    'desc' => 'All the general settings for application.',
    'icon' => 'CogIcon',
    'elements' => [
      [
        'type' => 'text',// input fields type
        'data' => 'string',// data type, string, int, boolean
        'name' => 'general_app_name',// unique name for field
        'label' => 'General Name',// you know what label it is
        'placeholder' => 'General Name',
        'has_translate' => true,
        'rules' => 'nullable|min:2|max:350',// validation rule of laravel
        'class' => 'w-auto px-2',// any class for input
        'value' => 'General' // default value if you want
      ],
      [
        'type' => 'text',// input fields type
        'data' => 'string',// data type, string, int, boolean
        'name' => 'general_app_des',// unique name for field
        'label' => 'General Description',// you know what label it is
        'placeholder' => 'General Description',
        'has_translate' => true,
        'rules' => 'nullable|min:2|max:350',// validation rule of laravel
        'class' => 'w-auto px-2',// any class for input
        'value' => null // default value if you want
      ],
      [
        'type' => 'img',// input fields type
        'data' => 'img',// data type, string, int, boolean
        'file_types' => ['image'],
        'name' => 'global_navbar_logo',// unique name for field
        'label' => 'Logo',// you know what label it is
        'placeholder' => 'Logo',
        'width' => '52',
        'rules' => 'nullable|min:2|max:350',// validation rule of laravel
        'class' => 'w-auto px-2',// any class for input
        'value' => null // default value if you want
      ],
    ]
  ],
  'footer' => [
    'title' => 'Footer',
    'desc' => 'All the footer settings for application.',
    'icon' => 'CogIcon',
    'elements' => [

      [
        'type' => 'text',// input fields type
        'data' => 'string',// data type, string, int, boolean
        'name' => 'footer_copyright',// unique name for field
        'has_translate' => true,
        'label' => 'Copyright Text',// you know what label it is
        'placeholder' => 'Copyright Text',
        'rules' => 'nullable|min:2|max:350',// validation rule of laravel
        'class' => 'w-auto px-2',// any class for input
        'value' => '&copy; 2022 World Shipping Alliance (WSA). All rights reserved.' // default value if you want
      ],
      [
        'type' => 'img',// input fields type
        'data' => 'img',// data type, string, int, boolean
        'file_types' => ['image'],
        'name' => 'footer_logo',// unique name for field
        'label' => 'Logo',// you know what label it is
        'placeholder' => 'Logo',
        'width' => '52',
        'rules' => 'nullable|min:2|max:350',// validation rule of laravel
        'class' => 'w-auto px-2',// any class for input
        'value' => null // default value if you want
      ],
    ]
  ],

  'product_page' => [
    'title' => 'Product Page',
    'desc' => 'Product Page Title and Sub Title, Description',
    'icon' => 'CogIcon',
    'elements' => [

      [
        'type' => 'text',// input fields type
        'data' => 'string',// data type, string, int, boolean
        'name' => 'product_page_sub_title',// unique name for field
        'has_translate' => true,
        'label' => 'Sub title',// you know what label it is
        'placeholder' => 'sub Title',
        'rules' => 'nullable|min:2|max:350',// validation rule of laravel
        'class' => 'w-auto px-2',// any class for input
        'value' => 'Face Identification' // default value if you want
      ],
      [
        'type' => 'text',// input fields type
        'data' => 'string',// data type, string, int, boolean
        'name' => 'product_page_title',// unique name for field
        'has_translate' => true,
        'label' => 'Title',// you know what label it is
        'placeholder' => 'Title',
        'rules' => 'nullable|min:2|max:350',// validation rule of laravel
        'class' => 'w-auto px-2',// any class for input
        'value' => 'Products For Biometrics' // default value if you want
      ],
      [
        'type' => 'text',// input fields type
        'data' => 'string',// data type, string, int, boolean
        'name' => 'product_page_des',// unique name for field
        'label' => 'Description',// you know what label it is
        'placeholder' => 'Description',
        'has_translate' => true,
        'rules' => 'nullable|min:2|max:350',// validation rule of laravel
        'class' => 'w-auto px-2',// any class for input
        'value' => 'MODI products for biometric facial recognition are used everywhere where a personal, individual request or query must be made. In stadiums as a control and security system, in companies as working time recording, in hospitals or offices as a registration option. The application areas are numerous and always individually tailored to the needs of our customers.' // default value if you want
      ],
      [
        'type' => 'text',// input fields type
        'data' => 'string',// data type, string, int, boolean
        'name' => 'product_page_product_section_title',// unique name for field
        'has_translate' => true,
        'label' => 'product Section Title',// you know what label it is
        'placeholder' => 'product Section Title',
        'rules' => 'nullable|min:2|max:350',// validation rule of laravel
        'class' => 'w-auto px-2',// any class for input
        'value' => 'Our Products' // default value if you want
      ],
      [
        'type' => 'text',// input fields type
        'data' => 'string',// data type, string, int, boolean
        'name' => 'product_page_product_button_title',// unique name for field
        'has_translate' => true,
        'label' => 'product Button Title',// you know what label it is
        'placeholder' => 'product Button Title',
        'rules' => 'nullable|min:2|max:350',// validation rule of laravel
        'class' => 'w-auto px-2',// any class for input
        'value' => 'More Detials' // default value if you want
      ],
    ]
  ],

  'news_page' => [
    'title' => 'News Page',
    'desc' => 'News Page Title and Sub Title',
    'icon' => 'CogIcon',
    'elements' => [


      [
        'type' => 'text',// input fields type
        'data' => 'string',// data type, string, int, boolean
        'name' => 'news_page_title',// unique name for field
        'has_translate' => true,
        'label' => 'Title',// you know what label it is
        'placeholder' => 'Title',
        'rules' => 'nullable|min:2|max:350',// validation rule of laravel
        'class' => 'w-auto px-2',// any class for input
        'value' => 'News' // default value if you want
      ],
      [
        'type' => 'text',// input fields type
        'data' => 'string',// data type, string, int, boolean
        'name' => 'news_page_sub_title',// unique name for field
        'has_translate' => true,
        'label' => 'Sub title',// you know what label it is
        'placeholder' => 'sub Title',
        'rules' => 'nullable|min:2|max:350',// validation rule of laravel
        'class' => 'w-auto px-2',// any class for input
        'value' => 'OUR NEWS TO BIOMETRIC FACIAL RECOGNITION AND IDENTIFICATION' // default value if you want
      ],
    ]
  ],

  'social_media' => [
    'title' => 'Social Media',
    'desc' => 'All Social Media.',
    'icon' => 'CogIcon',
    'elements' => [
      [
        'type' => 'text',// input fields type
        'data' => 'string',// data type, string, int, boolean
        'name' => 'social_media_facebook',// unique name for field
        'label' => 'Social Media Facebook',// you know what label it is
        'placeholder' => 'Social Media Facebook',
        'rules' => 'nullable|min:2|max:350',// validation rule of laravel
        'class' => 'w-auto px-2',// any class for input
        'value' => '' // default value if you want
      ],
      [
        'type' => 'text',// input fields type
        'data' => 'string',// data type, string, int, boolean
        'name' => 'social_media_linkedin',// unique name for field
        'label' => 'Social Media Linkedin',// you know what label it is
        'placeholder' => 'Social Media Linkedin',
        'rules' => 'nullable|min:2|max:350',// validation rule of laravel
        'class' => 'w-auto px-2',// any class for input
        'value' => '' // default value if you want
      ],

    ]
  ],

  'subscribe' => [
    'title' => 'Subscribe',
    'desc' => 'All subscribe Needs.',
    'icon' => 'CogIcon',
    'elements' => [
      [
        'type' => 'text',// input fields type
        'data' => 'string',// data type, string, int, boolean
        'name' => 'subscribe_title',// unique name for field
        'label' => 'Subscribe Title',// you know what label it is
        'placeholder' => 'Subscribe Title',
        'rules' => 'nullable|min:2|max:350',// validation rule of laravel
        'class' => 'w-auto px-2',// any class for input
        'value' => 'Join the Modi Vision Experience ' // default value if you want
      ],
      [
        'type' => 'text',// input fields type
        'data' => 'string',// data type, string, int, boolean
        'name' => 'subscribe_sub_title',// unique name for field
        'label' => 'Subscribe Sub Title',// you know what label it is
        'placeholder' => 'Subscribe Sub Title',
        'rules' => 'nullable|min:2|max:350',// validation rule of laravel
        'class' => 'w-auto px-2',// any class for input
        'value' => 'Lorem ipsum dolor sit amet consectetur. In enim nec in elementum' // default value if you want
      ],
      [
        'type' => 'text', // input fields type
        'data' => 'string', // data type, string, int, boolean
        'name' => 'subscribe_sub_button_title', // unique name for field
        'label' => 'Button title', // you know what label it is
        'placeholder' => 'Button title',
        'has_translate' => true,
        'rules' => 'nullable|min:2|max:350', // validation rule of laravel
        'class' => 'w-auto px-2', // any class for input
        'value' => 'Subscribe Now' // default value if you want
    ],

    ]
  ],

  // 'one-to-one' => [
  //     'title' => 'One to One',
  //     'desc' => 'All the general settings for application.',
  //     'icon' => 'CogIcon',
  //     'elements' => [
  //         [
  //             'type' => 'radio', // input fields type
  //             'data' => 'boolean', // data type, string, int, boolean
  //             'name' => 'one_to_one_show', // unique name for field
  //             'label' => 'Show One to One Meetings List', // you know what label it is
  //             'placeholder' => 'Active',
  //             'rules' => '', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => false // default value if you want
  //         ],
  //         [
  //             'type' => 'radio', // input fields type
  //             'data' => 'boolean', // data type, string, int, boolean
  //             'name' => 'one_to_one_show_tables', // unique name for field
  //             'label' => 'Show Tables in One to One Meetings List', // you know what label it is
  //             'placeholder' => 'Active',
  //             'rules' => '', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => false // default value if you want
  //         ],
  //         [
  //             'type' => 'radio', // input fields type
  //             'data' => 'boolean', // data type, string, int, boolean
  //             'name' => 'one_to_one_close_reservation', // unique name for field
  //             'label' => 'Close the reservation before ** hours in One to One Meetings List', // you know what label it is
  //             'placeholder' => 'Active',
  //             'rules' => '', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => true // default value if you want
  //         ],

  //         [
  //             'type' => 'number', // input fields type
  //             'data' => 'int', // data type, string, int, boolean
  //             'name' => 'one_to_one_close_before', // unique name for field
  //             'label' => 'Close the reservation before', // you know what label it is
  //             'placeholder' => 'Close the reservation before',
  //             'rules' => 'nullable|min:1|max:2', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => 24 // default value if you want
  //         ],

  //     ]
  // ],

  'home' => [
    'title' => 'Home',
    'desc' => 'All the Home settings for application.',
    'icon' => 'HomeIcon',
    'section' => [
      'event_section' => [
        'title' => 'Event Section',
        'elements' => [
          [
            'type' => 'text',// input fields type
            'data' => 'string',// data type, string, int, boolean
            'name' => 'home_event_section_subtitle',// unique name for field
            'has_translate' => true,
            'label' => 'Sub Title',// you know what label it is
            'placeholder' => 'Sub Title',
            'rules' => 'nullable|min:2|max:350',// validation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => 'PASSENGER TERMINAL 2023' // default value if you want
          ],
          [
            'type' => 'text',// input fields type
            'data' => 'string',// data type, string, int, boolean
            'name' => 'home_event_section_title',// unique name for field
            'has_translate' => true,
            'label' => 'Title',// you know what label it is
            'placeholder' => 'Title',
            'rules' => 'nullable|min:2|max:350',// validation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => 'Save The Date' // default value if you want
          ],

          [
            'type' => 'text',// input fields type
            'data' => 'string',// data type, string, int, boolean
            'name' => 'home_event_section_localtion',// unique name for field
            'has_translate' => true,
            'label' => 'Localtion',// you know what label it is
            'placeholder' => 'Localtion',
            'rules' => 'nullable|min:2|max:350',// validation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => 'AMSTERDAM, NETHERLANDS' // default value if you want
          ],


          [
            'type' => 'text',// input fields type
            'data' => 'string',// data type, string, int, boolean
            'name' => 'home_event_section_date_from_to',// unique name for field
            'has_translate' => true,
            'label' => 'From Date to Date',// you know what label it is
            'placeholder' => 'From 14/03 - To 16/03 /2023',
            'rules' => 'nullable|min:2|max:350',// validation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => 'From 14/03 - To 16/03 /2023' // default value if you want
          ],



          [
            'type' => 'text',// input fields type
            'data' => 'string',// data type, string, int, boolean
            'name' => 'home_event_section_booth_no',// unique name for field
            'has_translate' => true,
            'label' => 'BOOTH No',// you know what label it is
            'placeholder' => 'BOOTH No. 1581',
            'rules' => 'nullable|min:2|max:350',// validation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => 'BOOTH No. 1581' // default value if you want
          ],
          [
            'type' => 'img',// input fields type
            'data' => 'img',// data type, string, int, boolean
            'name' => 'home_event_section_background_image',// unique name for field
            'file_types' => ['image'],

            'label' => 'Background Image',// you know what label it is
            'placeholder' => 'Background Image',
            'width' => '52',
            'rules' => 'nullable|min:2|max:350',// validation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => null // default value if you want
          ],
          [
            'type' => 'radio', // input fields type
            'data' => 'boolean', // data type, string, int, boolean
            'name' => 'home_event_section_show', // unique name for field
            'label' => 'Show Event Section', // you know what label it is
            'placeholder' => 'Active',
            'rules' => '', // validation rule of laravel
            'class' => 'w-auto px-2', // any class for input
            'value' => true // default value if you want
          ],
        ]
      ],

      'service_section' => [
        'title' => 'Service Section',
        'elements' => [

          [
            'type' => 'text',// input fields type
            'data' => 'string',// data type, string, int, boolean
            'name' => 'home_service_section_subtitle',// unique name for field
            'has_translate' => true,
            'label' => 'Sub Title',// you know what label it is
            'placeholder' => 'Sub Title',
            'rules' => 'nullable|min:2|max:350',// validation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => 'PASSENGER TERMINAL 2023' // default value if you want
          ],
          [
            'type' => 'text',// input fields type
            'data' => 'string',// data type, string, int, boolean
            'name' => 'home_service_section_title',// unique name for field
            'has_translate' => true,
            'label' => 'Title',// you know what label it is
            'placeholder' => 'Title',
            'rules' => 'nullable|min:2|max:350',// validation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => 'Save The Date' // default value if you want
          ],

          [
            'type' => 'textarea',// input fields type
            'data' => 'text',// data type, string, int, boolean
            'name' => 'home_service_section_description',// unique name for field
            'has_translate' => true,
            'label' => 'Description',// you know what label it is
            'placeholder' => 'Description',
            'rules' => 'nullable|min:1|max:350',// validation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => ' MODI Vision stands for safety, flexibility, robustness and user-friendliness.
            All products are MADE IN GERMANY, have been extensively tested and meet the strict EU standards' // default value if you want
          ],
          [
            'type' => 'radio', // input fields type
            'data' => 'boolean', // data type, string, int, boolean
            'name' => 'home_service_section_show', // unique name for field
            'label' => 'Show Service Section', // you know what label it is
            'placeholder' => 'Active',
            'rules' => '', // validation rule of laravel
            'class' => 'w-auto px-2', // any class for input
            'value' => true // default value if you want
          ],

        ]
      ],

      'product_section' => [
        'title' => 'Product Section',
        'elements' => [
          [
            'type' => 'text',// input fields type
            'data' => 'string',// data type, string, int, boolean
            'name' => 'home_product_section_title',// unique name for field
            'has_translate' => true,
            'label' => 'Title',// you know what label it is
            'placeholder' => 'Title',
            'rules' => 'nullable|min:2|max:350',// validation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => 'Products For Biometrics' // default value if you want
          ],
          [
            'type' => 'text',// input fields type
            'data' => 'string',// data type, string, int, boolean
            'name' => 'home_product_section_subtitle',// unique name for field
            'has_translate' => true,
            'label' => 'Sub Title',// you know what label it is
            'placeholder' => 'Sub Title',
            'rules' => 'nullable|min:2|max:350',// validation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => 'Face Identification' // default value if you want
          ],
          [
            'type' => 'textarea',// input fields type
            'data' => 'text',// data type, string, int, boolean
            'name' => 'home_product_section_description',// unique name for field
            'has_translate' => true,
            'label' => 'Description',// you know what label it is
            'placeholder' => 'Description',
            'rules' => 'nullable|min:1|max:350',// validation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => 'Each MODI product has been extensively tested and meets stringent EU standards. All products are Made in Germany.' // default value if you want
          ],
          [
              'type' => 'number', // input fields type
              'data' => 'int', // data type, string, int, boolean
              'name' => 'home_product_section_count', // unique name for field
              'label' => 'count', // you know what label it is
              'placeholder' => 'count',
              'rules' => 'nullable|min:1|max:350', // validation rule of laravel
              'class' => 'w-auto px-2', // any class for input
              'value' => 8 // default value if you want
          ],
          [
              'type' => 'text', // input fields type
              'data' => 'string', // data type, string, int, boolean
              'name' => 'home_product_section_button_title', // unique name for field
              'label' => 'Button title', // you know what label it is
              'placeholder' => 'Button title',
              'has_translate' => true,
              'rules' => 'nullable|min:2|max:350', // validation rule of laravel
              'class' => 'w-auto px-2', // any class for input
              'value' => 'Find Out More' // default value if you want
          ],
          [
            'type' => 'radio', // input fields type
            'data' => 'boolean', // data type, string, int, boolean
            'name' => 'home_product_section_show', // unique name for field
            'label' => 'Show Profuct Section', // you know what label it is
            'placeholder' => 'Active',
            'rules' => '', // validation rule of laravel
            'class' => 'w-auto px-2', // any class for input
            'value' => true // default value if you want
          ],
        ]
      ],

      'video_section' => [
        'title' => 'Video Section',
        'elements' => [
          [
            'type' => 'text',// input fields type
            'data' => 'string',// data type, string, int, boolean
            'name' => 'home_video_section_title',// unique name for field
            'has_translate' => true,
            'label' => 'Title',// you know what label it is
            'placeholder' => 'Title',
            'rules' => 'nullable|min:2|max:350',// validation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => 'NO STOP & GO,' // default value if you want
          ],
          [
            'type' => 'text',// input fields type
            'data' => 'string',// data type, string, int, boolean
            'name' => 'home_video_section_subtitle',// unique name for field
            'has_translate' => true,
            'label' => 'Sub Title',// you know what label it is
            'placeholder' => 'Sub Title',
            'rules' => 'nullable|min:2|max:350',// validation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => 'JUST SMILE AND PASS' // default value if you want
          ],
          [
              'type' => 'text', // input fields type
              'data' => 'string', // data type, string, int, boolean
              'name' => 'home_video_section_button_title', // unique name for field
              'label' => 'Button title', // you know what label it is
              'placeholder' => 'Button title',
              'has_translate' => true,
              'rules' => 'nullable|min:2|max:350', // validation rule of laravel
              'class' => 'w-auto px-2', // any class for input
              'value' => 'BIOMETRIC PRODUCTS' // default value if you want
          ],
          [
            'type' => 'img',// input fields type
            'data' => 'img',// data type, string, int, boolean
            'file_types' => ['image'],

            'name' => 'home_video_section_background_image',// unique name for field
            'label' => 'Background Image',// you know what label it is
            'placeholder' => 'Background Image',
            'width' => '52',
            'rules' => 'nullable|min:2|max:350',// validation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => null // default value if you want
          ],
          [
            'type' => 'img',// input fields type
            'data' => 'img',// data type, string, int, boolean
            'file_types' => ['video'],

            'name' => 'home_video_section_video',// unique name for field
            'label' => 'Video',// you know what label it is
            'placeholder' => 'Video',
            'width' => '52',
            'rules' => 'nullable|min:2|max:350',// va lidation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => null // default value if you want
          ],

          [
              'type' => 'radio', // input fields type
              'data' => 'boolean', // data type, string, int, boolean
              'name' => 'home_video_section_show', // unique name for field
              'label' => 'Show Video Section', // you know what label it is
              'placeholder' => 'Active',
              'rules' => '', // validation rule of laravel
              'class' => 'w-auto px-2', // any class for input
              'value' => true // default value if you want
          ],
        ]
      ],

      'news_section' => [
        'title' => 'News Section',
        'elements' => [
          [
            'type' => 'text',// input fields type
            'data' => 'string',// data type, string, int, boolean
            'name' => 'home_news_section_title',// unique name for field
            'has_translate' => true,
            'label' => 'Title',// you know what label it is
            'placeholder' => 'Title',
            'rules' => 'nullable|min:2|max:350',// validation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => 'our latest news' // default value if you want
          ],
          [
            'type' => 'text',// input fields type
            'data' => 'string',// data type, string, int, boolean
            'name' => 'home_news_section_subtitle',// unique name for field
            'has_translate' => true,
            'label' => 'Sub Title',// you know what label it is
            'placeholder' => 'Sub Title',
            'rules' => 'nullable|min:2|max:350',// validation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => 'Latest Thinking' // default value if you want
          ],
          [
            'type' => 'radio', // input fields type
            'data' => 'boolean', // data type, string, int, boolean
            'name' => 'home_news_section_show', // unique name for field
            'label' => 'Show Profuct Section', // you know what label it is
            'placeholder' => 'Active',
            'rules' => '', // validation rule of laravel
            'class' => 'w-auto px-2', // any class for input
            'value' => true // default value if you want
          ],
        ]
      ],

      // 'wsa_elite_conference' => [
      //     'title' => 'WSA Elite Conference',
      //     'elements' => [
      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'home_wsa_elite_conference_title', // unique name for field
      //             'label' => 'Title', // you know what label it is
      //             'placeholder' => 'Title',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'WSA Elite Conference' // default value if you want
      //         ],
      //         [
      //             'type' => 'textarea', // input fields type
      //             'data' => 'text', // data type, string, int, boolean
      //             'name' => 'home_wsa_elite_conference_des', // unique name for field
      //             'label' => 'Descriptions', // you know what label it is
      //             'placeholder' => 'Descriptions',
      //             'rules' => 'nullable|min:2|max:2500', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'We would like to thank you for your continuous support in helping us to contribute to a reliable and unique communication for all members of the network, and to become stronger and stronger over time.</br>
      //                         It is our pleasure to announce that we will be hosting our In-Person Conference, on Sept 7-11, 2022 at Hilton Istanbul Bomonti, Istanbul Turkey.</br>
      //                         Its mutual benefits from your attendance will be reflected in increasing your company\'s efficiency rates while expanding your international business opportunities in the field of shipping, especially in light of the current difficult conditions that the world is going through due to the COVID 19.' // default value if you want
      //         ],
      //         [
      //             'type' => 'list', // input fields type
      //             'data' => 'array', // data type, string, int, boolean
      //             'name' => 'home_wsa_elite_conference_items', // unique name for field
      //             'label' => 'Items', // you know what label it is
      //             'placeholder' => 'Items',
      //             'rules' => 'nullable|array', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => [], // default value if you want
      //             'inputs' => [
      //                 [
      //                     'type' => 'text', // input fields type
      //                     'data' => 'string', // data type, string, int, boolean
      //                     'name' => 'title', // unique name for field
      //                     'label' => 'Title', // you know what label it is
      //                     'placeholder' => 'Title',
      //                     'width' => '8',
      //                     'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //                     'class' => 'w-auto px-2', // any class for input
      //                 ],
      //                 [
      //                     'type' => 'textarea', // input fields type
      //                     'data' => 'text', // data type, string, int, boolean
      //                     'name' => 'des', // unique name for field
      //                     'label' => 'Description', // you know what label it is
      //                     'placeholder' => 'Description',
      //                     'width' => '64',
      //                     'rules' => 'nullable|min:2|max:9000', // validation rule of laravel
      //                     'class' => 'w-auto px-2', // any class for input
      //                 ],
      //                 [
      //                     'type' => 'img', // input fields type
      //                     'data' => 'img', // data type, string, int, boolean
      //                     'name' => 'icon', // unique name for field
      //                     'label' => 'Icon', // you know what label it is
      //                     'placeholder' => 'Icon',
      //                     'width' => '52',
      //                     'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //                     'class' => 'w-auto px-2', // any class for input
      //                 ],
      //             ]
      //         ],
      //     ]
      // ],
      // 'wsa_consolidation' => [
      //     'title' => 'WSA Consolidation',
      //     'elements' => [
      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'home_wsa_consolidation_title', // unique name for field
      //             'label' => 'Title', // you know what label it is
      //             'placeholder' => 'Title',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'World Shipping Alliance' // default value if you want
      //         ],
      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'home_wsa_consolidation_sub_title', // unique name for field
      //             'label' => 'Sub Title', // you know what label it is
      //             'placeholder' => 'Sub Title',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'Consolidation' // default value if you want
      //         ],
      //         [
      //             'type' => 'textarea', // input fields type
      //             'data' => 'text', // data type, string, int, boolean
      //             'name' => 'home_wsa_consolidation_des', // unique name for field
      //             'label' => 'Descriptions', // you know what label it is
      //             'placeholder' => 'Descriptions',
      //             'rules' => 'nullable|min:2|max:2500', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'WSA CONSOL is an independent worldwide network for specific and selected leading consolidators. who offer much flexibility in transport planning and have the potential to efficiently consolidate goods, even if these goods have distinct pickup locations and destinations with proven experience in handling many types of consolidation and LCL issues, WSA CONSOL will immediately connect you to a large network of reliable presence members/agents' // default value if you want
      //         ],
      //         [
      //             'type' => 'list', // input fields type
      //             'data' => 'array', // data type, string, int, boolean
      //             'name' => 'home_wsa_consolidation_buttons', // unique name for field
      //             'label' => 'Buttons', // you know what label it is
      //             'placeholder' => 'Buttons',
      //             'rules' => 'nullable|array', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => [], // default value if you want
      //             'inputs' => [
      //                 [
      //                     'type' => 'text', // input fields type
      //                     'data' => 'string', // data type, string, int, boolean
      //                     'name' => 'title', // unique name for field
      //                     'label' => 'Title', // you know what label it is
      //                     'placeholder' => 'Title',
      //                     'width' => '8',
      //                     'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //                     'class' => 'w-auto px-2', // any class for input
      //                 ],
      //                 [
      //                     'type' => 'text', // input fields type
      //                     'data' => 'string', // data type, string, int, boolean
      //                     'name' => 'link', // unique name for field
      //                     'label' => 'Link', // you know what label it is
      //                     'placeholder' => 'Link',
      //                     'width' => '64',
      //                     'rules' => 'nullable|min:2|max:9000', // validation rule of laravel
      //                     'class' => 'w-auto px-2', // any class for input
      //                 ],
      //                 [
      //                     'type' => 'img', // input fields type
      //                     'data' => 'img', // data type, string, int, boolean
      //                     'name' => 'icon', // unique name for field
      //                     'label' => 'Icon', // you know what label it is
      //                     'placeholder' => 'Icon',
      //                     'width' => '52',
      //                     'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //                     'class' => 'w-auto px-2', // any class for input
      //                 ],
      //             ]
      //         ],
      //     ]
      // ],
      // 'why_choose_wsa_consol' => [
      //     'title' => 'Why Choose WSA Consol',
      //     'elements' => [
      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'home_why_choose_wsa_consol_title', // unique name for field
      //             'label' => 'Title', // you know what label it is
      //             'placeholder' => 'Title',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'Why Choose WSA Consol' // default value if you want
      //         ],
      //         [
      //             'type' => 'textarea', // input fields type
      //             'data' => 'text', // data type, string, int, boolean
      //             'name' => 'home_why_choose_wsa_consol_des', // unique name for field
      //             'label' => 'Descriptions', // you know what label it is
      //             'placeholder' => 'Descriptions',
      //             'rules' => 'nullable|min:2|max:2500', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'As a specific partner in WSA CONSOL We will help you to contribute with' // default value if you want
      //         ],
      //         [
      //             'type' => 'list', // input fields type
      //             'data' => 'array', // data type, string, int, boolean
      //             'name' => 'home_why_choose_wsa_consol_items', // unique name for field
      //             'label' => 'Items', // you know what label it is
      //             'placeholder' => 'Items',
      //             'rules' => 'nullable|array', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => [], // default value if you want
      //             'inputs' => [
      //                 [
      //                     'type' => 'text', // input fields type
      //                     'data' => 'string', // data type, string, int, boolean
      //                     'name' => 'title', // unique name for field
      //                     'label' => 'Title', // you know what label it is
      //                     'placeholder' => 'Title',
      //                     'width' => '8',
      //                     'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //                     'class' => 'w-auto px-2', // any class for input
      //                 ],
      //                 [
      //                     'type' => 'textarea', // input fields type
      //                     'data' => 'text', // data type, string, int, boolean
      //                     'name' => 'des', // unique name for field
      //                     'label' => 'Descriptions', // you know what label it is
      //                     'placeholder' => 'Descriptions',
      //                     'width' => '64',
      //                     'rules' => 'nullable|min:2|max:9000', // validation rule of laravel
      //                     'class' => 'w-auto px-2', // any class for input
      //                 ],
      //             ]
      //         ],
      //     ]
      // ],
      // 'video' => [
      //     'title' => 'WSA Video',
      //     'elements' => [
      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'home_wsa_video_title', // unique name for field
      //             'label' => 'Title', // you know what label it is
      //             'placeholder' => 'Title',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'We can\'t wait to see you in Istanbul!' // default value if you want
      //         ],
      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'home_wsa_video_link', // unique name for field
      //             'label' => 'Link', // you know what label it is
      //             'placeholder' => 'Link',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'https://www.youtube.com/embed/iji83QXYVXU' // default value if you want
      //         ],
      //     ]
      // ],
      // 'venue_section' => [
      //     'title' => 'Venue Section',
      //     'elements' => [
      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'home_venue_section_title', // unique name for field
      //             'label' => 'Title', // you know what label it is
      //             'placeholder' => 'Title',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'Hilton Istanbul Bomonti Hotel' // default value if you want
      //         ],
      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'home_venue_section_sub_title', // unique name for field
      //             'label' => 'Sub Title', // you know what label it is
      //             'placeholder' => 'Sub Title',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'Venue:<span class="font-architects-daughter text-blue-600 normal-case"> Istanbul, Turkey</span>' // default value if you want
      //         ],
      //         [


      //             'type' => 'textarea', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'home_venue_section_des', // unique name for field
      //             'label' => 'Descriptions', // you know what label it is
      //             'placeholder' => 'Descriptions',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => '34-story hotel and conference center is across from Bomontiada. Nişantaşı shopping and metro links to Taksim Square are less than two kilometers away, and Dolmabahçe Palace and the European shore are four kilometers away....' // default value if you want
      //         ],
      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'home_venue_section_button_text', // unique name for field
      //             'label' => 'Button text', // you know what label it is
      //             'placeholder' => 'Button text',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'Read More...' // default value if you want
      //         ],
      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'home_venue_section_button_link', // unique name for field
      //             'label' => 'Button link', // you know what label it is
      //             'placeholder' => 'Button link',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'https://wsa-events.com/hotel' // default value if you want
      //         ],
      //         [
      //             'type' => 'img', // input fields type , img ,  text , list
      //             'data' => 'img', // data type, string, int, boolean
      //             'name' => 'home_venue_section_img', // unique name for field
      //             'label' => 'Img', // you know what label it is
      //             'placeholder' => 'Img',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => null // default value if you want
      //         ],
      //         [
      //             'type' => 'list', // input fields type
      //             'data' => 'array', // data type, string, int, boolean
      //             'name' => 'home_venue_section_items', // unique name for field
      //             'label' => 'Items', // you know what label it is
      //             'placeholder' => 'Items',
      //             'rules' => 'nullable|array', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'a:5:{i:0;a:1:{s:5:"title";s:26:"Meeting & Conference Rooms";}i:1;a:1:{s:5:"title";s:25:"Spa & Indoor/Outdoor Pool";}i:2;a:1:{s:5:"title";s:16:"Executive lounge";}i:3;a:1:{s:5:"title";s:21:"5 starts Room service";}i:4;a:1:{s:5:"title";s:34:"Social Hub of Music, Food, and Art";}}', // default value if you want
      //             'inputs' => [
      //                 [
      //                     'type' => 'text', // input fields type
      //                     'data' => 'string', // data type, string, int, boolean
      //                     'name' => 'title', // unique name for field
      //                     'label' => 'Title', // you know what label it is
      //                     'placeholder' => 'Title',
      //                     'width' => '96',
      //                     'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //                     'class' => 'w-auto px-2', // any class for input
      //                 ],
      //             ]
      //         ],
      //     ]
      // ],
      // 'login_section' => [
      //     'title' => 'Login Section',
      //     'elements' => [
      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'home_login_section_title', // unique name for field
      //             'label' => 'Title', // you know what label it is
      //             'placeholder' => 'Title',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'Apply Now' // default value if you want
      //         ],
      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'home_login_section_sub_title', // unique name for field
      //             'label' => 'Sub Title', // you know what label it is
      //             'placeholder' => 'Sub Title',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'Join WSA Elite Conference 2022' // default value if you want
      //         ],

      //         [
      //             'type' => 'radio', // input fields type
      //             'data' => 'boolean', // data type, string, int, boolean
      //             'name' => 'home_login_section_show', // unique name for field
      //             'label' => 'Show Login Section', // you know what label it is
      //             'placeholder' => 'Active',
      //             'rules' => '', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => true // default value if you want
      //         ],

      //     ]
      // ],
      // 'sponsors_section' => [
      //     'title' => 'Sponsors Section',
      //     'elements' => [
      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'home_sponsors_section_title', // unique name for field
      //             'label' => 'Title', // you know what label it is
      //             'placeholder' => 'Title',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'Sponsors' // default value if you want
      //         ],
      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'home_sponsors_section_sub_title', // unique name for field
      //             'label' => 'Sub Title', // you know what label it is
      //             'placeholder' => 'Sub Title',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'World Shipping Alliance Elite Conference 2022, Istanbul Sponsors.' // default value if you want
      //         ],


      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'home_sponsors_section_button_text', // unique name for field
      //             'label' => 'Button text', // you know what label it is
      //             'placeholder' => 'Button text',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'Read More' // default value if you want
      //         ],

      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'home_sponsors_section_button_link', // unique name for field
      //             'label' => 'Button link', // you know what label it is
      //             'placeholder' => 'Button link',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'https://wsa-events.com/conference/sponsors' // default value if you want
      //         ],


      //         [
      //             'type' => 'radio', // input fields type
      //             'data' => 'boolean', // data type, string, int, boolean
      //             'name' => 'home_sponsors_section_show', // unique name for field
      //             'label' => 'Show sponsors Section', // you know what label it is
      //             'placeholder' => 'Active',
      //             'rules' => '', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => true // default value if you want
      //         ],

      //     ]
      // ],
      // 'recent_member' => [
      //     'title' => 'Recent Member',
      //     'elements' => [
      //         [
      //             'type' => 'radio', // input fields type
      //             'data' => 'boolean', // data type, string, int, boolean
      //             'name' => 'recent_registered_members_show', // unique name for field
      //             'label' => 'Show Recent Registered members', // you know what label it is
      //             'placeholder' => 'Active',
      //             'rules' => '', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => false // default value if you want
      //         ],

      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'recent_registered_members_section_button_text', // unique name for field
      //             'label' => 'Button text', // you know what label it is
      //             'placeholder' => 'Button text',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'Show More' // default value if you want
      //         ],

      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'recent_registered_members_section_button_link', // unique name for field
      //             'label' => 'Button link', // you know what label it is
      //             'placeholder' => 'Button link',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'https://wsa-events.com/conference/recent-members' // default value if you want
      //         ],

      //     ]
      // ],
    ]

  ],


  'about_us' => [
    'title' => 'About Us',
    'desc' => 'All the AboutUs settings for application.',
    'icon' => 'AboutUsIcon',
    'section' => [
      'slider_one_section' => [
        'title' => 'Slider One Section',
        'elements' => [
          [
            'type' => 'text',// input fields type
            'data' => 'string',// data type, string, int, boolean
            'name' => 'about_us_slider_one_section_title',// unique name for field
            'has_translate' => true,
            'label' => 'Title',// you know what label it is
            'placeholder' => 'Title',
            'rules' => 'nullable|min:2|max:350',// validation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => 'WELCOME TO THE PAPERLESS AIRPORT' // default value if you want
          ],
          [
            'type' => 'textarea',// input fields type
            'data' => 'text',// data type, string, int, boolean
            'name' => 'about_us_slider_one_section_description',// unique name for field
            'has_translate' => true,
            'label' => 'Description',// you know what label it is
            'placeholder' => 'Description',
            'rules' => 'nullable|min:1|max:350',// validation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => 'MODI Vision is a leader in providing biometric systems and identity validation tools for commercial and government applications around the world.' // default value if you want
          ],
          [
            'type' => 'img',// input fields type
            'data' => 'img',// data type, string, int, boolean
            'file_types' => ['image'],

            'name' => 'about_us_slider_one_section_title_image',// unique name for field
            'label' => 'Background Image',// you know what label it is
            'placeholder' => 'Background Image',
            'width' => '52',
            'rules' => 'nullable|min:2|max:350',// validation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => null // default value if you want
          ],
          [
            'type' => 'radio', // input fields type
            'data' => 'boolean', // data type, string, int, boolean
            'name' => 'about_us_slider_one_section_title_show', // unique name for field
            'label' => 'Show Event Section', // you know what label it is
            'placeholder' => 'Active',
            'rules' => '', // validation rule of laravel
            'class' => 'w-auto px-2', // any class for input
            'value' => true // default value if you want
          ],
        ]
      ],
      'slider_two_section' => [
        'title' => 'Slider Two Section',
        'elements' => [
          [
            'type' => 'text',// input fields type
            'data' => 'string',// data type, string, int, boolean
            'name' => 'about_us_slider_two_section_title',// unique name for field
            'has_translate' => true,
            'label' => 'Title',// you know what label it is
            'placeholder' => 'Title',
            'rules' => 'nullable|min:2|max:350',// validation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => 'Facial recognition' // default value if you want
          ],
          [
            'type' => 'text',// input fields type
            'data' => 'string',// data type, string, int, boolean
            'name' => 'about_us_slider_two_section_subtitle',// unique name for field
            'has_translate' => true,
            'label' => 'Sub Title',// you know what label it is
            'placeholder' => 'Sub Title',
            'rules' => 'nullable|min:2|max:350',// validation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => '“ON THE MOVE”' // default value if you want
          ],
          [
            'type' => 'textarea',// input fields type
            'data' => 'text',// data type, string, int, boolean
            'name' => 'about_us_slider_two_section_description',// unique name for field
            'has_translate' => true,
            'label' => 'Description',// you know what label it is
            'placeholder' => 'Description',
            'rules' => 'nullable|min:1|max:350',// validation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => 'With the unique, patented camera technology, which is currently the most innovative technology in terms of speed, resolution and image quality, MODI Vision has developed facial recognition “in passing”. The efficiency of the handling processes is accelerated and security is increased. Walking distances are optimized and queues reduced.' // default value if you want
          ],
          [
            'type' => 'img',// input fields type
            'data' => 'img',// data type, string, int, boolean
            'file_types' => ['image'],

            'name' => 'about_us_slider_two_section_image',// unique name for field
            'label' => 'Image',// you know what label it is
            'placeholder' => 'Image',
            'width' => '52',
            'rules' => 'nullable|min:2|max:350',// validation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => null // default value if you want
          ],
          [
            'type' => 'radio', // input fields type
            'data' => 'boolean', // data type, string, int, boolean
            'name' => 'about_us_slider_two_section_title_show', // unique name for field
            'label' => 'Show Event Section', // you know what label it is
            'placeholder' => 'Active',
            'rules' => '', // validation rule of laravel
            'class' => 'w-auto px-2', // any class for input
            'value' => true // default value if you want
          ],
        ]
      ],

      'verfication_section' => [
        'title' => 'Verfication Section',
        'elements' => [
          [
            'type' => 'text',// input fields type
            'data' => 'string',// data type, string, int, boolean
            'name' => 'about_us_verfication_section_title',// unique name for field
            'has_translate' => true,
            'label' => 'Title',// you know what label it is
            'placeholder' => 'Title',
            'rules' => 'nullable|min:2|max:350',// validation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => 'VERIFICATION & IDENTIFICATION PROCESSES' // default value if you want
          ],
          [
            'type' => 'textarea',// input fields type
            'data' => 'text',// data type, string, int, boolean
            'name' => 'about_us_verfication_section_description',// unique name for field
            'has_translate' => true,
            'label' => 'Description',// you know what label it is
            'placeholder' => 'Description',
            'rules' => 'nullable|min:1|max:350',// validation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => 'MODI Vision has developed an intelligent 3D camera system as a solution for image capture with a simple and user-friendly software interface for verification and identification processes. This 3D camera detects the person’s face, adjusts the position of the camera to the height of the passenger, and then captures a high quality image that guarantees high verification and recognition accuracy. The software immediately prompts the live images and verifies them using biometric photos stored in a database server. ' // default value if you want
          ],
          [
            'type' => 'img',// input fields type
            'data' => 'img',// data type, string, int, boolean
            'file_types' => ['video'],

            'name' => 'about_us_verfication_section_image',// unique name for field
            'label' => 'Image',// you know what label it is
            'placeholder' => 'Image',
            'width' => '52',
            'rules' => 'nullable|min:2|max:350',// validation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => null // default value if you want
          ],
          [
            'type' => 'radio', // input fields type
            'data' => 'boolean', // data type, string, int, boolean
            'name' => 'about_us_verfication_section_show', // unique name for field
            'label' => 'Show Service Section', // you know what label it is
            'placeholder' => 'Active',
            'rules' => '', // validation rule of laravel
            'class' => 'w-auto px-2', // any class for input
            'value' => true // default value if you want
          ],

        ]
      ],
      'products_section' => [
        'title' => 'Products Section',
        'elements' => [
          [
            'type' => 'text',// input fields type
            'data' => 'string',// data type, string, int, boolean
            'name' => 'about_us_products_section_title',// unique name for field
            'has_translate' => true,
            'label' => 'Title',// you know what label it is
            'placeholder' => 'Title',
            'rules' => 'nullable|min:2|max:350',// validation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => 'THE PRODUCTS' // default value if you want
          ],
          [
            'type' => 'textarea',// input fields type
            'data' => 'text',// data type, string, int, boolean
            'name' => 'about_us_products_section_description',// unique name for field
            'has_translate' => true,
            'label' => 'Description',// you know what label it is
            'placeholder' => 'Description',
            'rules' => 'nullable|min:1|max:350',// validation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => 'The camera units were later expanded to three main products. The FaceBar, FaceScreen and FaceBridge are designed for integration into new or older systems. The upgrade solution can be easily integrated into existing systems. Check-in terminals, baggage drop-off terminals, security gates or secure high-security zones are areas in which MODI technology is already in use today. The registration process can be performed via MODI Vision software for fast and secure user registration. The technology is available in more than 20 countries worldwide. ' // default value if you want
          ],
          [
            'type' => 'img',// input fields type
            'data' => 'img',// data type, string, int, boolean
            'file_types' => ['image'],

            'name' => 'about_us_products_section_image',// unique name for field
            'label' => 'Image',// you know what label it is
            'placeholder' => 'Image',
            'width' => '52',
            'rules' => 'nullable|min:2|max:350',// validation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => null // default value if you want
          ],
          [
            'type' => 'radio', // input fields type
            'data' => 'boolean', // data type, string, int, boolean
            'name' => 'about_us_products_section_show', // unique name for field
            'label' => 'Show Service Section', // you know what label it is
            'placeholder' => 'Active',
            'rules' => '', // validation rule of laravel
            'class' => 'w-auto px-2', // any class for input
            'value' => true // default value if you want
          ],

        ]

      ]

    ],
  ],

  'download_area' => [
    'title' => 'Download Area',
    'desc' => 'All the Home settings for application.',
    'icon' => 'HomeIcon',
    'section' => [
      'media' => [
        'title' => 'Media',
        'elements' => [
          [
            'type' => 'text',// input fields type
            'data' => 'string',// data type, string, int, boolean
            'name' => 'download_area_media_subtitle',// unique name for field
            'has_translate' => true,
            'label' => 'Sub Title',// you know what label it is
            'placeholder' => 'Sub Title',
            'rules' => 'nullable|min:2|max:350',// validation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => 'PASSENGER TERMINAL 2023' // default value if you want
          ],
          [
            'type' => 'text',// input fields type
            'data' => 'string',// data type, string, int, boolean
            'name' => 'download_area_media_title',// unique name for field
            'has_translate' => true,
            'label' => 'Title',// you know what label it is
            'placeholder' => 'Title',
            'rules' => 'nullable|min:2|max:350',// validation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => 'Save The Date' // default value if you want
          ],
          [
              'type' => 'list', // input fields type
              'data' => 'array', // data type, string, int, boolean
              'name' => 'download_area_media_media', // unique name for field
              'label' => 'Items', // you know what label it is
              'placeholder' => 'Items',
              'rules' => 'nullable|array', // validation rule of laravel
              'class' => 'w-auto px-2', // any class for input
              'value' => [], // default value if you want
              'inputs' => [
                  [
                      'type' => 'text', // input fields type
                      'data' => 'string', // data type, string, int, boolean
                      'name' => 'title', // unique name for field
                      'label' => 'Title', // you know what label it is
                      'placeholder' => 'Title',
                      'width' => '8',
                      'rules' => 'nullable|min:2|max:350', // validation rule of laravel
                      'class' => 'w-auto px-2', // any class for input
                  ],
                  [
                    'type' => 'img',// input fields type
                    'data' => 'img',// data type, string, int, boolean
                    'file_types' => ['video'],
                    'name' => 'video',// unique name for field
                    'label' => 'Video',// you know what label it is
                    'placeholder' => 'Video',
                    'width' => '24',
                    'rules' => 'nullable|min:2|max:350',// va lidation rule of laravel
                    'class' => 'w-auto px-2',// any class for input
                    'value' => null // default value if you want
                  ],
                  [
                    'type' => 'img',// input fields type
                    'data' => 'img',// data type, string, int, boolean
                    'file_types' => ['image'],
                    'name' => 'thumbnail',// unique name for field
                    'label' => 'thumbnail',// you know what label it is
                    'placeholder' => 'thumbnail',
                    'width' => '24',
                    'rules' => 'nullable|min:2|max:350',// va lidation rule of laravel
                    'class' => 'w-auto px-2',// any class for input
                    'value' => null // default value if you want
                  ],



              ]
          ],



        ]
      ],
      'sheet' => [
        'title' => 'sheet',
        'elements' => [
          [
            'type' => 'text',// input fields type
            'data' => 'string',// data type, string, int, boolean
            'name' => 'download_area_sheet_subtitle',// unique name for field
            'has_translate' => true,
            'label' => 'Sub Title',// you know what label it is
            'placeholder' => 'Sub Title',
            'rules' => 'nullable|min:2|max:350',// validation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => 'Here you will find the most important documents in the field of biometric facial recognition' // default value if you want
          ],
          [
            'type' => 'text',// input fields type
            'data' => 'string',// data type, string, int, boolean
            'name' => 'download_area_sheet_title',// unique name for field
            'has_translate' => true,
            'label' => 'Title',// you know what label it is
            'placeholder' => 'Title',
            'rules' => 'nullable|min:2|max:350',// validation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => 'Download Area' // default value if you want
          ],
          [
            'type' => 'text', // input fields type
            'data' => 'string', // data type, string, int, boolean
            'name' => 'download_area_sheet_button_title', // unique name for field
            'label' => 'Button title', // you know what label it is
            'placeholder' => 'Button title',
            'has_translate' => true,
            'rules' => 'nullable|min:2|max:350', // validation rule of laravel
            'class' => 'w-auto px-2', // any class for input
            'value' => 'Data Sheet' // default value if you want
          ],
          [
            'type' => 'img',// input fields type
            'data' => 'img',// data type, string, int, boolean
            'file_types' => ['document'],
            'name' => 'download_area_sheet_data_sheet_file',// unique name for field
            'label' => 'Data Sheet File',// you know what label it is
            'placeholder' => 'Data Sheet File',
            'width' => '48',
            'rules' => 'nullable|min:2|max:350',// va lidation rule of laravel
            'class' => 'w-auto px-2',// any class for input
            'value' => null // default value if you want
          ],

        ]
      ],




      // 'wsa_elite_conference' => [
      //     'title' => 'WSA Elite Conference',
      //     'elements' => [
      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'home_wsa_elite_conference_title', // unique name for field
      //             'label' => 'Title', // you know what label it is
      //             'placeholder' => 'Title',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'WSA Elite Conference' // default value if you want
      //         ],
      //         [
      //             'type' => 'textarea', // input fields type
      //             'data' => 'text', // data type, string, int, boolean
      //             'name' => 'home_wsa_elite_conference_des', // unique name for field
      //             'label' => 'Descriptions', // you know what label it is
      //             'placeholder' => 'Descriptions',
      //             'rules' => 'nullable|min:2|max:2500', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'We would like to thank you for your continuous support in helping us to contribute to a reliable and unique communication for all members of the network, and to become stronger and stronger over time.</br>
      //                         It is our pleasure to announce that we will be hosting our In-Person Conference, on Sept 7-11, 2022 at Hilton Istanbul Bomonti, Istanbul Turkey.</br>
      //                         Its mutual benefits from your attendance will be reflected in increasing your company\'s efficiency rates while expanding your international business opportunities in the field of shipping, especially in light of the current difficult conditions that the world is going through due to the COVID 19.' // default value if you want
      //         ],
      //         [
      //             'type' => 'list', // input fields type
      //             'data' => 'array', // data type, string, int, boolean
      //             'name' => 'home_wsa_elite_conference_items', // unique name for field
      //             'label' => 'Items', // you know what label it is
      //             'placeholder' => 'Items',
      //             'rules' => 'nullable|array', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => [], // default value if you want
      //             'inputs' => [
      //                 [
      //                     'type' => 'text', // input fields type
      //                     'data' => 'string', // data type, string, int, boolean
      //                     'name' => 'title', // unique name for field
      //                     'label' => 'Title', // you know what label it is
      //                     'placeholder' => 'Title',
      //                     'width' => '8',
      //                     'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //                     'class' => 'w-auto px-2', // any class for input
      //                 ],
      //                 [
      //                     'type' => 'textarea', // input fields type
      //                     'data' => 'text', // data type, string, int, boolean
      //                     'name' => 'des', // unique name for field
      //                     'label' => 'Description', // you know what label it is
      //                     'placeholder' => 'Description',
      //                     'width' => '64',
      //                     'rules' => 'nullable|min:2|max:9000', // validation rule of laravel
      //                     'class' => 'w-auto px-2', // any class for input
      //                 ],
      //                 [
      //                     'type' => 'img', // input fields type
      //                     'data' => 'img', // data type, string, int, boolean
      //                     'name' => 'icon', // unique name for field
      //                     'label' => 'Icon', // you know what label it is
      //                     'placeholder' => 'Icon',
      //                     'width' => '52',
      //                     'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //                     'class' => 'w-auto px-2', // any class for input
      //                 ],
      //             ]
      //         ],
      //     ]
      // ],
      // 'wsa_consolidation' => [
      //     'title' => 'WSA Consolidation',
      //     'elements' => [
      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'home_wsa_consolidation_title', // unique name for field
      //             'label' => 'Title', // you know what label it is
      //             'placeholder' => 'Title',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'World Shipping Alliance' // default value if you want
      //         ],
      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'home_wsa_consolidation_sub_title', // unique name for field
      //             'label' => 'Sub Title', // you know what label it is
      //             'placeholder' => 'Sub Title',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'Consolidation' // default value if you want
      //         ],
      //         [
      //             'type' => 'textarea', // input fields type
      //             'data' => 'text', // data type, string, int, boolean
      //             'name' => 'home_wsa_consolidation_des', // unique name for field
      //             'label' => 'Descriptions', // you know what label it is
      //             'placeholder' => 'Descriptions',
      //             'rules' => 'nullable|min:2|max:2500', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'WSA CONSOL is an independent worldwide network for specific and selected leading consolidators. who offer much flexibility in transport planning and have the potential to efficiently consolidate goods, even if these goods have distinct pickup locations and destinations with proven experience in handling many types of consolidation and LCL issues, WSA CONSOL will immediately connect you to a large network of reliable presence members/agents' // default value if you want
      //         ],
      //         [
      //             'type' => 'list', // input fields type
      //             'data' => 'array', // data type, string, int, boolean
      //             'name' => 'home_wsa_consolidation_buttons', // unique name for field
      //             'label' => 'Buttons', // you know what label it is
      //             'placeholder' => 'Buttons',
      //             'rules' => 'nullable|array', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => [], // default value if you want
      //             'inputs' => [
      //                 [
      //                     'type' => 'text', // input fields type
      //                     'data' => 'string', // data type, string, int, boolean
      //                     'name' => 'title', // unique name for field
      //                     'label' => 'Title', // you know what label it is
      //                     'placeholder' => 'Title',
      //                     'width' => '8',
      //                     'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //                     'class' => 'w-auto px-2', // any class for input
      //                 ],
      //                 [
      //                     'type' => 'text', // input fields type
      //                     'data' => 'string', // data type, string, int, boolean
      //                     'name' => 'link', // unique name for field
      //                     'label' => 'Link', // you know what label it is
      //                     'placeholder' => 'Link',
      //                     'width' => '64',
      //                     'rules' => 'nullable|min:2|max:9000', // validation rule of laravel
      //                     'class' => 'w-auto px-2', // any class for input
      //                 ],
      //                 [
      //                     'type' => 'img', // input fields type
      //                     'data' => 'img', // data type, string, int, boolean
      //                     'name' => 'icon', // unique name for field
      //                     'label' => 'Icon', // you know what label it is
      //                     'placeholder' => 'Icon',
      //                     'width' => '52',
      //                     'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //                     'class' => 'w-auto px-2', // any class for input
      //                 ],
      //             ]
      //         ],
      //     ]
      // ],
      // 'why_choose_wsa_consol' => [
      //     'title' => 'Why Choose WSA Consol',
      //     'elements' => [
      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'home_why_choose_wsa_consol_title', // unique name for field
      //             'label' => 'Title', // you know what label it is
      //             'placeholder' => 'Title',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'Why Choose WSA Consol' // default value if you want
      //         ],
      //         [
      //             'type' => 'textarea', // input fields type
      //             'data' => 'text', // data type, string, int, boolean
      //             'name' => 'home_why_choose_wsa_consol_des', // unique name for field
      //             'label' => 'Descriptions', // you know what label it is
      //             'placeholder' => 'Descriptions',
      //             'rules' => 'nullable|min:2|max:2500', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'As a specific partner in WSA CONSOL We will help you to contribute with' // default value if you want
      //         ],
      //         [
      //             'type' => 'list', // input fields type
      //             'data' => 'array', // data type, string, int, boolean
      //             'name' => 'home_why_choose_wsa_consol_items', // unique name for field
      //             'label' => 'Items', // you know what label it is
      //             'placeholder' => 'Items',
      //             'rules' => 'nullable|array', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => [], // default value if you want
      //             'inputs' => [
      //                 [
      //                     'type' => 'text', // input fields type
      //                     'data' => 'string', // data type, string, int, boolean
      //                     'name' => 'title', // unique name for field
      //                     'label' => 'Title', // you know what label it is
      //                     'placeholder' => 'Title',
      //                     'width' => '8',
      //                     'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //                     'class' => 'w-auto px-2', // any class for input
      //                 ],
      //                 [
      //                     'type' => 'textarea', // input fields type
      //                     'data' => 'text', // data type, string, int, boolean
      //                     'name' => 'des', // unique name for field
      //                     'label' => 'Descriptions', // you know what label it is
      //                     'placeholder' => 'Descriptions',
      //                     'width' => '64',
      //                     'rules' => 'nullable|min:2|max:9000', // validation rule of laravel
      //                     'class' => 'w-auto px-2', // any class for input
      //                 ],
      //             ]
      //         ],
      //     ]
      // ],
      // 'video' => [
      //     'title' => 'WSA Video',
      //     'elements' => [
      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'home_wsa_video_title', // unique name for field
      //             'label' => 'Title', // you know what label it is
      //             'placeholder' => 'Title',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'We can\'t wait to see you in Istanbul!' // default value if you want
      //         ],
      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'home_wsa_video_link', // unique name for field
      //             'label' => 'Link', // you know what label it is
      //             'placeholder' => 'Link',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'https://www.youtube.com/embed/iji83QXYVXU' // default value if you want
      //         ],
      //     ]
      // ],
      // 'venue_section' => [
      //     'title' => 'Venue Section',
      //     'elements' => [
      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'home_venue_section_title', // unique name for field
      //             'label' => 'Title', // you know what label it is
      //             'placeholder' => 'Title',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'Hilton Istanbul Bomonti Hotel' // default value if you want
      //         ],
      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'home_venue_section_sub_title', // unique name for field
      //             'label' => 'Sub Title', // you know what label it is
      //             'placeholder' => 'Sub Title',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'Venue:<span class="font-architects-daughter text-blue-600 normal-case"> Istanbul, Turkey</span>' // default value if you want
      //         ],
      //         [


      //             'type' => 'textarea', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'home_venue_section_des', // unique name for field
      //             'label' => 'Descriptions', // you know what label it is
      //             'placeholder' => 'Descriptions',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => '34-story hotel and conference center is across from Bomontiada. Nişantaşı shopping and metro links to Taksim Square are less than two kilometers away, and Dolmabahçe Palace and the European shore are four kilometers away....' // default value if you want
      //         ],
      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'home_venue_section_button_text', // unique name for field
      //             'label' => 'Button text', // you know what label it is
      //             'placeholder' => 'Button text',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'Read More...' // default value if you want
      //         ],
      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'home_venue_section_button_link', // unique name for field
      //             'label' => 'Button link', // you know what label it is
      //             'placeholder' => 'Button link',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'https://wsa-events.com/hotel' // default value if you want
      //         ],
      //         [
      //             'type' => 'img', // input fields type , img ,  text , list
      //             'data' => 'img', // data type, string, int, boolean
      //             'name' => 'home_venue_section_img', // unique name for field
      //             'label' => 'Img', // you know what label it is
      //             'placeholder' => 'Img',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => null // default value if you want
      //         ],
      //         [
      //             'type' => 'list', // input fields type
      //             'data' => 'array', // data type, string, int, boolean
      //             'name' => 'home_venue_section_items', // unique name for field
      //             'label' => 'Items', // you know what label it is
      //             'placeholder' => 'Items',
      //             'rules' => 'nullable|array', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'a:5:{i:0;a:1:{s:5:"title";s:26:"Meeting & Conference Rooms";}i:1;a:1:{s:5:"title";s:25:"Spa & Indoor/Outdoor Pool";}i:2;a:1:{s:5:"title";s:16:"Executive lounge";}i:3;a:1:{s:5:"title";s:21:"5 starts Room service";}i:4;a:1:{s:5:"title";s:34:"Social Hub of Music, Food, and Art";}}', // default value if you want
      //             'inputs' => [
      //                 [
      //                     'type' => 'text', // input fields type
      //                     'data' => 'string', // data type, string, int, boolean
      //                     'name' => 'title', // unique name for field
      //                     'label' => 'Title', // you know what label it is
      //                     'placeholder' => 'Title',
      //                     'width' => '96',
      //                     'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //                     'class' => 'w-auto px-2', // any class for input
      //                 ],
      //             ]
      //         ],
      //     ]
      // ],
      // 'login_section' => [
      //     'title' => 'Login Section',
      //     'elements' => [
      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'home_login_section_title', // unique name for field
      //             'label' => 'Title', // you know what label it is
      //             'placeholder' => 'Title',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'Apply Now' // default value if you want
      //         ],
      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'home_login_section_sub_title', // unique name for field
      //             'label' => 'Sub Title', // you know what label it is
      //             'placeholder' => 'Sub Title',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'Join WSA Elite Conference 2022' // default value if you want
      //         ],

      //         [
      //             'type' => 'radio', // input fields type
      //             'data' => 'boolean', // data type, string, int, boolean
      //             'name' => 'home_login_section_show', // unique name for field
      //             'label' => 'Show Login Section', // you know what label it is
      //             'placeholder' => 'Active',
      //             'rules' => '', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => true // default value if you want
      //         ],

      //     ]
      // ],
      // 'sponsors_section' => [
      //     'title' => 'Sponsors Section',
      //     'elements' => [
      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'home_sponsors_section_title', // unique name for field
      //             'label' => 'Title', // you know what label it is
      //             'placeholder' => 'Title',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'Sponsors' // default value if you want
      //         ],
      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'home_sponsors_section_sub_title', // unique name for field
      //             'label' => 'Sub Title', // you know what label it is
      //             'placeholder' => 'Sub Title',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'World Shipping Alliance Elite Conference 2022, Istanbul Sponsors.' // default value if you want
      //         ],


      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'home_sponsors_section_button_text', // unique name for field
      //             'label' => 'Button text', // you know what label it is
      //             'placeholder' => 'Button text',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'Read More' // default value if you want
      //         ],

      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'home_sponsors_section_button_link', // unique name for field
      //             'label' => 'Button link', // you know what label it is
      //             'placeholder' => 'Button link',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'https://wsa-events.com/conference/sponsors' // default value if you want
      //         ],


      //         [
      //             'type' => 'radio', // input fields type
      //             'data' => 'boolean', // data type, string, int, boolean
      //             'name' => 'home_sponsors_section_show', // unique name for field
      //             'label' => 'Show sponsors Section', // you know what label it is
      //             'placeholder' => 'Active',
      //             'rules' => '', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => true // default value if you want
      //         ],

      //     ]
      // ],
      // 'recent_member' => [
      //     'title' => 'Recent Member',
      //     'elements' => [
      //         [
      //             'type' => 'radio', // input fields type
      //             'data' => 'boolean', // data type, string, int, boolean
      //             'name' => 'recent_registered_members_show', // unique name for field
      //             'label' => 'Show Recent Registered members', // you know what label it is
      //             'placeholder' => 'Active',
      //             'rules' => '', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => false // default value if you want
      //         ],

      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'recent_registered_members_section_button_text', // unique name for field
      //             'label' => 'Button text', // you know what label it is
      //             'placeholder' => 'Button text',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'Show More' // default value if you want
      //         ],

      //         [
      //             'type' => 'text', // input fields type
      //             'data' => 'string', // data type, string, int, boolean
      //             'name' => 'recent_registered_members_section_button_link', // unique name for field
      //             'label' => 'Button link', // you know what label it is
      //             'placeholder' => 'Button link',
      //             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
      //             'class' => 'w-auto px-2', // any class for input
      //             'value' => 'https://wsa-events.com/conference/recent-members' // default value if you want
      //         ],

      //     ]
      // ],
      ],


  ],
  // 'agenda' => [
  //     'title' => 'Agenda',
  //     'desc' => 'All the Agenda settings for application.',
  //     'icon' => 'HomeIcon',
  //     'section' => [
  //         'header' => [
  //             'title' => 'Header',
  //             'elements' => [
  //                 [
  //                     'type' => 'text', // input fields type
  //                     'data' => 'string', // data type, string, int, boolean
  //                     'name' => 'agenda_header_title', // unique name for field
  //                     'label' => 'Title', // you know what label it is
  //                     'placeholder' => 'Title',
  //                     'rules' => 'nullable|min:2|max:350', // validation rule of laravel
  //                     'class' => 'w-auto px-2', // any class for input
  //                     'value' => 'Agenda' // default value if you want
  //                 ],
  //                 [
  //                     'type' => 'textarea', // input fields type
  //                     'data' => 'text', // data type, string, int, boolean
  //                     'name' => 'agenda_header_subtitle', // unique name for field
  //                     'label' => 'Sub Title', // you know what label it is
  //                     'placeholder' => 'Sub Title',
  //                     'rules' => 'nullable|min:2|max:350', // validation rule of laravel
  //                     'class' => 'w-auto px-2', // any class for input
  //                     'value' => 'World Shipping Alliance Elite Conference will be established on <span
  //                     class="text-blue-600">Sept. 07-10, 2022</span>
  //                     - Istanbul, Turkey' // default value if you want
  //                 ],

  //             ]
  //         ],

  //     ]

  // ],
  // 'visa' => [
  //     'title' => 'Visa',
  //     'desc' => 'All the Agenda settings for application.',
  //     'icon' => 'HomeIcon',
  //     'section' => [
  //         'header' => [
  //             'title' => 'Header',
  //             'elements' => [
  //                 [
  //                     'type' => 'text', // input fields type
  //                     'data' => 'string', // data type, string, int, boolean
  //                     'name' => 'visa_header_title', // unique name for field
  //                     'label' => 'Title', // you know what label it is
  //                     'placeholder' => 'Title',
  //                     'rules' => 'nullable|min:2|max:350', // validation rule of laravel
  //                     'class' => 'w-auto px-2', // any class for input
  //                     'value' => 'Turkey Visa Information' // default value if you want
  //                 ],

  //                 [
  //                     'type' => 'img', // input fields type
  //                     'data' => 'img', // data type, string, int, boolean
  //                     'name' => 'visa_header_background', // unique name for field
  //                     'label' => 'Background', // you know what label it is
  //                     'placeholder' => 'Background',
  //                     'rules' => 'nullable|min:2|max:350', // validation rule of laravel
  //                     'class' => 'w-auto px-2', // any class for input
  //                     'value' => null,
  //                 ],

  //             ],
  //         ],
  //         'content' => [
  //             'title' => 'Content',
  //             'elements' => [
  //                 [
  //                     'type' => 'texteditor', // input fields type
  //                     'data' => 'text', // data type, string, int, boolean , text
  //                     'name' => 'visa_content_template', // unique name for field
  //                     'label' => 'Visa Content Template', // you know what label it is
  //                     'placeholder' => '',
  //                     'merge_tags' => [],
  //                     'rules' => 'nullable|min:1', // validation rule of laravel
  //                     'class' => 'w-auto px-2', // any class for input
  //                     'value' => '<div style="text-align: center;"><span style="font-size: 20px; color: #ffffff;">It is possible to obtain e-Visa 7/24 everywhere with an internet connection. The applicants can obtain their visa after they fill in the necessary information concerning their identity, passport, and travel dates, as you can pay the visa fees online.</span></div>
  //                     <div style="text-align: center;"><span style="font-size: 20px; color: #ffffff;">Please note that e-visa is only valid when the purpose of travel is tourism or commerce.</span></div>
  //                     <div style="text-align: center;">&nbsp;</div>
  //                     <div style="text-align: center;"><span style="font-size: 20px; color: #ffffff;">You are kindly advised to have a travel document/passport valid for at least 6 months as from the date of your arrival in Turkey.</span></div>',
  //                 ],
  //                 [
  //                     'type' => 'text', // input fields type
  //                     'data' => 'string', // data type, string, int, boolean
  //                     'name' => 'visa_content_button_title', // unique name for field
  //                     'label' => 'Button Title', // you know what label it is
  //                     'placeholder' => 'Title',
  //                     'rules' => 'nullable|min:2|max:350', // validation rule of laravel
  //                     'class' => 'w-auto px-2', // any class for input
  //                     'value' => 'Turkish e-Visa Website' // default value if you want
  //                 ],
  //                 [
  //                     'type' => 'text', // input fields type
  //                     'data' => 'string', // data type, string, int, boolean
  //                     'name' => 'visa_content_button_link', // unique name for field
  //                     'label' => 'Button Link', // you know what label it is
  //                     'placeholder' => 'Link',
  //                     'rules' => 'nullable|min:2|max:350', // validation rule of laravel
  //                     'class' => 'w-auto px-2', // any class for input
  //                     'value' => 'https://www.evisa.gov.tr/en/' // default value if you want
  //                 ],

  //             ],
  //         ],

  //     ]

  // ],
  // 'pricing' => [
  //     'title' => 'Pricing',
  //     'desc' => 'All the Pricing settings for application.',
  //     'icon' => 'HomeIcon',
  //     'section' => [
  //         'header' => [
  //             'title' => 'Header',
  //             'elements' => [
  //                 [
  //                     'type' => 'text', // input fields type
  //                     'data' => 'string', // data type, string, int, boolean
  //                     'name' => 'pricing_header_title', // unique name for field
  //                     'label' => 'Title', // you know what label it is
  //                     'placeholder' => 'Title',
  //                     'rules' => 'nullable|min:2|max:350', // validation rule of laravel
  //                     'class' => 'w-auto px-2', // any class for input
  //                     'value' => 'WSA Elite Conference Fees' // default value if you want
  //                 ],
  //                 [
  //                     'type' => 'textarea', // input fields type
  //                     'data' => 'text', // data type, string, int, boolean
  //                     'name' => 'pricing_header_sub_title', // unique name for field
  //                     'label' => 'Sub Title', // you know what label it is
  //                     'placeholder' => 'Sub Title',
  //                     'rules' => 'nullable|min:2|max:350', // validation rule of laravel
  //                     'class' => 'w-auto px-2', // any class for input
  //                     'value' => 'You can register a delegates or spouses for our Elite conference' // default value if you want
  //                 ],
  //                 [
  //                     'type' => 'textarea', // input fields type
  //                     'data' => 'text', // data type, string, int, boolean
  //                     'name' => 'pricing_header_des', // unique name for field
  //                     'label' => 'Description', // you know what label it is
  //                     'placeholder' => 'Description',
  //                     'rules' => 'nullable|min:2|max:350', // validation rule of laravel
  //                     'class' => 'w-auto px-2', // any class for input
  //                     'value' => 'Your registration will not be officially confirmed until we have received the full prepayment of conference fees.' // default value if you want
  //                 ],
  //                 [
  //                     'type' => 'textarea', // input fields type
  //                     'data' => 'text', // data type, string, int, boolean
  //                     'name' => 'pricing_header_deadline', // unique name for field
  //                     'label' => 'Registration Deadline', // you know what label it is
  //                     'placeholder' => 'Registration Deadline',
  //                     'rules' => 'nullable|min:2|max:350', // validation rule of laravel
  //                     'class' => 'w-auto px-2', // any class for input
  //                     'value' => 'Registration Deadline: 1 August, 2022, at 23:59 EST Time.' // default value if you want
  //                 ],
  //                 [
  //                     'type' => 'radio', // input fields type
  //                     'data' => 'boolean', // data type, string, int, boolean
  //                     'name' => 'pricing_activate_early_bird', // unique name for field
  //                     'label' => 'Activate Early Birds', // you know what label it is
  //                     'placeholder' => 'Active',
  //                     'rules' => '', // validation rule of laravel
  //                     'class' => 'w-auto px-2', // any class for input
  //                     'value' => false // default value if you want
  //                 ],
  //                 [
  //                     'type' => 'text', // input fields type
  //                     'data' => 'string', // data type, string, int, boolean
  //                     'name' => 'pricing_text_early_bird', // unique name for field
  //                     'label' => 'Text For Not Active Early Bird', // you know what label it is
  //                     'placeholder' => 'Text For Not Active Early Bird',
  //                     'rules' => 'nullable|min:2|max:350', // validation rule of laravel
  //                     'class' => 'w-auto px-2', // any class for input
  //                     'value' => 'Early Bird Period is Over' // default value if you want
  //                 ],
  //             ]
  //         ],
  //         'date' => [
  //             'title' => 'Regular Date',
  //             'elements' => [
  //                 [
  //                     'type' => 'text', // input fields type
  //                     'data' => 'string', // data type, string, int, boolean
  //                     'name' => 'pricing_regular_date_text', // unique name for field
  //                     'label' => 'Regular Date text :', // you know what label it is
  //                     'placeholder' => 'Regular Date',
  //                     'rules' => 'nullable|min:2|max:350', // validation rule of laravel
  //                     'class' => 'w-auto px-2', // any class for input
  //                     'value' => 'Until May 20, 2022, 23:00 PM EST Time' // default value if you want
  //                 ],
  //                 [
  //                     'type' => 'date-picker', // input fields type
  //                     'data' => 'string', // data type, string, int, boolean
  //                     'name' => 'pricing_regular_date', // unique name for field
  //                     'label' => 'Regular Date', // you know what label it is
  //                     'placeholder' => 'Regular Date',
  //                     'rules' => 'nullable|min:2|max:350', // validation rule of laravel
  //                     'class' => 'w-auto px-2', // any class for input
  //                     'value' => '2022-05-20' // default value if you want
  //                 ],
  //             ]
  //         ],
  //         'exclusive_opportunity' => [
  //             'title' => 'Exclusive Opportunity',
  //             'elements' => [
  //                 [
  //                     'type' => 'text', // input fields type
  //                     'data' => 'string', // data type, string, int, boolean
  //                     'name' => 'pricing_exclusive_opportunity_title', // unique name for field
  //                     'label' => 'Title', // you know what label it is
  //                     'placeholder' => 'Title',
  //                     'rules' => 'nullable|min:2|max:350', // validation rule of laravel
  //                     'class' => 'w-auto px-2', // any class for input
  //                     'value' => 'World Shipping Alliance offers you' // default value if you want
  //                 ],
  //                 [
  //                     'type' => 'textarea', // input fields type
  //                     'data' => 'text', // data type, string, int, boolean
  //                     'name' => 'pricing_exclusive_opportunity_sub_title', // unique name for field
  //                     'label' => 'Sub Title', // you know what label it is
  //                     'placeholder' => 'Sub Title',
  //                     'rules' => 'nullable|min:2|max:350', // validation rule of laravel
  //                     'class' => 'w-auto px-2', // any class for input
  //                     'value' => 'Exclusive Opportunity' // default value if you want
  //                 ],
  //                 [
  //                     'type' => 'textarea', // input fields type
  //                     'data' => 'text', // data type, string, int, boolean
  //                     'name' => 'pricing_exclusive_opportunity_des', // unique name for field
  //                     'label' => 'Description', // you know what label it is
  //                     'placeholder' => 'Description',
  //                     'rules' => 'nullable|min:2|max:350', // validation rule of laravel
  //                     'class' => 'w-auto px-2', // any class for input
  //                     'value' => 'To stand out in our First conference and boost your brand awareness within the Alliance. The more you invest in your branding, the better you connect with the community. What we offer with the <span class="font-architects-daughter text-yellow-200">sponsorship</span>.' // default value if you want
  //                 ],
  //             ]
  //         ],
  //         'common_features' => [
  //             'title' => 'Common Features',
  //             'elements' => [
  //                 [
  //                     'type' => 'list', // input fields type
  //                     'data' => 'array', // data type, string, int, boolean
  //                     'name' => 'pricing_common_features', // unique name for field
  //                     'label' => 'Items', // you know what label it is
  //                     'placeholder' => 'Items',
  //                     'rules' => 'nullable|array', // validation rule of laravel
  //                     'class' => 'w-auto px-2', // any class for input
  //                     'value' => 'a:8:{i:0;a:1:{s:5:"title";s:26:"Welcome Cocktail Reception";}i:1;a:1:{s:5:"title";s:22:"Coffee Breaks & Snacks";}i:2;a:1:{s:5:"title";s:27:"Conference Kits & Giveaways";}i:3;a:1:{s:5:"title";s:11:"Gala Dinner";}i:4;a:1:{s:5:"title";s:22:"Conference Shirt & Bag";}i:5;a:1:{s:5:"title";s:9:"Souvenirs";}i:6;a:1:{s:5:"title";s:12:"Group Outing";}i:7;a:1:{s:5:"title";s:27:"All Taxes & Service Charges";}}', // default value if you want
  //                     'inputs' => [
  //                         [
  //                             'type' => 'text', // input fields type
  //                             'data' => 'string', // data type, string, int, boolean
  //                             'name' => 'title', // unique name for field
  //                             'label' => 'Title', // you know what label it is
  //                             'placeholder' => 'Title',
  //                             'width' => '96',
  //                             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
  //                             'class' => 'w-auto px-2', // any class for input
  //                         ],
  //                     ]
  //                 ],
  //             ]
  //         ],
  //         'delegate' => [
  //             'title' => 'Delegate',
  //             'elements' => [
  //                 [
  //                     'type' => 'text', // input fields type
  //                     'data' => 'string', // data type, string, int, boolean
  //                     'name' => 'pricing_delegate_header_title', // unique name for field
  //                     'label' => 'Title', // you know what label it is
  //                     'placeholder' => 'Title',
  //                     'rules' => 'nullable|min:2|max:350', // validation rule of laravel
  //                     'class' => 'w-auto px-2', // any class for input
  //                     'value' => 'Delegate' // default value if you want
  //                 ],

  //                 [
  //                     'type' => 'number', // input fields type
  //                     'data' => 'int', // data type, string, int, boolean
  //                     'name' => 'pricing_delegate_header_price_regular', // unique name for field
  //                     'label' => 'Regular Price', // you know what label it is
  //                     'placeholder' => 'Regular Price',
  //                     'rules' => 'nullable|min:2|max:350', // validation rule of laravel
  //                     'class' => 'w-auto px-2', // any class for input
  //                     'value' => 1100 // default value if you want
  //                 ],
  //                 [
  //                     'type' => 'number', // input fields type
  //                     'data' => 'int', // data type, string, int, boolean
  //                     'name' => 'pricing_delegate_header_price_early_bird', // unique name for field
  //                     'label' => 'Early Bird Price', // you know what label it is
  //                     'placeholder' => 'Early Bird Price',
  //                     'rules' => 'nullable|min:2|max:350', // validation rule of laravel
  //                     'class' => 'w-auto px-2', // any class for input
  //                     'value' => 890 // default value if you want
  //                 ],
  //                 [
  //                     'type' => 'list', // input fields type
  //                     'data' => 'array', // data type, string, int, boolean
  //                     'name' => 'pricing_delegate_features', // unique name for field
  //                     'label' => 'Items', // you know what label it is
  //                     'placeholder' => 'Items',
  //                     'rules' => 'nullable|array', // validation rule of laravel
  //                     'class' => 'w-auto px-2', // any class for input
  //                     'value' => 'a:5:{i:0;a:1:{s:5:"title";s:17:"1 Conference Pass";}i:1;a:1:{s:5:"title";s:23:"4-day Conference Access";}i:2;a:1:{s:5:"title";s:27:"Full Access to all Meetings";}i:3;a:1:{s:5:"title";s:16:"Conference Lunch";}i:4;a:1:{s:5:"title";s:14:"Delegate Badge";}}', // default value if you want
  //                     'inputs' => [
  //                         [
  //                             'type' => 'text', // input fields type
  //                             'data' => 'string', // data type, string, int, boolean
  //                             'name' => 'title', // unique name for field
  //                             'label' => 'Title', // you know what label it is
  //                             'placeholder' => 'Title',
  //                             'width' => '96',
  //                             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
  //                             'class' => 'w-auto px-2', // any class for input
  //                         ],
  //                     ]
  //                 ],
  //             ]
  //         ],
  //         'spouse' => [
  //             'title' => 'Spouse',
  //             'elements' => [
  //                 [
  //                     'type' => 'text', // input fields type
  //                     'data' => 'string', // data type, string, int, boolean
  //                     'name' => 'pricing_spouse_header_title', // unique name for field
  //                     'label' => 'Title', // you know what label it is
  //                     'placeholder' => 'Title',
  //                     'rules' => 'nullable|min:2|max:350', // validation rule of laravel
  //                     'class' => 'w-auto px-2', // any class for input
  //                     'value' => 'Spouse / Guest' // default value if you want
  //                 ],
  //                 [
  //                     'type' => 'number', // input fields type
  //                     'data' => 'int', // data type, string, int, boolean
  //                     'name' => 'pricing_spouse_header_price_regular', // unique name for field
  //                     'label' => 'Regular Price', // you know what label it is
  //                     'placeholder' => 'Regular Price',
  //                     'rules' => 'nullable|min:2|max:350', // validation rule of laravel
  //                     'class' => 'w-auto px-2', // any class for input
  //                     'value' => 400 // default value if you want
  //                 ],
  //                 [
  //                     'type' => 'number', // input fields type
  //                     'data' => 'int', // data type, string, int, boolean
  //                     'name' => 'pricing_spouse_header_price_early_bird', // unique name for field
  //                     'label' => 'Early Bird Price', // you know what label it is
  //                     'placeholder' => 'Early Bird Price',
  //                     'rules' => 'nullable|min:2|max:350', // validation rule of laravel
  //                     'class' => 'w-auto px-2', // any class for input
  //                     'value' => 300 // default value if you want
  //                 ],
  //                 [
  //                     'type' => 'list', // input fields type
  //                     'data' => 'array', // data type, string, int, boolean
  //                     'name' => 'pricing_spouse_features', // unique name for field
  //                     'label' => 'Items', // you know what label it is
  //                     'placeholder' => 'Items',
  //                     'rules' => 'nullable|array', // validation rule of laravel
  //                     'class' => 'w-auto px-2', // any class for input
  //                     'value' => 'a:3:{i:0;a:1:{s:5:"title";s:10:"Spa & Pool";}i:1;a:1:{s:5:"title";s:15:"High Speed Wifi";}i:2;a:1:{s:5:"title";s:28:"Lunches and Dinners included";}}', // default value if you want
  //                     'inputs' => [
  //                         [
  //                             'type' => 'text', // input fields type
  //                             'data' => 'string', // data type, string, int, boolean
  //                             'name' => 'title', // unique name for field
  //                             'label' => 'Title', // you know what label it is
  //                             'placeholder' => 'Title',
  //                             'width' => '96',
  //                             'rules' => 'nullable|min:2|max:350', // validation rule of laravel
  //                             'class' => 'w-auto px-2', // any class for input
  //                         ],
  //                     ]
  //                 ],
  //             ]
  //         ],
  //     ]

  // ],

  // 'event_cost' => [
  //     'title' => 'Event Cost',
  //     'desc' => 'All the Event Costs settings for application.',
  //     'icon' => 'CurrencyDollarIcon',
  //     'elements' => [
  //         [
  //             'type' => 'number', // input fields type
  //             'data' => 'int', // data type, string, int, boolean
  //             'name' => 'first_delegate_cost', // unique name for field
  //             'label' => 'First Delegate Cost For Member', // you know what label it is
  //             'placeholder' => 'First Delegate Cost For Member',
  //             'rules' => 'nullable|min:1|max:5', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => 890 // default value if you want
  //         ],
  //         [
  //             'type' => 'number', // input fields type
  //             'data' => 'int', // data type, string, int, boolean
  //             'name' => 'second_delegate_cost', // unique name for field
  //             'label' => 'Second Delegate Cost For Member', // you know what label it is
  //             'placeholder' => 'Second Delegate Cost For Member',
  //             'rules' => 'nullable|min:1|max:5', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => 890 // default value if you want
  //         ],
  //         [
  //             'type' => 'number', // input fields type
  //             'data' => 'int', // data type, string, int, boolean
  //             'name' => 'spouse_cost', // unique name for field
  //             'label' => 'Spouses Cost For Member', // you know what label it is
  //             'placeholder' => 'Spouses Cost For Member',
  //             'rules' => 'nullable|min:1|max:5', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => 300 // default value if you want
  //         ],


  //         [
  //             'type' => 'number', // input fields type
  //             'data' => 'int', // data type, string, int, boolean
  //             'name' => 'first_delegate_cost_non_member', // unique name for field
  //             'label' => 'First Delegate non-Member', // you know what label it is
  //             'placeholder' => 'First Delegate Cost For non-Member',
  //             'rules' => 'nullable|min:1|max:5', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => 1190 // default value if you want
  //         ],
  //         [
  //             'type' => 'number', // input fields type
  //             'data' => 'int', // data type, string, int, boolean
  //             'name' => 'second_delegate_cost_non_member', // unique name for field
  //             'label' => 'Second Delegate non-Member', // you know what label it is
  //             'placeholder' => 'Second Delegate Cost For non-Member',
  //             'rules' => 'nullable|min:1|max:5', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => 1190 // default value if you want
  //         ],
  //         [
  //             'type' => 'number', // input fields type
  //             'data' => 'int', // data type, string, int, boolean
  //             'name' => 'spouse_cost_non_member', // unique name for field
  //             'label' => 'Spouses non-Member', // you know what label it is
  //             'placeholder' => 'Spouses Cost For non-Member',
  //             'rules' => 'nullable|min:1|max:5', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => 300 // default value if you want
  //         ],


  //         [
  //             'type' => 'date-picker-range', // input fields type
  //             'data' => 'date', // data type, string, int, boolean
  //             'name' => 'event_dates', // unique name for field
  //             'label' => 'Event Dates', // you know what label it is
  //             'placeholder' => 'Event Dates',
  //             'rules' => 'nullable|array', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => [
  //                 'start' => '2022-09-07',
  //                 'end' => '2022-09-10'
  //             ] // default value if you want
  //         ],
  //         [
  //             'type' => 'date-picker-range', // input fields type
  //             'data' => 'date', // data type, string, int, boolean
  //             'name' => 'hotel_dates', // unique name for field
  //             'label' => 'Hotel Dates', // you know what label it is
  //             'placeholder' => 'Hotel Dates',
  //             'rules' => 'nullable|array', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => [
  //                 'start' => '2022-09-04',
  //                 'end' => '2022-09-13'
  //             ] // default value if you want
  //         ],
  //     ]
  // ],


  // 'email' => [
  //     'title' => 'Email (SMTP)',
  //     'desc' => 'All the Terms And Conditions settings for application.',
  //     'icon' => 'ClipboardCheckIcon',
  //     'elements' => [


  //         [
  //             'type' => 'text', // input fields type
  //             'data' => 'string', // data type, string, int, boolean , text
  //             'name' => 'delegate_avtice_mail_bcc', // unique name for field
  //             'label' => 'Delegate Avtice Mail Bcc', // you know what label it is
  //             'placeholder' => '',
  //             'rules' => 'nullable|min:1|max:5000', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => "ksroor@pyramidsfreight.com,info@worldshippingalliance.com" // default value if you want
  //         ],

  //         [
  //             'type' => 'text', // input fields type
  //             'data' => 'string', // data type, string, int, boolean , text
  //             'name' => 'delegate_avtice_mail_title', // unique name for field
  //             'label' => 'Delegate Avtice Mail Title', // you know what label it is
  //             'placeholder' => '',
  //             'rules' => 'nullable|min:1|max:5000', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => "WSA Elite Event 2022 - Email Conformation" // default value if you want
  //         ],


  //         [
  //             'type' => 'texteditor', // input fields type
  //             'data' => 'text', // data type, string, int, boolean , text
  //             'name' => 'delegate_avtice_mail_template', // unique name for field
  //             'label' => 'Delegate Avtice Mail Template', // you know what label it is
  //             'placeholder' => '',
  //             // 'show_example' => 'events.mailable.DelegateActive.show',
  //             'merge_tags' => [
  //                 'first_name' => [
  //                   'name' => "Delegate Name",
  //                   'value' => "{{delegate_name}}",
  //                   'sample' => "John Doe"
  //                 ],
  //                 'last_name' => [
  //                   'name' => "Active Button",
  //                   'value' => "{{active_button}}",
  //                 ],
  //                 'company' => [
  //                   'name' => "Company",
  //                   'mergeTags' => [
  //                     'street_1' => [
  //                       'name' => "Company Name",
  //                       'value' => "{{company_name}}"
  //                     ],
  //                     'street_2' => [
  //                       'name' => "Company Address 1",
  //                       'value' => "{{company_address_1}}"
  //                     ],
  //                     'company_address_2' => [
  //                       'name' => "Company Address 2",
  //                       'value' => "{{company_address_2}}"
  //                     ],
  //                     'company_email' => [
  //                       'name' => "Company Email",
  //                       'value' => "{{company_email}}"
  //                     ],
  //                     'company_city' => [
  //                       'name' => "Company City",
  //                       'value' => "{{company_city}}"
  //                     ],
  //                     'company_website' => [
  //                       'name' => "Company Website",
  //                       'value' => "{{company_website}}"
  //                     ],
  //                     'company_country' => [
  //                       'name' => "Company Country",
  //                       'value' => "{{company_country}}"
  //                     ],
  //                   ]
  //                 ]
  //             ],
  //             'rules' => 'nullable|min:1', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => '<h2>Hello, {{delegate_name}}</h2>
  //             <p style="font-family: lato, \'helvetica neue\', helvetica, arial, sans-serif; font-size: medium; font-weight: 400; background-color: #ffffff;">Thank you for registering to attend the WSA Elite conference<br />" Istanbul - Turkey "<br />this email is to confirm that your transaction has been successfully approved!<br />Wish you will find the conference a worthwhile experience and expand your business. look forward to seeing you there.<br /><br />{{active_button}}<br /><br /></p>
  //             <p style="font-family: lato, \'helvetica neue\', helvetica, arial, sans-serif; font-size: medium; font-weight: 400; background-color: #ffffff;">Please find your Order Confirmation for the conference requirements below.</p>',
  //         ],



  //         [
  //             'type' => 'text', // input fields type
  //             'data' => 'string', // data type, string, int, boolean , text
  //             'name' => 'company_created_mail_title', // unique name for field
  //             'label' => 'Mail Title : New Company registered', // you know what label it is
  //             'placeholder' => '',
  //             'rules' => 'nullable|min:1|max:5000', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => "WSA Elite Event 2022 - Email Conformation" // default value if you want
  //         ],

  //         [
  //             'type' => 'text', // input fields type
  //             'data' => 'string', // data type, string, int, boolean , text
  //             'name' => 'company_created_mail_to', // unique name for field
  //             'label' => 'Company created (mail to)', // you know what label it is
  //             'placeholder' => 'Mail to Ex: \'email@email.com\'',
  //             'rules' => 'nullable|min:1|max:5000', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => "info@worldshippingalliance.com" // default value if you want
  //         ],
  //         [
  //             'type' => 'text', // input fields type
  //             'data' => 'string', // data type, string, int, boolean , text
  //             'name' => 'company_created_mail_cc', // unique name for field
  //             'label' => 'Company created (mail cc)', // you know what label it is
  //             'placeholder' => 'Mail cc Ex: \'email1,email2,email3\'',
  //             'rules' => 'nullable|min:1|max:5000', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => "fred@worldshippingalliance.com,ksroor@pyramidsfreight.com,farid@pyramidsfreight.com,info@worldshippingalliance.com" // default value if you want
  //         ],

  //         [
  //             'type' => 'texteditor', // input fields type
  //             'data' => 'text', // data type, string, int, boolean , text
  //             'name' => 'company_created_mail_template', // unique name for field
  //             'label' => 'Company Created Mail Template', // you know what label it is
  //             'placeholder' => '',
  //             // 'show_example' => 'events.mailable.CompanyCreated.show',
  //             'merge_tags' => [
  //                 'first_name' => [
  //                   'name' => "Delegate Name",
  //                   'value' => "{{delegate_name}}",
  //                   'sample' => "John Doe"
  //                 ],
  //                 'last_name' => [
  //                   'name' => "Active Button",
  //                   'value' => "{{active_button}}",
  //                 ],
  //                 'company' => [
  //                   'name' => "Company",
  //                   'mergeTags' => [
  //                     'street_1' => [
  //                       'name' => "Company Name",
  //                       'value' => "{{company_name}}"
  //                     ],
  //                     'street_2' => [
  //                       'name' => "Company Address 1",
  //                       'value' => "{{company_address_1}}"
  //                     ],
  //                     'company_address_2' => [
  //                       'name' => "Company Address 2",
  //                       'value' => "{{company_address_2}}"
  //                     ],
  //                     'company_email' => [
  //                       'name' => "Company Email",
  //                       'value' => "{{company_email}}"
  //                     ],
  //                     'company_city' => [
  //                       'name' => "Company City",
  //                       'value' => "{{company_city}}"
  //                     ],
  //                     'company_website' => [
  //                       'name' => "Company Website",
  //                       'value' => "{{company_website}}"
  //                     ],
  //                     'company_country' => [
  //                       'name' => "Company Country",
  //                       'value' => "{{company_country}}"
  //                     ],
  //                   ]
  //                 ]
  //             ],
  //             'rules' => 'nullable|min:1', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => '<h2>Hello, {{company_name}}</h2>
  //             <p style="font-family: lato, \'helvetica neue\', helvetica, arial, sans-serif; font-size: medium; font-weight: 400; background-color: #ffffff;">Thank you for registering to attend the WSA Elite conference<br />" Istanbul - Turkey "<br />this email is to confirm that your transaction has been successfully approved!<br />Wish you will find the conference a worthwhile experience and expand your business. look forward to seeing you there.<br /><br />{{active_button}}<br /><br /></p>
  //             <p style="font-family: lato, \'helvetica neue\', helvetica, arial, sans-serif; font-size: medium; font-weight: 400; background-color: #ffffff;">Please find your Order Confirmation for the conference requirements below.</p>',
  //         ],



  //         [
  //             'type' => 'text', // input fields type
  //             'data' => 'string', // data type, string, int, boolean , text
  //             'name' => 'company_payment_online_mail_title', // unique name for field
  //             'label' => 'Mail Title : Company Payment', // you know what label it is
  //             'placeholder' => '',
  //             'rules' => 'nullable|min:1|max:5000', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => "WSA Elite conference - Order Confirmation" // default value if you want
  //         ],

  //         [
  //             'type' => 'text', // input fields type
  //             'data' => 'string', // data type, string, int, boolean , text
  //             'name' => 'company_payment_online_mail_to', // unique name for field
  //             'label' => 'Company Payment Online (mail to)', // you know what label it is
  //             'placeholder' => 'Mail to Ex: \'email@email.com\'',
  //             'rules' => 'nullable|min:1|max:5000', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => "info@worldshippingalliance.com" // default value if you want
  //         ],
  //         [
  //             'type' => 'text', // input fields type
  //             'data' => 'string', // data type, string, int, boolean , text
  //             'name' => 'company_payment_online_mail_cc', // unique name for field
  //             'label' => 'Company Payment Online (mail cc)', // you know what label it is
  //             'placeholder' => 'Mail cc Ex: \'email1,email2,email3\'',
  //             'rules' => 'nullable|min:1|max:5000', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => "fred@worldshippingalliance.com,ksroor@pyramidsfreight.com,farid@pyramidsfreight.com,info@worldshippingalliance.com" // default value if you want
  //         ],

  //         [
  //             'type' => 'texteditor', // input fields type
  //             'data' => 'text', // data type, string, int, boolean , text
  //             'name' => 'company_payment_mail_template', // unique name for field
  //             'label' => 'Company Payment Mail Template', // you know what label it is
  //             'placeholder' => ' ',
  //             // 'show_example' => 'events.mailable.OrderPayment.show',
  //             'merge_tags' => [
  //                 'company' => [
  //                   'name' => "Company",
  //                   'mergeTags' => [
  //                     'company_name' => [
  //                       'name' => "Company Name",
  //                       'value' => "{{company_name}}"
  //                     ],
  //                     'company_address_1' => [
  //                       'name' => "Company Address 1",
  //                       'value' => "{{company_address_1}}"
  //                     ],
  //                     'company_address_2' => [
  //                       'name' => "Company Address 2",
  //                       'value' => "{{company_address_2}}"
  //                     ],
  //                     'company_email' => [
  //                       'name' => "Company Email",
  //                       'value' => "{{company_email}}"
  //                     ],
  //                     'company_city' => [
  //                       'name' => "Company City",
  //                       'value' => "{{company_city}}"
  //                     ],
  //                     'company_website' => [
  //                       'name' => "Company Website",
  //                       'value' => "{{company_website}}"
  //                     ],
  //                     'company_country' => [
  //                       'name' => "Company Country",
  //                       'value' => "{{company_country}}"
  //                     ],
  //                     'company_phone' => [
  //                       'name' => "Company Phone",
  //                       'value' => "{{company_phone}}"
  //                     ],
  //                     'company_fax' => [
  //                       'name' => "Company Fax",
  //                       'value' => "{{company_fax}}"
  //                     ],
  //                   ]
  //                 ],
  //                 'order' => [
  //                   'name' => "Order",
  //                   'mergeTags' => [
  //                     'order_id' => [
  //                       'name' => "Order Id",
  //                       'value' => "{{order_id}}"
  //                     ],
  //                     'order_uuid' => [
  //                       'name' => "Order UUID",
  //                       'value' => "{{order_uuid}}"
  //                     ],
  //                     'order_total' => [
  //                       'name' => "Order Total",
  //                       'value' => "{{order_total}}"
  //                     ],
  //                     'order_table' => [
  //                       'name' => "Order Table",
  //                       'value' => "{{order_table}}"
  //                     ],
  //                     'order_date' => [
  //                       'name' => "Order Date",
  //                       'value' => "{{order_date}}"
  //                     ],

  //                   ]
  //                 ],
  //             ],
  //             'rules' => 'nullable|min:1', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => '<table style="font-family: lato, \'helvetica neue\', helvetica, arial, sans-serif; background-color: #ffffff; border-spacing: 0px;" width="100%" cellspacing="0" cellpadding="0">
  //                 <tbody>
  //                 <tr>
  //                 <td style="padding: 0px; margin: 0px; width: 560px;" align="center" valign="top">
  //                 <table style="border-spacing: 0px; height: 250px; width: 100%;" role="presentation" width="100%" cellspacing="0" cellpadding="0">
  //                 <tbody>
  //                 <tr style="height: 35px;">
  //                 <td class="es-m-txt-c" style="padding: 0px; margin: 0px; height: 35px;" align="left">
  //                 <h1 style="margin: 0px; line-height: 36px; font-family: arial, \'helvetica neue\', helvetica, sans-serif; font-size: 30px; font-weight: normal; color: #333333;">Hello, {{company_name}}</h1>
  //                 </td>
  //                 </tr>
  //                 <tr style="height: 215px;">
  //                 <td class="es-m-txt-c" style="padding: 20px 0px; margin: 0px; height: 215px;" align="left">
  //                 <p class="p_description" style="margin: 0px; text-size-adjust: none; line-height: 27px; color: #999999; font-size: 18px;">Thank you for registering to attend the WSA Elite conference<br />" Istanbul - Turkey "<br />this email is to confirm that your transaction has been successfully approved!<br />Wish you will find the conference a worthwhile experience and expand your business. look forward to seeing you there.</p>
  //                 <p class="p_description" style="margin: 0px; text-size-adjust: none; line-height: 27px; color: #999999; font-size: 18px;">Please find your Order Confirmation for the conference requirements below.</p>
  //                 </td>
  //                 </tr>
  //                 </tbody>
  //                 </table>
  //                 </td>
  //                 </tr>
  //                 </tbody>
  //                 </table>
  //                 <table class="es-left" style="font-family: lato, \'helvetica neue\', helvetica, arial, sans-serif; background-color: #ffffff; border-spacing: 0px; float: left;" cellspacing="0" cellpadding="0" align="left">
  //                 <tbody>
  //                 <tr>
  //                 <td class="es-m-p20b" style="padding: 0px; margin: 0px; width: 270px;" align="left">
  //                 <table style="border-spacing: 0px;" role="presentation" width="100%" cellspacing="0" cellpadding="0">
  //                 <tbody>
  //                 <tr>
  //                 <td style="padding: 0px; margin: 0px;" align="left">
  //                 <h3 style="margin: 0px; line-height: 24px; font-family: arial, \'helvetica neue\', helvetica, sans-serif; font-size: 20px; font-weight: normal; color: #333333;">{{company_name}}</h3>
  //                 </td>
  //                 </tr>
  //                 <tr>
  //                 <td style="padding: 10px 0px; margin: 0px;" align="center">
  //                 <table style="border-spacing: 0px;" role="presentation" border="0" width="100%" cellspacing="0" cellpadding="0">
  //                 <tbody>
  //                 <tr>
  //                 <td style="padding: 0px; border-bottom: 1px solid #cccccc; background: none; height: 1px; width: 270px; margin: 0px;">&nbsp;</td>
  //                 </tr>
  //                 </tbody>
  //                 </table>
  //                 </td>
  //                 </tr>
  //                 <tr>
  //                 <td class="es-m-txt-c" style="padding: 0px; margin: 0px;" align="left">
  //                 <p class="p_order" style="margin: 0px; text-size-adjust: none; line-height: 21px; color: #333333; font-size: 14px;">Order Date : {{order_date}}</p>
  //                 </td>
  //                 </tr>
  //                 <tr>
  //                 <td class="es-m-txt-c" style="padding: 0px; margin: 0px;" align="left">
  //                 <p class="p_s_address" style="margin: 0px; text-size-adjust: none; line-height: 21px; color: #333333; font-size: 14px;">{{company_address_1}} {{company_address_2}}</p>
  //                 </td>
  //                 </tr>
  //                 </tbody>
  //                 </table>
  //                 </td>
  //                 </tr>
  //                 </tbody>
  //                 </table>
  //                 <table class="es-right" style="font-family: lato, \'helvetica neue\', helvetica, arial, sans-serif; background-color: #ffffff; border-spacing: 0px; float: right;" cellspacing="0" cellpadding="0" align="right">
  //                 <tbody>
  //                 <tr>
  //                 <td style="padding: 0px; margin: 0px; width: 270px;" align="left">
  //                 <table style="border-spacing: 0px; width: 100%;" role="presentation" width="100%" cellspacing="0" cellpadding="0">
  //                 <tbody>
  //                 <tr>
  //                 <td style="padding: 0px; margin: 0px; width: 100%;" align="left">
  //                 <h3 style="margin: 0px; line-height: 24px; font-family: arial, \'helvetica neue\', helvetica, sans-serif; font-size: 20px; font-weight: normal; color: #333333;"><strong>World Shipping Alliance</strong></h3>
  //                 </td>
  //                 </tr>
  //                 <tr>
  //                 <td style="padding: 10px 10px 10px 0px; margin: 0px; width: 100%;" align="left">
  //                 <table style="border-spacing: 0px;" role="presentation" border="0" width="100%" cellspacing="0" cellpadding="0">
  //                 <tbody>
  //                 <tr>
  //                 <td style="padding: 0px; border-bottom: 1px solid #cccccc; background: none; height: 1px; width: 260px; margin: 0px;">&nbsp;</td>
  //                 </tr>
  //                 </tbody>
  //                 </table>
  //                 </td>
  //                 </tr>
  //                 <tr>
  //                 <td class="es-m-txt-c" style="padding: 0px; margin: 0px; width: 100%;" align="left">
  //                 <p class="p_date" style="margin: 0px; text-size-adjust: none; line-height: 21px; color: #999999; font-size: 14px;">Elite Conference registration Invoice</p>
  //                 </td>
  //                 </tr>
  //                 <tr>
  //                 <td class="es-m-txt-c" style="padding: 0px; margin: 0px; width: 100%;" align="left">
  //                 <p class="p_b_address" style="margin: 0px; text-size-adjust: none; line-height: 21px; color: #333333; font-size: 14px;">1 Meadowlands Plaza Suite 200, East Rutherford , New Jersey. 07073.</p>
  //                 </td>
  //                 </tr>
  //                 </tbody>
  //                 </table>
  //                 </td>
  //                 </tr>
  //                 </tbody>
  //                 </table>
  //                 <br /><br /><br /><br /><br /><br /><br /><br />{{order_table}}' // default value if you want // default value if you want
  //         ],



  //         [
  //             'type' => 'text', // input fields type
  //             'data' => 'string', // data type, string, int, boolean , text
  //             'name' => 'delegate_send_request_mail_bcc', // unique name for field
  //             'label' => 'One to One Receiver Request Email Bcc', // you know what label it is
  //             'placeholder' => '',
  //             'rules' => 'nullable|min:1|max:5000', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => "fred@worldshippingalliance.com,ksroor@pyramidsfreight.com,farid@pyramidsfreight.com,info@worldshippingalliance.com" // default value if you want
  //         ],
  //         [
  //             'type' => 'text', // input fields type
  //             'data' => 'string', // data type, string, int, boolean , text
  //             'name' => 'delegate_send_request_mail_title', // unique name for field
  //             'label' => 'One to One Receiver Request Email Title', // you know what label it is
  //             'placeholder' => '',
  //             'rules' => 'nullable|min:1|max:5000', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => "WSA Elite Event 2022 - {{sender_name}} send One to one metting request'" // default value if you want
  //         ],

  //         [
  //             'type' => 'texteditor', // input fields type
  //             'data' => 'text', // data type, string, int, boolean , text
  //             'name' => 'delegate_send_request_mail_template', // unique name for field
  //             'label' => 'One to One Receiver Request Email Template', // you know what label it is
  //             'placeholder' => '',
  //             // 'show_example' => 'events.mailable.DelegateSendRequest.show',
  //             'merge_tags' => [
  //                 'first_name' => [
  //                   'name' => "Delegate Name",
  //                   'value' => "{{delegate_name}}",
  //                   'sample' => "John Doe"
  //                 ],
  //                 'delegate_title' => [
  //                     'name' => "Delegate Title",
  //                     'value' => "{{delegate_title}}",
  //                     'sample' => "John Doe"
  //                 ],
  //                 'last_name' => [
  //                   'name' => "Login Button",
  //                   'value' => "{{login_button}}",
  //                 ],

  //                 'time_slot' => [
  //                   'name' => "Time Slot",
  //                   'mergeTags' => [
  //                     'time_from' => [
  //                       'name' => "Time from",
  //                       'value' => "{{time_from}}"
  //                     ],
  //                     'time_to' => [
  //                       'name' => "Time To",
  //                       'value' => "{{time_to}}"
  //                     ],
  //                     'day_date' => [
  //                       'name' => "Day Date",
  //                       'value' => "{{day_date}}"
  //                     ],

  //                   ]
  //                 ],
  //                 'sender' => [
  //                   'name' => "Sender",
  //                   'mergeTags' => [
  //                     'sender_email' => [
  //                       'name' => "Sender email",
  //                       'value' => "{{sender_email}}"
  //                     ],
  //                     'sender_name' => [
  //                       'name' => "Sender name",
  //                       'value' => "{{sender_name}}"
  //                     ],
  //                     'sender_title' => [
  //                       'name' => "Sender title",
  //                       'value' => "{{sender_title}}"
  //                     ],
  //                     'sender_job_title' => [
  //                       'name' => "Sender job title",
  //                       'value' => "{{sender_job_title}}"
  //                     ],
  //                     'sender_company_name' => [
  //                       'name' => "Sender company name",
  //                       'value' => "{{sender_company_name}}"
  //                     ],
  //                     'sender_company_city' => [
  //                       'name' => "Sender company city",
  //                       'value' => "{{sender_company_city}}"
  //                     ],
  //                     'sender_company_country' => [
  //                       'name' => "Sender company _country",
  //                       'value' => "{{sender_company_country}}"
  //                     ],

  //                 ]
  //                 ]
  //             ],
  //             'rules' => 'nullable|min:1', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => '<h2>Dear, {{delegate_name}}</h2>
  //             <p style="font-family: lato, \'helvetica neue\', helvetica, arial, sans-serif; font-size: medium; font-weight: 400; background-color: #ffffff;"><span style="font-family: lato, helvetica neue, helvetica, arial, sans-serif;">{{sender_title}} {{sender_name}}&nbsp; {{sender_job_title}} {{sender_company_name}} {{sender_company_city}} {{sender_company_country}}&nbsp;</span><br /><br /><span style="font-family: lato, helvetica neue, helvetica, arial, sans-serif;">Email : {{sender_email}}<br /><br /></span>Agenda time : {{time_from}} to {{time_to}}&nbsp; , {{day_date}}</p>
  //             <p style="font-family: lato, \'helvetica neue\', helvetica, arial, sans-serif; font-size: medium; font-weight: 400; background-color: #ffffff;">Please login with your WSA Elite Conference Account to confirm the appointment<br /><br />{{login_button}}</p>',
  //         ],


  //         [
  //             'type' => 'text', // input fields type
  //             'data' => 'string', // data type, string, int, boolean , text
  //             'name' => 'delegate_receiver_request_mail_bcc', // unique name for field
  //             'label' => 'One to One Sender Request Email Bcc', // you know what label it is
  //             'placeholder' => '',
  //             'rules' => 'nullable|min:1|max:5000', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => "fred@worldshippingalliance.com,ksroor@pyramidsfreight.com,farid@pyramidsfreight.com,info@worldshippingalliance.com" // default value if you want
  //         ],

  //         [
  //             'type' => 'text', // input fields type
  //             'data' => 'string', // data type, string, int, boolean , text
  //             'name' => 'delegate_receiver_request_mail_title', // unique name for field
  //             'label' => 'One to One Sender Request Email Title', // you know what label it is
  //             'placeholder' => '',
  //             'rules' => 'nullable|min:1|max:5000', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => "WSA Elite Event 2022 - {{receiver_name}} receiver One to one metting request'" // default value if you want
  //         ],

  //         [
  //             'type' => 'texteditor', // input fields type
  //             'data' => 'text', // data type, string, int, boolean , text
  //             'name' => 'delegate_receiver_request_mail_template', // unique name for field
  //             'label' => 'One to One Sender Request Email Template', // you know what label it is
  //             'placeholder' => '',
  //             // 'show_example' => 'events.mailable.DelegateReceiverRequest.show',
  //             'merge_tags' => [
  //                 'first_name' => [
  //                   'name' => "Delegate Name",
  //                   'value' => "{{delegate_name}}",
  //                   'sample' => "John Doe"
  //                 ],
  //                 'delegate_title' => [
  //                   'name' => "Delegate Title",
  //                   'value' => "{{delegate_title}}",
  //                   'sample' => "John Doe"
  //                 ],
  //                 'last_name' => [
  //                   'name' => "Login Button",
  //                   'value' => "{{login_button}}",
  //                 ],

  //                 'time_slot' => [
  //                   'name' => "Time Slot",
  //                   'mergeTags' => [
  //                     'time_from' => [
  //                       'name' => "Time from",
  //                       'value' => "{{time_from}}"
  //                     ],
  //                     'time_to' => [
  //                       'name' => "Time To",
  //                       'value' => "{{time_to}}"
  //                     ],
  //                     'day_date' => [
  //                       'name' => "Day Date",
  //                       'value' => "{{day_date}}"
  //                     ],

  //                   ]
  //                 ],
  //                 'receiver' => [
  //                   'name' => "Receiver",
  //                   'mergeTags' => [
  //                     'receiver_email' => [
  //                       'name' => "Receiver email",
  //                       'value' => "{{receiver_email}}"
  //                     ],
  //                     'receiver_name' => [
  //                       'name' => "Receiver name",
  //                       'value' => "{{receiver_name}}"
  //                     ],
  //                     'receiver_title' => [
  //                       'name' => "Receiver title",
  //                       'value' => "{{receiver_title}}"
  //                     ],
  //                     'receiver_job_title' => [
  //                       'name' => "Receiver job title",
  //                       'value' => "{{receiver_job_title}}"
  //                     ],
  //                     'receiver_company_name' => [
  //                       'name' => "Receiver company name",
  //                       'value' => "{{receiver_company_name}}"
  //                     ],
  //                     'receiver_company_city' => [
  //                       'name' => "Receiver company city",
  //                       'value' => "{{receiver_company_city}}"
  //                     ],
  //                     'receiver_company_country' => [
  //                       'name' => "Receiver company _country",
  //                       'value' => "{{receiver_company_country}}"
  //                     ],

  //                 ]
  //                 ]
  //             ],
  //             'rules' => 'nullable|min:1', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => '<h2>Dear, {{delegate_name}}</h2>
  //             <p style="font-family: lato, \'helvetica neue\', helvetica, arial, sans-serif; font-size: medium; font-weight: 400; background-color: #ffffff;"><span style="font-family: lato, helvetica neue, helvetica, arial, sans-serif;">{{receiver_title}} {{receiver_name}}&nbsp; {{receiver_job_title}} {{receiver_company_name}} {{receiver_company_city}} {{receiver_company_country}}&nbsp;</span><br /><br /><span style="font-family: lato, helvetica neue, helvetica, arial, sans-serif;">Email : {{receiver_email}}<br /><br /></span>Agenda time : {{time_from}} to {{time_to}}&nbsp; , {{day_date}}</p>
  //             <p style="font-family: lato, \'helvetica neue\', helvetica, arial, sans-serif; font-size: medium; font-weight: 400; background-color: #ffffff;">Please login with your WSA Elite Conference Account to confirm the appointment<br /><br />{{login_button}}</p>',
  //         ],


  //         [
  //             'type' => 'radio', // input fields type
  //             'data' => 'boolean', // data type, string, int, boolean
  //             'name' => 'delegate_cancel_request_mail_active', // unique name for field
  //             'label' => 'One to One Cancel Request Email Active', // you know what label it is
  //             'placeholder' => 'Active',
  //             'rules' => '', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => false // default value if you want
  //         ],


  //         [
  //             'type' => 'text', // input fields type
  //             'data' => 'string', // data type, string, int, boolean , text
  //             'name' => 'delegate_cancel_request_mail_bcc', // unique name for field
  //             'label' => 'One to One Cancel Request Email Bcc', // you know what label it is
  //             'placeholder' => '',
  //             'rules' => 'nullable|min:1|max:5000', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => "fred@worldshippingalliance.com,ksroor@pyramidsfreight.com,farid@pyramidsfreight.com,info@worldshippingalliance.com" // default value if you want
  //         ],

  //         [
  //             'type' => 'text', // input fields type
  //             'data' => 'string', // data type, string, int, boolean , text
  //             'name' => 'delegate_cancel_request_mail_title', // unique name for field
  //             'label' => 'One to One Cancel Request Email Title', // you know what label it is
  //             'placeholder' => '',
  //             'rules' => 'nullable|min:1|max:5000', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => "WSA Elite Event 2022 - {{sender_name}} cancel One to one metting request'" // default value if you want
  //         ],

  //         [
  //             'type' => 'texteditor', // input fields type
  //             'data' => 'text', // data type, string, int, boolean , text
  //             'name' => 'delegate_cancel_request_mail_template', // unique name for field
  //             'label' => 'One to One Cancel Request Email Template', // you know what label it is
  //             'placeholder' => '',
  //             // 'show_example' => 'events.mailable.DelegateCancelRequest.show',
  //             'merge_tags' => [
  //                 'first_name' => [
  //                   'name' => "Delegate Name",
  //                   'value' => "{{delegate_name}}",
  //                   'sample' => "John Doe"
  //                 ],
  //                 'delegate_title' => [
  //                     'name' => "Delegate Title",
  //                     'value' => "{{delegate_title}}",
  //                     'sample' => "John Doe"
  //                 ],
  //                 'last_name' => [
  //                   'name' => "Login Button",
  //                   'value' => "{{login_button}}",
  //                 ],

  //                 'time_slot' => [
  //                   'name' => "Time Slot",
  //                   'mergeTags' => [
  //                     'time_from' => [
  //                       'name' => "Time from",
  //                       'value' => "{{time_from}}"
  //                     ],
  //                     'time_to' => [
  //                       'name' => "Time To",
  //                       'value' => "{{time_to}}"
  //                     ],
  //                     'day_date' => [
  //                       'name' => "Day Date",
  //                       'value' => "{{day_date}}"
  //                     ],

  //                   ]
  //                 ],
  //                 'sender' => [
  //                   'name' => "Sender",
  //                   'mergeTags' => [
  //                     'sender_email' => [
  //                       'name' => "Sender email",
  //                       'value' => "{{sender_email}}"
  //                     ],
  //                     'sender_name' => [
  //                       'name' => "Sender name",
  //                       'value' => "{{sender_name}}"
  //                     ],
  //                     'sender_title' => [
  //                       'name' => "Sender title",
  //                       'value' => "{{sender_title}}"
  //                     ],
  //                     'sender_job_title' => [
  //                       'name' => "Sender job title",
  //                       'value' => "{{sender_job_title}}"
  //                     ],
  //                     'sender_company_name' => [
  //                       'name' => "Sender company name",
  //                       'value' => "{{sender_company_name}}"
  //                     ],
  //                     'sender_company_city' => [
  //                       'name' => "Sender company city",
  //                       'value' => "{{sender_company_city}}"
  //                     ],
  //                     'sender_company_country' => [
  //                       'name' => "Sender company _country",
  //                       'value' => "{{sender_company_country}}"
  //                     ],

  //                 ]
  //                 ]
  //             ],
  //             'rules' => 'nullable|min:1', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => '<h2>Dear, {{delegate_name}}</h2>
  //             <p style="font-family: lato, \'helvetica neue\', helvetica, arial, sans-serif; font-size: medium; font-weight: 400; background-color: #ffffff;"><span style="font-family: lato, helvetica neue, helvetica, arial, sans-serif;">{{sender_title}} {{sender_name}}&nbsp; {{sender_job_title}} {{sender_company_name}} {{sender_company_city}} {{sender_company_country}}&nbsp;</span><br /><br /><span style="font-family: lato, helvetica neue, helvetica, arial, sans-serif;">Email : {{sender_email}}<br /><br /></span>Agenda time : {{time_from}} to {{time_to}}&nbsp; , {{day_date}}</p>
  //             <p style="font-family: lato, \'helvetica neue\', helvetica, arial, sans-serif; font-size: medium; font-weight: 400; background-color: #ffffff;">Please login with your WSA Elite Conference Account to confirm the appointment<br /><br />{{login_button}}</p>',
  //         ],




  //         [
  //             'type' => 'text', // input fields type
  //             'data' => 'string', // data type, string, int, boolean , text
  //             'name' => 'contact_us_mail_title', // unique name for field
  //             'label' => 'Mail Title : Contact Us Mail', // you know what label it is
  //             'placeholder' => '',
  //             'rules' => 'nullable|min:1|max:5000', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => "WSA Elite Event 2022 - Email Conformation" // default value if you want
  //         ],

  //         [
  //             'type' => 'text', // input fields type
  //             'data' => 'string', // data type, string, int, boolean , text
  //             'name' => 'contact_us_mail_to', // unique name for field
  //             'label' => 'Contact Us Mail (mail to)', // you know what label it is
  //             'placeholder' => 'Mail to Ex: \'email@email.com\'',
  //             'rules' => 'nullable|min:1|max:5000', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => "info@worldshippingalliance.com" // default value if you want
  //         ],
  //         [
  //             'type' => 'text', // input fields type
  //             'data' => 'string', // data type, string, int, boolean , text
  //             'name' => 'contact_us_mail_cc', // unique name for field
  //             'label' => 'Contact Us Mail (mail cc)', // you know what label it is
  //             'placeholder' => 'Mail cc Ex: \'email1,email2,email3\'',
  //             'rules' => 'nullable|min:1|max:5000', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => "fred@worldshippingalliance.com,ksroor@pyramidsfreight.com,farid@pyramidsfreight.com,info@worldshippingalliance.com" // default value if you want
  //         ],

  //         [
  //             'type' => 'texteditor', // input fields type
  //             'data' => 'text', // data type, string, int, boolean , text
  //             'name' => 'contact_us_mail_template', // unique name for field
  //             'label' => 'Contact Us Mail Mail Template', // you know what label it is
  //             'placeholder' => '',
  //             // 'show_example' => 'events.mailable.ContactUs.show',
  //             'merge_tags' => [
  //                 'name' => [
  //                   'name' => "Delegate Name",
  //                   'value' => "{{name}}",
  //                 ],
  //                 'company_name' => [
  //                   'name' => "Company Name",
  //                   'value' => "{{company_name}}",
  //                 ],
  //                 'wsa_id' => [
  //                   'name' => "Wsa ID",
  //                   'value' => "{{wsa_id}}",
  //                 ],
  //                 'phone' => [
  //                   'name' => "phone",
  //                   'value' => "{{phone}}",
  //                 ],
  //                 'phone_key' => [
  //                   'name' => "phone_key",
  //                   'value' => "{{phone_key}}",
  //                 ],
  //                 'email' => [
  //                   'name' => "email",
  //                   'value' => "{{email}}",
  //                 ],
  //                 'subject' => [
  //                   'name' => "subject",
  //                   'value' => "{{subject}}",
  //                 ],
  //                 'message' => [
  //                   'name' => "message",
  //                   'value' => "{{message}}",
  //                 ],
  //                 'country_name' => [
  //                   'name' => "Country Name",
  //                   'value' => "{{country_name}}",
  //                 ],
  //             ],
  //             'rules' => 'nullable|min:1', // validation rule of laravel
  //             'class' => 'w-auto px-2', // any class for input
  //             'value' => '<div><div>',
  //         ],

  //     ]
  // ],







];
