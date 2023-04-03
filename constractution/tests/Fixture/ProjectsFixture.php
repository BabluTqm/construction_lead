<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProjectsFixture
 */
class ProjectsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'user_id' => 1,
                'project_name' => 'Lorem ipsum dolor sit amet',
                'project_address' => 'Lorem ipsum dolor sit amet',
                'state' => 'Lorem ipsum dolor sit amet',
                'city' => 'Lorem ipsum dolor sit amet',
                'pincode' => 1,
                'assigned_status' => 'Lorem ipsum dolor sit amet',
                'accept_status' => 'Lorem ipsum dolor sit amet',
                'created_date' => '2023-02-28 11:15:27',
            ],
        ];
        parent::init();
    }
}
