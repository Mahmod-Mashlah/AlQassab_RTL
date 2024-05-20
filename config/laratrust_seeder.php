<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'manager' => [ //done
            'years' => 'i,s,se',
            'seasons' => 'i,s,se',
            'employees' => 'i,s,se',
            'users' => 'i,s,se',
            'students' => 'i,s,se',
            'behavioral_notes' => 'i,s,se',
            'chat_rooms' => 'i,s,a,d,u,se',
            'protests' => 'i,s,se',
            'daily_schedules' => 'i,s,se',
            'tests_schedules' => 'i,s,se',
            'exams_schedules' => 'i,s,se',
            'adverts' => 'i,s,a,d,u,se',
            'students_rankings' => 'i,s,se',
            'marks_records' => 'i,s,se',

        ],
        'secretary' => [ //done
            'users' => 'i,s,a,d,u,se',
            'roles' => 'i,s,a,d,u,se',
            'permissions' => 'i,s,a,d,u,se',
            'employees' => 'i,s,a,d,u,se',
            'students' => 'i,s,a,d,u,se',
            'parents' => 'i,s,a,d,u,se',
            'classes' => 'i,s,a,d,u,se',
            'sections' => 'i,s,a,d,u,se',
            'subjects' => 'i,s,a,d,u,se',
            'years' => 'i,s,a,d,u,se',
            'seasons' => 'i,s,a,d,u,se',
            'notebooks' => 'i,s,a,d,u,se',
            'acceptance_notebooks' => 'i,s,a,d,u,se',
            'transmit_notebooks' => 'i,s,a,d,u,se',
            'in_records' => 'i,s,a,d,u,se',
            'out_records' => 'i,s,a,d,u,se',
            'marks_records' => 'i,s,a,d,u,se',
            'daily_schedules' => 'i,s,a,d,u,se',
            'tests_schedules' => 'i,s,se',
            'exams_schedules' => 'i,s,se',
            'adverts' => 'i,s,se',
            'teachers_attends' => 'i,sوse',
            'files' => 'i,s,a,d,u,se,up,do',


        ],
        'mentor' => [ //done
            'users' => 'i,s,se',
            'students' => 'i,s,se',
            'parents' => 'i,s,se',
            'years' => 'i,s,se',
            'seasons' => 'i,s,se',
            'behavioral_notes' => 'i,s,a,d,u,se',
            'exit_permissions' => 'i,s,a,d,u,se',
            'protests' => 'i,s,se',
            'marks_records' => 'i,s,a,d,u,se',
            'students_sections' => 'i,s,a,d,u,se',
            'students_attends' => 'i,s,a,d,u,se',
            'students_daily_attends' => 'i,s,a,d,u,se',
            'teachers_attends' => 'i,s,a,d,u,se',
            'adverts' => 'i,s,a,d,u,se',
            'daily_schedules' => 'i,s,se',
            'tests_schedules' => 'i,s,a,d,u,se',
            'exams_schedules' => 'i,s,a,d,u,se',
            'files' => 'i,s,a,d,u,se,up,do',

        ],

        'teacher' => [ //done
            'chat_rooms' => 'i,s,a,d,u,se',
            'homeworks' => 'i,s,a,d,u,se',
            'tests' => 'i,s,a,d,u,se',
            'exams' => 'i,s,a,d,u,se',
            'lessons' => 'i,s,a,d,u,se',
            'files' => 'i,s,a,d,u,se,up,do',
            'lessons_comments' => 'i,s,a,d,u,se',
            'students_sections' => 'i,s,se',
            'subjects' => 'i,s,se',
            'daily_schedules' => 'i,s,se',
            'tests_schedules' => 'i,s,se',
            'exams_schedules' => 'i,s,se',
            'adverts' => 'i,s,se',

        ],
        'student' => [ //done
            'daily_schedules' => 'i,s,se',
            'tests_schedules' => 'i,s,se',
            'exams_schedules' => 'i,s,se',
            'adverts' => 'i,s,se',
            'protests' => 'i,s,a,d,u,se',
            'years' => 'i,s,se',
            'seasons' => 'i,s,se',
            'homeworks' => 'i,s,se',
            'tests' => 'i,s,se',
            'exams' => 'i,s,se',
            'lessons' => 'i,s,se',
            'files' => 'i,s,se,do',
            'lessons_comments' => 'i,s,a,d,u,se',
            'marks_records' => 's,se',
            'chat_rooms' => 'i,s,se',
            'subjects' => 'i,s,se',


        ],
        'parent' => [ //done
            'daily_schedules' => 'i,s,se',
            'tests_schedules' => 'i,s,se',
            'exams_schedules' => 'i,s,se',
            'adverts' => 'i,s,se',
            'protests' => 'i,s,a,d,u,se',
            'behavioral_notes' => 'i,s,se',
            'years' => 'i,s,se',
            'seasons' => 'i,s,se',
            'homeworks' => 'i,s,se',
            'tests' => 'i,s,se',
            'exams' => 'i,s,se',
            'lessons' => 'i,s,se',
            'files' => 'i,s,se,do',
            'lessons_comments' => 'i,s,a,d,u,se',
            'marks_records' => 's,se',
            'chat_rooms' => 'i,s,se',
            'subjects' => 'i,s,se',

        ],
    ],

    'permissions_map' => [
        'i' => 'index',
        's' => 'show',
        'a' => 'add',
        'd' => 'delete',
        'u' => 'update',
        'se' => 'search',
        'do' => 'download',
        'up' => 'upload',
    ],
];
