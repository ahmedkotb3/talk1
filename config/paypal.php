<?php
return array(
// set your paypal credential
    'client_id' => 'ASg2lGDSZsa3Nh2WdLu1HwS5JR6RXoJgKgCPaoKr2G0vmsQCRimLBxTvNY9tGu-B8S3q6XXm0dUF3XHo',
    'secret' => 'EFB--LwYvOjwpjbFQwZZazXpJ_z4c-MC76hZGarIgA_rRyAbKbih1mJI-cHwbaVuSmvulcaHa6W6Mt5K',
    /**
     * SDK configuration
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',
        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,
        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,
        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',
        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);