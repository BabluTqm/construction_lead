<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OwnerServicesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OwnerServicesTable Test Case
 */
class OwnerServicesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OwnerServicesTable
     */
    protected $OwnerServices;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.OwnerServices',
        'app.Projects',
        'app.Users',
        'app.Services',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('OwnerServices') ? [] : ['className' => OwnerServicesTable::class];
        $this->OwnerServices = $this->getTableLocator()->get('OwnerServices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->OwnerServices);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\OwnerServicesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\OwnerServicesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
