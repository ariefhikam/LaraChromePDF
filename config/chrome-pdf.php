<?php

return [
    'browser' => [
        'binnary' => env('CHROME_BINNARY', '/usr/bin/google-chrome-stable'),
        'size' => [1920, 1000],
        'sandbox' => false,

        'enableImages' => true,
        'envVariables' => [],
        'headless' => true,
        'ignoreCertificateErrors' => true,
        'userAgent' => '',
        'customFLags' => [],
    ],
    'pdf' => [
        'temporary_folder' => sys_get_temp_dir(),
        /* 'temporary_folder' => __DIR__ . '/../tests/results', */
        'landscape'           => true,
        'printBackground'     => true,
        'displayHeaderFooter' => true,
        'preferCSSPageSize'   => true,
        'marginTop'           => 0.0,
        'marginBottom'        => 1.4,
        'marginLeft'          => 5.0,
        'marginRight'         => 1.0,
        'paperWidth'          => 6.0,
        'paperHeight'         => 6.0,
        'scale'               => 1.2,
    ],
];

