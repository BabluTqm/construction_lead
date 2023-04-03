<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SetCreditFixture
 */
class SetCreditFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'set_credit';
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
                'credit' => 1,
            ],
        ];
        parent::init();
    }
}
