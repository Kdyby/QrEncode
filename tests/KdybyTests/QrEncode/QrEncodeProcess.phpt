<?php

/**
 * Test: Kdyby\QrCode\QrEncodeProcess.
 *
 * @testCase Kdyby\QrCode\QrEncodeProcessTest
 * @author Filip Procházka <filip@prochazka.su>
 * @package Kdyby\QrCode
 */

namespace KdybyTests\QrCode;

use Kdyby\QrEncode\QrEncodeProcess;
use Nette;
use Tester;
use Tester\Assert;

require_once __DIR__ . '/../bootstrap.php';



/**
 * @author Filip Procházka <filip@prochazka.su>
 */
class QrEncodeProcessTest extends Tester\TestCase
{

	/**
	 * @return array
	 */
	public function dataBuildCommand()
	{
		return array(
			array('qrencode --output=-', array('--output=-',)), // no key
			array("qrencode 'value'", array('' => 'value',)), // string key
			array('qrencode --size=1', array('--size' => 1,)), // int
			array('qrencode', array('--structured' => FALSE,)), // bool false
			array('qrencode --structured', array('--structured' => TRUE,)), // bool true
			array("qrencode --test='string'", array('--test' => "string",)), // string
		);
	}



	/**
	 * @dataProvider dataBuildCommand
	 *
	 * @param string $expectedCmd
	 * @param array $opts
	 */
	public function testBuildCommand($expectedCmd, $opts)
	{
		$process = new QrEncodeProcess($opts);
		Assert::same($expectedCmd, $process->buildCommand());
	}

}

\run(new QrEncodeProcessTest());
