<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SoftwareController extends Controller
{
    public function index()
    {
        // Sample data to be replaced with actual data from your database
        $softwares = [
            [
                'name' => 'Madi IT Softwares',
                'description' => 'This is an example software description for Madi IT Softwares.',
                'tickets' => [
                    [
                        'priority' => 'High',
                        'created_at' => '2023-10-01',
                        'title' => 'Critical Bug Fix',
                        'description' => 'Fix the critical bug in the system.',
                        'assigned_to' => [
                            'name' => 'John Doe',
                            'avatar' => 'path/to/avatar.jpg'
                        ],
                        'status' => 'Open'
                    ],
                    [
                        'priority' => 'Medium',
                        'created_at' => '2023-10-02',
                        'title' => 'Feature Request',
                        'description' => 'Add a new feature to the system.',
                        'assigned_to' => [
                            'name' => 'Jane Smith',
                            'avatar' => 'path/to/avatar2.jpg'
                        ],
                        'status' => 'In Progress'
                    ]
                ]
            ],
            [
                'name' => 'Tech Solutions',
                'description' => 'This is an example software description for Tech Solutions.',
                'tickets' => [
                    [
                        'priority' => 'Low',
                        'created_at' => '2023-10-03',
                        'title' => 'Minor Bug Fix',
                        'description' => 'Fix a minor bug in the system.',
                        'assigned_to' => [
                            'name' => 'Alice Johnson',
                            'avatar' => 'path/to/avatar3.jpg'
                        ],
                        'status' => 'Closed'
                    ],
                    [
                        'priority' => 'High',
                        'created_at' => '2023-10-04',
                        'title' => 'Security Update',
                        'description' => 'Implement a security update.',
                        'assigned_to' => [
                            'name' => 'Bob Brown',
                            'avatar' => 'path/to/avatar4.jpg'
                        ],
                        'status' => 'Open'
                    ]
                ]
            ]
        ];
        

        return view('tickets.index', compact('softwares'));
    }
}
