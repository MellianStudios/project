<?php

namespace App\Support\Tables\Structure;

use LogicException;

class Filters
{
    private array $setup;

    /**
     * @param string $route
     *
     * @return $this
     * @throws LogicException
     */
    public function route(string $route): self
    {
        if (isset($this->setup['route'])) {
            throw new LogicException('Duplication definition of route');
        }

        $this->setup['route'] = $route;

        return $this;
    }

    /**
     * @param string $key
     * @param string $label
     * @param string|null $value
     *
     * @return $this
     */
    public function addText(string $key, string $label, string|null $value): self
    {
        $this->checkDuplicate($key);

        $this->setup['options'][$key] = [
            'type' => 'text',
            'key' => $key,
            'label' => $label,
            'value' => $value,
        ];

        return $this;
    }

    /**
     * @param string $key
     * @param string $nested_key
     * @param string $label
     * @param $options
     * @param $value
     *
     * @return $this
     */
    public function addTreeSelect(string $key, string $nested_key, string $label, $options, $value): self
    {
        $this->checkDuplicate($key);

        $this->setup['options'][$key] = [
            'type' => 'tree_select',
            'key' => $key,
            'nested_key' => $nested_key,
            'label' => $label,
            'options' => $options,
            'value' => $value,
        ];

        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $this->checkIfEmpty();

        return $this->setup;
    }

    /**
     * @param $key
     *
     * @throws LogicException
     */
    private function checkDuplicate($key): void
    {
        if (isset($this->setup['options'][$key])) {
            throw new LogicException('Duplication definition of key ' . strtoupper($key));
        }
    }

    /**
     * @throws LogicException
     */
    private function checkIfEmpty(): void
    {
        if (empty($this->setup)) {
            throw new LogicException('Action were initialized but never set');
        }
    }
}
