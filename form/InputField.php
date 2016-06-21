<?php

namespace Luba\Form;

use Luba\Framework\Validator;

class InputField extends FormField
{
	/**
	 * Input type
	 *
	 * @var string
	 */
	protected $type;

	/**
	 * Input value
	 *
	 * @var string
	 */
	protected $value;

	/**
	 * Other attributes
	 *
	 * @var array
	 */
	protected $other;

	/**
	 * Initialization
	 *
	 * @param string $type
	 * @param string $name
	 * @param string $value
	 * @param array $attributes
	 * @param array $other
	 * @return void
	 */
	public function __construct($type, $name, $value = NULL, array $attributes = [], array $other = [])
	{
		$this->type = $type;
		$this->name = $name;
		$this->value = $value;
		$this->attributes = $attributes;
		$this->other = $other;
	}

	/**
	 * Render the Input Field
	 *
	 * @return array
	 */
	public function render()
	{
		$label = $this->label;
		$type = $this->type;
		$name = $this->name;
		$value = $this->value ? "value=\"{$this->value}\"" : "";
		$attributes = $this->renderAttributes($this->attributes);
		$other = $this->renderAttributes($this->other);
		$labelAttributes = $this->renderAttributes($this->labelAttributes);

		return [
			'label' => is_null($label) ? "" : "<label for=\"$name\" $labelAttributes>$label</label>",
			'field' => "<input type=\"$type\" name=\"$name\" id=\"$name\" $value $attributes $other>"
		];
	}
}