<?php

namespace Database\Seeders;

use App\Models\Announcement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['title' => 'New Office Opening', 'content' => 'We are excited to announce the opening of our new office in downtown. Join us for the grand opening ceremony next Monday at 10 AM.'],
            ['title' => 'Holiday Schedule', 'content' => 'Please note that our offices will be closed from December 24th to January 2nd for the holidays. We will resume normal business hours on January 3rd.'],
            ['title' => 'Software Update', 'content' => 'A new software update is available. Please update your app to the latest version for the best experience.'],
            ['title' => 'New Product Launch', 'content' => 'We are thrilled to announce the launch of our new product next month. Stay tuned for more details!'],
            ['title' => 'Maintenance Notice', 'content' => 'Our website will be down for maintenance from 2 AM to 4 AM tomorrow. We apologize for any inconvenience.'],
            ['title' => 'Job Openings', 'content' => 'We are hiring! Check out the Careers page on our website for more information about the open positions.'],
            ['title' => 'Event Reminder', 'content' => 'Don’t forget about our annual company picnic this Sunday. We hope to see you there!'],
            ['title' => 'Policy Update', 'content' => 'We have updated our privacy policy. Please review the new policy on our website.'],
            ['title' => 'Customer Appreciation Day', 'content' => 'Join us for our Customer Appreciation Day next Friday. We have a lot of fun activities and giveaways planned!'],
            ['title' => 'Survey Invitation', 'content' => 'We value your feedback. Please take a few minutes to complete our customer satisfaction survey.'],
        ];

        foreach ($data as $item) {
            Announcement::create($item);
        }
    }
}
