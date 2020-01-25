<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],
        'file_page' => [
            'driver' => 'local',
            'root' => storage_path('app/public/file_page'),
            'visibility' => 'public',
        ],
        'banner_article' => [
            'driver' => 'local',
            'root' => storage_path('app/public/banner_article'),
            'visibility' => 'public',
        ],
        'signature_user' => [
            'driver' => 'local',
            'root' => storage_path('app/public/signature_user'),
            'visibility' => 'public',
        ],
        'photo_user' => [
            'driver' => 'local',
            'root' => storage_path('app/public/photo_user'),
            'visibility' => 'public',
        ],
        'activity_documentation' => [
            'driver' => 'local',
            'root' => storage_path('app/public/activity_documentation'),
            'visibility' => 'public',
        ],
        'barcode' => [
            'driver' => 'local',
            'root' => storage_path('app/public/barcode'),
            'visibility' => 'public',
        ],
        'law_notulen' => [
            'driver' => 'local',
            'root' => storage_path('app/public/law_notulen'),
            'visibility' => 'public',
        ],
        'proposal_cooperation' => [
            'driver' => 'local',
            'root' => storage_path('app/public/proposal_cooperation'),
            'visibility' => 'public',
        ],
        'agency_profile_cooperation' => [
            'driver' => 'local',
            'root' => storage_path('app/public/agency_profile_cooperation'),
            'visibility' => 'public',
        ],
        'law_draft' => [
            'driver' => 'local',
            'root' => storage_path('app/public/law_draft'),
            'visibility' => 'public',
        ],
        'old_mou' => [
            'driver' => 'local',
            'root' => storage_path('app/public/old_mou'),
            'visibility' => 'public',
        ],
        'file_deputi_information' => [
            'driver' => 'local',
            'root' => storage_path('app/public/file_deputi_information'),
            'visibility' => 'public',
        ],
        'photo_contact_deputi_information' => [
            'driver' => 'local',
            'root' => storage_path('app/public/photo_contact_deputi_information'),
            'visibility' => 'public',
        ],
        'photo_information_deputi_information' => [
            'driver' => 'local',
            'root' => storage_path('app/public/photo_information_deputi_information'),
            'visibility' => 'public',
        ],
        'photo_requirement_deputi_information' => [
            'driver' => 'local',
            'root' => storage_path('app/public/photo_requirement_deputi_information'),
            'visibility' => 'public',
        ],
        'photo_video_deputi_information' => [
            'driver' => 'local',
            'root' => storage_path('app/public/photo_video_deputi_information'),
            'visibility' => 'public',
        ],
        'proposal_cooperation_guest' => [
            'driver' => 'local',
            'root' => storage_path('app/public/proposal_cooperation_guest'),
            'visibility' => 'public',
        ],
        'agency_profile_cooperation_guest' => [
            'driver' => 'local',
            'root' => storage_path('app/public/agency_profile_cooperation_guest'),
            'visibility' => 'public',
        ],
        'barcode_guest' => [
            'driver' => 'local',
            'root' => storage_path('app/public/barcode_guest'),
            'visibility' => 'public',
        ],
        'law_notulen_guest' => [
            'driver' => 'local',
            'root' => storage_path('app/public/law_notulen_guest'),
            'visibility' => 'public',
        ],
        'law_draft_guest' => [
            'driver' => 'local',
            'root' => storage_path('app/public/law_draft_guest'),
            'visibility' => 'public',
        ],
        'ktp_guest' => [
            'driver' => 'local',
            'root' => storage_path('app/public/ktp_guest'),
            'visibility' => 'public',
        ],
        'npwp_guest' => [
            'driver' => 'local',
            'root' => storage_path('app/public/npwp_guest'),
            'visibility' => 'public',
        ],
        'siup_guest' => [
            'driver' => 'local',
            'root' => storage_path('app/public/siup_guest'),
            'visibility' => 'public',
        ],
        'activity_documentation_guest' => [
            'driver' => 'local',
            'root' => storage_path('app/public/activity_documentation_guest'),
            'visibility' => 'public',
        ],
        'article_photo' => [
            'driver' => 'local',
            'root' => storage_path('app/public/article_photo'),
            'visibility' => 'public',
        ],
        'photo_login' => [
            'driver' => 'local',
            'root' => storage_path('app/public/photo_login'),
            'visibility' => 'public',
        ],
        'page_photo' => [
            'driver' => 'local',
            'root' => storage_path('app/public/page_photo'),
            'visibility' => 'public',
        ],
        //
        'activity_documentation_guest_adendum' => [
            'driver' => 'local',
            'root' => storage_path('app/public/activity_documentation_guest_adendum'),
            'visibility' => 'public',
        ],
        'barcode_guest_adendum' => [
            'driver' => 'local',
            'root' => storage_path('app/public/barcode_guest_adendum'),
            'visibility' => 'public',
        ],
        'proposal_cooperation_guest_adendum' => [
            'driver' => 'local',
            'root' => storage_path('app/public/proposal_cooperation_guest_adendum'),
            'visibility' => 'public',
        ],
        'agency_profile_cooperation_guest_adendum' => [
            'driver' => 'local',
            'root' => storage_path('app/public/agency_profile_cooperation_guest_adendum'),
            'visibility' => 'public',
        ],
        'ktp_guest_adendum' => [
            'driver' => 'local',
            'root' => storage_path('app/public/ktp_guest_adendum'),
            'visibility' => 'public',
        ],
        'npwp_guest_adendum' => [
            'driver' => 'local',
            'root' => storage_path('app/public/npwp_guest_adendum'),
            'visibility' => 'public',
        ],
        'siup_guest_adendum' => [
            'driver' => 'local',
            'root' => storage_path('app/public/siup_guest_adendum'),
            'visibility' => 'public',
        ],
        'law_notulen_guest_adendum' => [
            'driver' => 'local',
            'root' => storage_path('app/public/law_notulen_guest_adendum'),
            'visibility' => 'public',
        ],
        'law_draft_guest_adendum' => [
            'driver' => 'local',
            'root' => storage_path('app/public/law_draft_guest_adendum'),
            'visibility' => 'public',
        ],
        'proposal_cooperation_adendum' => [
            'driver' => 'local',
            'root' => storage_path('app/public/proposal_cooperation_adendum'),
            'visibility' => 'public',
        ],
        'agency_profile_cooperation_adendum' => [
            'driver' => 'local',
            'root' => storage_path('app/public/agency_profile_cooperation_adendum'),
            'visibility' => 'public',
        ],
        'law_notulen_adendum' => [
            'driver' => 'local',
            'root' => storage_path('app/public/law_notulen_adendum'),
            'visibility' => 'public',
        ],
        'law_draft_adendum' => [
            'driver' => 'local',
            'root' => storage_path('app/public/law_draft_adendum'),
            'visibility' => 'public',
        ],
        'barcode_adendum' => [
            'driver' => 'local',
            'root' => storage_path('app/public/barcode_adendum'),
            'visibility' => 'public',
        ],
        'activity_documentation_adendum' => [
            'driver' => 'local',
            'root' => storage_path('app/public/activity_documentation_adendum'),
            'visibility' => 'public',
        ],
        //
        'activity_documentation_guest_extension' => [
            'driver' => 'local',
            'root' => storage_path('app/public/activity_documentation_guest_extension'),
            'visibility' => 'public',
        ],
        'activity_documentation_extension' => [
            'driver' => 'local',
            'root' => storage_path('app/public/activity_documentation_extension'),
            'visibility' => 'public',
        ],
        'barcode_guest_extension' => [
            'driver' => 'local',
            'root' => storage_path('app/public/barcode_guest_extension'),
            'visibility' => 'public',
        ],
        'proposal_cooperation_guest_extension' => [
            'driver' => 'local',
            'root' => storage_path('app/public/proposal_cooperation_guest_extension'),
            'visibility' => 'public',
        ],
        'agency_profile_cooperation_guest_extension' => [
            'driver' => 'local',
            'root' => storage_path('app/public/agency_profile_cooperation_guest_extension'),
            'visibility' => 'public',
        ],
        'ktp_guest_extension' => [
            'driver' => 'local',
            'root' => storage_path('app/public/ktp_guest_extension'),
            'visibility' => 'public',
        ],
        'npwp_guest_extension' => [
            'driver' => 'local',
            'root' => storage_path('app/public/npwp_guest_extension'),
            'visibility' => 'public',
        ],
        'siup_guest_extension' => [
            'driver' => 'local',
            'root' => storage_path('app/public/siup_guest_extension'),
            'visibility' => 'public',
        ],
        'law_notulen_guest_extension' => [
            'driver' => 'local',
            'root' => storage_path('app/public/law_notulen_guest_extension'),
            'visibility' => 'public',
        ],
        'law_draft_guest_extension' => [
            'driver' => 'local',
            'root' => storage_path('app/public/law_draft_guest_extension'),
            'visibility' => 'public',
        ],
        'proposal_cooperation_extension' => [
            'driver' => 'local',
            'root' => storage_path('app/public/proposal_cooperation_extension'),
            'visibility' => 'public',
        ],
        'agency_profile_cooperation_extension' => [
            'driver' => 'local',
            'root' => storage_path('app/public/agency_profile_cooperation_extension'),
            'visibility' => 'public',
        ],
        'law_notulen_extension' => [
            'driver' => 'local',
            'root' => storage_path('app/public/law_notulen_extension'),
            'visibility' => 'public',
        ],
        'law_draft_extension' => [
            'driver' => 'local',
            'root' => storage_path('app/public/law_draft_extension'),
            'visibility' => 'public',
        ],
        'barcode_extension' => [
            'driver' => 'local',
            'root' => storage_path('app/public/barcode_extension'),
            'visibility' => 'public',
        ],
        //
        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
        ],

    ],

];
