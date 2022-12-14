<?php

/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "ATOXIOS", // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => 'ATOXIOSは、人の存在意義に価値を付ける。 その価値を競り落とす次世代型オークションサービス。 果たして、私たちには一体どれくらいの価値が存在しているのだろうか。', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => ['ATOXIOS'],
            'canonical'    => null, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'robots'       => false, // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'ATOXIOS', // set false to total remove
            'description' => 'ATOXIOSは、人の存在意義に価値を付ける。 その価値を競り落とす次世代型オークションサービス。 果たして、私たちには一体どれくらいの価値が存在しているのだろうか。', // set false to total remove
            'url'         => null, // Set null for using Url::current(), set false to total remove
            'type'        => 'website',
            'site_name'   => 'ATOXIOS',
            'images'      => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            'card'        => 'summary',
            'site'        => '@ATOXIOS_PR',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'ATOXIOS', // set false to total remove
            'description' => 'ATOXIOSは、人の存在意義に価値を付ける。 その価値を競り落とす次世代型オークションサービス。 果たして、私たちには一体どれくらいの価値が存在しているのだろうか。', // set false to total remove
            'url'         => null, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];
