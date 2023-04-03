<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SetCreditTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SetCreditTable Test Case
 */
class SetCreditTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SetCreditTable
     */
    protected $SetCredit;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.SetCredit',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('SetCredit') ? [] : ['className' => SetCreditTable::class];
        $this->SetCredit = $this->getTableLocator()->get('SetCredit', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->SetCredit);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SetCreditTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\SetCreditTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
