<?php
/*
 * Local configuration file to provide any overrides to your app.php configuration.
 * Copy and save this file as app_local.php and make changes as required.
 * Note: It is not recommended to commit files with credentials such as app_local.php
 * into source code version control.
 */
return [
    /*
     * Debug Level:
     *
     * Production Mode:
     * false: No error messages, errors, or warnings shown.
     *
     * Development Mode:
     * true: Errors and warnings shown.
     */
    'debug' => filter_var(env('DEBUG', true), FILTER_VALIDATE_BOOLEAN),

    /*
     * Security and encryption configuration
     *
     * - salt - A random string used in security hashing methods.
     *   The salt value is also used as the encryption key.
     *   You should treat it as extremely sensitive data.
     */
    'Security' => [
        'salt' => env('SECURITY_SALT', 'daae1b2fad5876b26acc4f33dcd659e4eea7458047e744c792cf436c9929d723'),
    ],

    /*
     * Connection information used by the ORM to connect
     * to your application's datastores.
     *
     * See app.php for more configuration options.
     */
    'Datasources' => [
        'default' => [
            'host' => 'localhost',
            'username' => 'root',
            'password' => 'password',
            'timezone' => '',
            'database' => 'construction',
            /*
             * If not using the default 'public' schema with the PostgreSQL driver
             * set it here.
             */
            //'schema' => 'myapp',

            /*
             * You can use a DSN string to set the entire configuration
             */
            'url' => env('DATABASE_URL', null),
        ],

        /*
         * The test connection is used during the test suite.
         */
        // 'test' => [
        //     'host' => 'localhost',
        //     //'port' => 'non_standard_port_number',
        //     'username' => 'my_app',
        //     'password' => 'secret',
        //     'database' => 'test_myapp',
        //     //'schema' => 'myapp',
        //     'url' => env('DATABASE_TEST_URL', 'sqlite://127.0.0.1/tests.sqlite'),
        // ],
    ],

    /*
     * Email configuration.
     *
     * Host and credential configuration in case you are using SmtpTransport
     *
     * See app.php for more configuration options.
     */
    // 'EmailTransport' => [
    //     'default' => [
    //         'host' => 'localhost',
    //         'port' => 25,
    //         'username' => null,
    //         'password' => null,
    //         'client' => null,
    //         'url' => env('EMAIL_TRANSPORT_DEFAULT_URL', null),
    //     ],
    // ],
    'EmailTransport' => [
        'gmail' => [
            'host' => 'smtp.gmail.com',
            'port' => 587,
            'username' => 'chandreshck9559@gmail.com', //eg: sample[at]gmail.com
            'password' => 'roezumgjsxyzpbcc', //email password
            'className' => 'Smtp',
            'tls' => true,
            'client' => null,
            'url' => env('EMAIL_TRANSPORT_DEFAULT_URL', null),
        ],
    ],
];
