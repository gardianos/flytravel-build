<?php

return array(


    'pdf' => array(
        'enabled' => true,
        'binary' => base_path('vendor\h4cc\wkhtmltox\bin\wkhtmltopdf'),
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),
    'image' => array(
        'enabled' => true,
        'binary' => base_path('vendor\h4cc\wkhtmltox\bin\wkhtmltoimage'),
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),


);
