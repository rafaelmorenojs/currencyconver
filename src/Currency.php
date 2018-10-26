<?php

namespace rafaelmorenojs\CurrencyConver;

use Ixudra\Curl\Facades\Curl;
/**
 * 
 */
class Currency
{
	/**
	 * Moneda actual. Ejemplo: COP
	 * @var string
	 */
	private $from;

	/**
	 * Moneda a convertir. Ejemplo: USD
	 * @var [type]
	 */
	private $to;

	/**
	 * Monto en moneda actual
	 * @var string
	 */
	private $amount;

	/**
	 * Solicitamos la moneda de la que desea convertir
	 * @param  string $from [description]
	 * @return [type]       [description]
	 */
	public function from(string $from)
	{
		$this->from = $from;
		return $this;
	}

	/**
	 * Solicitamos la moneda a la que desea convertir
	 * @param  string $to [description]
	 * @return [type]     [description]
	 */
	public function to(string $to)
	{
		$this->to = $to;
		return $this;
	}

	/**
	 * Solicitamos el monto de la moneda actual
	 * @param  string  $amount [description]
	 * @return [type]         [description]
	 */
	public function amount(string $amount)
	{
		$amount = str_replace(',', '', number_format($amount, 2));

		$this->amount = $amount;
		return $this;
	}

	/**
	 * Hacemos la conversion
	 * @return [type] [description]
	 */
	public function calc()
	{
		$q = "{$this->from}_{$this->to}";

		$response = Curl::to("http://free.currencyconverterapi.com/api/v5/convert?q={$q}&compact=y")
						->get();

		$result = json_decode($response, true);

		return $result[$q]['val'] * $this->amount;
	}
}