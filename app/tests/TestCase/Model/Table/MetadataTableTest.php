<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MetadataTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MetadataTable Test Case
 */
class MetadataTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MetadataTable
     */
    public $Metadata;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.metadata'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Metadata') ? [] : ['className' => MetadataTable::class];
        $this->Metadata = TableRegistry::get('Metadata', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Metadata);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
