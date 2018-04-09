<?php

return array(
    'php' => array(
        'settings' => array(
            'date.timezone' => 'America/Lima',
            'intl.default_locale' => 'es_PE',
            'display_startup_errors' => false,
            'display_errors' => true,
            'error_reporting' => E_ALL & ~E_USER_DEPRECATED,
            'post_max_size' => '804857600',
        )
    ),
    'error' => array(
        'send_mail' => false,
        'local_log' => true,
    ),
    'db' => array(
        'driver' => 'pdo_mysql',
        'hostname' => 'localhost',
        'database' => 'stockingmate',
        'username' => 'projectuser',
        'password' => 'projectpass',
        'port' => '3306',
        'driver_options' => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'utf8\''
        )
    ),
//    'cacheCart' => array(
//        'adapter' => array(
//            'name'     =>'memcached',
//            'options'  => array(
//                'servers'   => array(
//                    array(
//                        '127.0.0.1',11211
//                    )
//                ),
//                'namespace'  => '-cart-',
//                'ttl' => 60*60*24,
//            )
//        ),
//        'plugins' => array(
//            'exception_handler' => array('throw_exceptions' => false),
//            'serializer',
//        ),
//    ),
//    'cacheDb' => array(
//        'adapter' => array(
//            'name'     =>'memcached',
//            'options'  => array(
//                'servers'   => array(
//                    array(
//                        '127.0.0.1',11211
//                    )
//                ),
//                'namespace'  => '-db-',
//                'ttl' => 60*60*24,
//            )
//        ),
//        'plugins' => array(
//            'exception_handler' => array('throw_exceptions' => false),
//            'serializer',
//        ),
//    ),
    'cacheCart' => array(
        'adapter' => 'filesystem',
        'options' => array(
            'cache_dir' => './data/cache',
            'dirPermission' => 0755,
            'filePermission' => 0666,
            'namespaceSeparator' => '-cart-',
            'ttl' => 60*60*250
        ),
        'plugins' => array(
            'exception_handler' => array('throw_exceptions' => false),
            'serializer'
        )
    ),
    'cacheDb' => array(
        'adapter' => 'filesystem',
        'options' => array(
            'cache_dir' => './data/cache',
            'dirPermission' => 0755,
            'filePermission' => 0666,
            'namespaceSeparator' => '-db-',
            'ttl' => 60*60*250
        ),
        'plugins' => array(
            'exception_handler' => array('throw_exceptions' => false),
            'serializer'
        )
    ),
    /*
    'mail' => array(
        'transport' => array(
            'options' => array(
                'host' => '204.232.198.40',
                'port' => 25,
            ),
        ),
        'fromEmail' => 'contacto@coneypark.com',
        'fromName' => 'ConeyPark',
        'subject' => 'ConeyPark'
    ),*/
    'mail' => array(
        'transport' => array(
            'options' => array(
                'host' => 'smtp.gmail.com',
                'port' => 587,
                'connection_class'  => 'login',
                'connection_config' => array(
                    'username' => 'autopasioncompany@gmail.com',
                    'password' => 'Cistensure111',
                    'ssl' => 'tls',
                ),
            ),
        ),
        'fromEmail' => 'contacto@sm.com',
        'fromName' => 'Mayorix',
        'subject' => 'Mayorix'
    ),
    //Emails
    'emails' => array(
        'admin' => 'ing.angeljara@gmail.com', // email del administrador
        'developers' => 'ing.angeljara@gmail.com', // emails de los dev
        'from' => 'contacto@sm.com',
    ),
    'social' => array( //local
        'facebook' => array(
            'app_id' => '1676429382610359',
            'api_secret' => 'c29480e4a45c99ce0040cb4b0801d6ee',
            'default_scope' => 'email,user_friends,user_location',
            'redirect_callback' => 'login/callback/facebook',
        ),
        'twitter' => array(
            'oauth_access_token' => '382920909-7o6d7IzogwJTc8PtKDMpC8oUm5TaXXEA50NHDm62',
            'oauth_access_token_secret' => '4VfBvFULklW59WTPsJa5gS0zrPCILltVHcxJFcdEC9ovi',
            'consumer_key' => 'KAkyvbsAq5GvegoIuhdMLuBo0',
            'consumer_secret' => 'FC9HkFAi8B0yY4wn2NxObQDqRJcx0BcD6vtYNVlWxT0JDh71J4',
            'redirect_callback' => 'login/callback/twitter',
        ),
    ),

    //Application config params
    'app' => array(
        'environment' => 'development',

        'paymentProcessor' => array(
            'pagoEfectivo' => array(

                'merchanId' => 'ACI',
                //'merchanId' => 'HOK',
                'baseUrl' => 'https://pre.2b.pagoefectivo.pe/',
                'wscrypta' => 'PagoEfectivoWSCrypto/WSCrypto.asmx?WSDL', //data encrypt ws
                'wscip2' => 'PagoEfectivoWSGeneralv2/service.asmx?WSDL', //cip generator ws
                'wsgenpago' => 'GenPago.aspx', //PE's CIP window
                'wsgenpagoiframe' => 'GenPagoIF.aspx', //
                'securityPath' => APP_PATH . '/data/private/dev/', //PE's key path
                'publickey' => 'SPE_PublicKey.1pz', //PE's public key
                'privatekey' => 'ACI_PrivateKey.1pz', // PE's secret key
                'medioPago' => '1,2',
                'adminEmail' => 'ing.angeljara@gmail.com', // PE's secret key

                'conceptoPago' => 'ConeyPark',
                'cipExpiracionDias' => 1
            ),
            'visa' => array(
                'baseUrl' => 'http://qas.multimerchantvisanet.com/',
                'wsEticket' => 'WSGenerarEticket/WSEticket.asmx?wsdl',
                'formularioPago' => 'formularioweb/formulariopago.asp',
                'wsConsultaTicket' => 'WSConsulta/WSConsultaEticket.asmx?wsdl',
                'codigoComercio' => '490345336',
            ),
        ),
    ),
);
