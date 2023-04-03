<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AssignedUsersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AssignedUsersTable Test Case
 */
class AssignedUsersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AssignedUsersTable
     */
    protected $AssignedUsers;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.AssignedUsers',
        'app.Projects',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('AssignedUsers') ? [] : ['className' => AssignedUsersTable::class];
        $this->AssignedUsers = $this->getTableLocator()->get('AssignedUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->AssignedUsers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AssignedUsersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AssignedUsersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
