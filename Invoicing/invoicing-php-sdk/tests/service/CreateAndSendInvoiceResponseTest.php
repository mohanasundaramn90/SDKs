<?php
require_once 'services\Invoice\Invoice.php';
require_once 'PPUtils.php';
/**
 * Test class for CreateAndSendInvoiceResponse.
 *
 */
class CreateAndSendInvoiceResponseTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @var CreateAndSendInvoiceResponse
	 */
	protected $object;
	protected $map;
	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
		$this->map = array(
    		'responseEnvelope.ack' => 'Success',
'responseEnvelope.timestamp' => '2011-05-29T23%3A58%3A46.879-07%3A00',
'responseEnvelope.correlationId' =>  '2eba4859262a9',
'responseEnvelope.build' =>  '1917403',
'invoiceID' =>  'INV2-GEKM-LTFQ-7NWN-9YDL',
'invoiceNumber' =>  '0019',
		);

	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown()
	{
	}
	/**
	 * @test
	 */
	public function testDecode()
	{
		$ret = $this->object = new CreateAndSendInvoiceResponse();
$ret->init($this->map);
		$this->assertEquals('INV2-GEKM-LTFQ-7NWN-9YDL' , $ret->invoiceID);
		$this->assertNull($ret->error);
		$this->assertEquals('0019' ,$ret->invoiceNumber);

		$this->assertEquals('Success', $ret->responseEnvelope->ack);
		$this->assertEquals('1917403', $ret->responseEnvelope->build);
		$this->assertEquals('2eba4859262a9', $ret->responseEnvelope->correlationId);
		$this->assertEquals('2011-05-29T23%3A58%3A46.879-07%3A00', $ret->responseEnvelope->timestamp);

	}
}

?>
