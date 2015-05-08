<?php

/*
 * Driver Configuration
 */
return [
    
    /*
     * Process for Google Calendar:
     * 
     * - Create Google Account
     * - Go to Google Developer API Console
     * - Create Project
     * - Enable Calendar API
     * - Go to Calendar UI and share calendar using service account name
     */
    'google' => [
        
        'default_calendar_id' => 'primary',
        
        'client_id' => '',
        
        'service_account_name' => '',
        
        'application_name' => '',
        
        'key' => 'file_path',
        
        'scopes' => [
            'https://www.googleapis.com/auth/calendar',
        ],

    ],
    
    'event' => [

        /*
         * Optional viewer class
         */
        'viewer' => 'EventViewer',
        
        /*
         * Default event attributes with their default value
         */
        'attributes' => [
            'calendar_id' => '',
            'id' => '',
            'parent_id' => '',
            'title' => '',
            'description' => '',
            'location' => '',
            'attendees' => [],
            'start' => '',
            'end' => '',
            'all_day' => false,
            'status' => '',
            'timeZone' => '',
            'rrule' => '',
            'rruleArray' => [],
            'isRecurrence' => false,
        ],
    ],
    
    'attendee' => [

        /*
         * Optional viewer class
         */
        'viewer' => 'AttendeeViewer',
        
        /*
         * Default attendee attributes with their default value
         */
        'attributes' => [
            'id' => '',
            'name' => '',
            'email' => '',
            'comment' => '',
            'status' => '',
        ]
    ],

];
