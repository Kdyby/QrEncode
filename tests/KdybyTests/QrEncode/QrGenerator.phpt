<?php

/**
 * Test: Kdyby\QrEncode\QrGenerator.
 *
 * @testCase Kdyby\QrEncode\QrGeneratorTest
 * @author Filip Procházka <filip@prochazka.su>
 * @package Kdyby\QrEncode
 */

namespace KdybyTests\QrEncode;

use Kdyby\QrEncode\DI\Configuration;
use Kdyby\QrEncode\QrCode;
use Kdyby\QrEncode\QrGenerator;
use Nette;
use Tester;
use Tester\Assert;

require_once __DIR__ . '/../bootstrap.php';



/**
 * @author Filip Procházka <filip@prochazka.su>
 */
class QrGeneratorTest extends Tester\TestCase
{

	public function testFunctional()
	{
		$gen = new QrGenerator(new Configuration());
		$code = new QrCode("Kdyby is awesome!");
		Assert::same(file_get_contents(__DIR__ . '/images/kdyby.png'), $code->render($gen));
	}

}

\run(new QrGeneratorTest());
