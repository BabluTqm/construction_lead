<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UserServicesFixture
 */
class UserServicesFixture extends TestFixture
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
                'service_id' => 1,
                'created_date' => '2023-02-28 11:16:05',
            ],
        ];
        parent::init();
    }
}
