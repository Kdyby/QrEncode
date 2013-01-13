<?php

/**
 * Test: Kdyby\QrEncode\QrCode.
 *
 * @testCase Kdyby\QrEncode\QrCodeTest
 * @author Filip Procházka <filip@prochazka.su>
 * @package Kdyby\QrEncode
 */

namespace KdybyTests\QrEncode;

use Kdyby\QrEncode\QrCode;
use Nette;
use Tester;
use Tester\Assert;

require_once __DIR__ . '/../bootstrap.php';



/**
 * @author Filip Procházka <filip@prochazka.su>
 */
class QrCodeTest extends Tester\TestCase
{

	public function testHasOption_DefaultIsFalse()
	{
		$qr = new QrCode('nemam');
		Assert::false($qr->hasOption(QrCode::STRUCTURED));
		Assert::false($qr->hasOption(QrCode::CASE_SENSITIVE));
		Assert::false($qr->hasOption(QrCode::CASE_INSENSITIVE));
		Assert::false($qr->hasOption(QrCode::KANJI));
		Assert::false($qr->hasOption(QrCode::ENCODE_8BIT));
	}



	public function testHasOption_SomeTrue()
	{
		$qr = new QrCode('nemam', 1, QrCode::ERR_CORR_L, 1, 1, QrCode::STRUCTURED | QrCode::CASE_SENSITIVE);
		Assert::true($qr->hasOption(QrCode::STRUCTURED));
		Assert::true($qr->hasOption(QrCode::CASE_SENSITIVE));
		Assert::false($qr->hasOption(QrCode::CASE_INSENSITIVE));
		Assert::false($qr->hasOption(QrCode::KANJI));
		Assert::false($qr->hasOption(QrCode::ENCODE_8BIT));
	}



	public function testHasOption_Defaults()
	{
		$qr = new QrCode('nemam');
		Assert::false($qr->hasOption(QrCode::STRUCTURED));
		Assert::false($qr->hasOption(QrCode::STRUCTURED, 0));
		Assert::false($qr->hasOption(QrCode::STRUCTURED, QrCode::KANJI));
		Assert::true($qr->hasOption(QrCode::STRUCTURED, QrCode::STRUCTURED));
		Assert::true($qr->hasOption(QrCode::STRUCTURED, QrCode::STRUCTURED | QrCode::STRUCTURED));
		Assert::true($qr->hasOption(QrCode::STRUCTURED, QrCode::STRUCTURED | QrCode::KANJI));
		Assert::true($qr->hasOption(QrCode::STRUCTURED, QrCode::STRUCTURED | QrCode::KANJI | QrCode::CASE_INSENSITIVE));
	}

}

\run(new QrCodeTest());
