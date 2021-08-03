<?php

namespace App\Support\Forms\Structure;

class Form
{
    private array $form = [];

    /**
     * @param string $route
     *
     * @return $this
     */
    public function route(string $route): self
    {
        $this->form['route'] = $route;

        return $this;
    }

    /**
     * @param string $method
     *
     * @return $this
     */
    public function method(string $method): self
    {
        $this->form['method'] = $method;

        return $this;
    }

    /**
     * @param string $type
     * @param string $key
     * @param string $label
     * @param string|int|null $value
     * @param bool $required
     * @param bool $disabled
     * @param array $conditional_visibility
     *
     * @return $this
     */
    public function addInput(string $type, string $key, string $label, string|int $value = null, bool $required = true, bool $disabled = false, array $conditional_visibility = []): self
    {
        $this->form['fields'][$key] = [
            'type' => 'input',
            'input_type' => $type,
            'key' => $key,
            'label' => $label,
            'value' => $value,
            'required' => $required,
            'disabled' => $disabled,
            'conditional_visibility' => $conditional_visibility,
        ];

        return $this;
    }

    /**
     * @param string $key
     * @param string $label
     * @param array $options
     * @param string|int|null $value
     * @param bool $required
     * @param bool $disabled
     * @param array $conditional_visibility
     *
     * @return $this
     */
    public function addSelect(string $key, string $label, array $options, string|int $value = null, bool $required = true, bool $disabled = false, array $conditional_visibility = []): self
    {
        $this->form['fields'][$key] = [
            'type' => 'select',
            'key' => $key,
            'label' => $label,
            'options' => $options,
            'value' => $value,
            'required' => $required,
            'disabled' => $disabled,
            'conditional_visibility' => $conditional_visibility,
        ];

        return $this;
    }

    /**
     * @param string $key
     * @param string $nested_key
     * @param string $label
     * @param $options
     * @param null $value
     * @param bool $required
     * @param bool $disabled
     * @param array $conditional_visibility
     *
     * @return $this
     */
    public function addTreeSelect(string $key, string $nested_key, string $label, $options, $value = null, bool $required = true, bool $disabled = false, array $conditional_visibility = []): self
    {
        $this->form['fields'][$key] = [
            'type' => 'tree_select',
            'key' => $key,
            'nested_key' => $nested_key,
            'label' => $label,
            'options' => $options,
            'value' => $value,
            'required' => $required,
            'disabled' => $disabled,
            'conditional_visibility' => $conditional_visibility,
        ];

        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->form;
    }
}
