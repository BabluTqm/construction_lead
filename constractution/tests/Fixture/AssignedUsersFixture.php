<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AssignedUsersFixture
 */
class AssignedUsersFixture extends TestFixture
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
                'user_owner_id' => 1,
                'project_id' => 1,
                'assigned_userid' => 1,
                'created_date' => '2023-02-28 11:16:27',
            ],
        ];
        parent::init();
    }
}
