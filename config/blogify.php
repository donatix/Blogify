<?php

return [

    /**
     * The model used for authentication and/or your users.
     *
     */
    'auth_model' => \App\User::class,

    /**
     * Array with all available character sets
     *
     */
    'char_sets' => [
        'hash'      => 'ABCDEFGHIJKLMNOPQRSTUVWabcdefghijklmnopqrstuvw0123456789',
        'password'  => 'ABCDEFGHIJKLMNOPQRSTUVWabcdefghijklmnopqrstuvw0123456789@$?!',
    ],

    /**
     * Information about the admin user
     * This will be used to seed the users table
     */
    'admin_user'     => [
        'name'          => 'Admin',
        'email'         => env('BLOGIFY_ADMIN_EMAIL', 'admin@example.com'),
        'password'      => env('BLOGIFY_ADMIN_PASSWORD', 'secret'),
    ],

    /**
     * Defines how many items per
     * page you want to show
     *
     */
    'items_per_page' => 20,

    /**
     * Defines how much time the config items
     * retrived from the database to be cached.
     * The value is in minutes.
     * Such tables are visibilities, statuses ...
     */
    'config_items_cache_time' => 60 * 24,

    /**
     * Paths where uploaded images
     * wil be placed
     *
     */
    'upload_paths'  => [
        'posts' => [
            'images'    => 'uploads/posts/',
        ],
        'profiles' => [
            'profilepictures' => 'uploads/profilepictures/',
        ],
    ],

    /**
     * The size where an uploaded
     * image will be resized to
     *
     */
    'image_sizes'   => [
        'posts' => [500, null],
        'profilepictures' => [100, 100],
    ],

    /**
     * Define if new comments
     * first needs approval
     *
     */
    'approve_comments_first' => true,

    /**
     * Set this to true when you have ran the
     * blogify:generate command to enable the
     * routes of the public part
     *
     */
    'enable_default_routes' => true,

    /**
     * If should send emails to reviewers of
     * posts in the blog
     */
    'notify_reviewers' => env('BLOGIFY_NOTIFY_REVIEWERS', false),
];
