<?php

return [
    'mode' => '',
    'format' => 'A4',
    'default_font_size' => '12',
    'default_font' => 'Phetsarath OT',
    'margin_left' => 10,
    'margin_right' => 10,
    'margin_top' => 10,
    'margin_bottom' => 10,
    'margin_header' => 0,
    'margin_footer' => 0,
    'orientation' => 'P',
    'title' => 'Laravel mPDF',
    'author' => '',
    'watermark' => '',
    'show_watermark' => false,
    'watermark_font' => 'sans-serif',
    'display_mode' => 'fullpage',
    'watermark_text_alpha' => 0.1,
    'custom_font_dir' => '',
    'custom_font_data' => [],
    'auto_language_detection' => false,
    'temp_dir' => '',
    'pdfa' => false,
    'pdfaauto' => false,
    /* 'custom_font_dir' => base_path('resources/font/'), // don't forget the trailing slash!
    'custom_font_data' => [
        'examplefont' => [
            'R'  => 'Phetsarath OT.ttf',    // regular font

        ] */

    'font_path' => base_path('resources/font/'),
    'font_data' => [
        'examplefont' => [
            'R'  => 'Phetsarath OT.ttf',    // regular font

            /* 'B'  => 'ExampleFont-Bold.ttf',       // optional: bold font
            'I'  => 'ExampleFont-Italic.ttf',     // optional: italic font
            'BI' => 'ExampleFont-Bold-Italic.ttf' // optional: bold-italic font */
            //'useOTL' => 0xFF,    // required for complicated langs like Persian, Arabic and Chinese
            //'useKashida' => 75,  // required for complicated langs like Persian, Arabic and Chinese
        ]

        // ...add as many as you want.
    ]
];
