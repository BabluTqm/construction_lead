<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContractorCreditTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContractorCreditTable Test Case
 */
class ContractorCreditTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ContractorCreditTable
     */
    protected $ContractorCredit;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.ContractorCredit',
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
        $config = $this->getTableLocator()->exists('ContractorCredit') ? [] : ['className' => ContractorCreditTable::class];
        $this->ContractorCredit = $this->getTableLocator()->get('ContractorCredit', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ContractorCredit);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ContractorCreditTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ContractorCreditTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
