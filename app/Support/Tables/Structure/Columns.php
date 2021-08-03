<?php

namespace App\Support\Tables\Structure;

use LogicException;

class Columns
{
    private array $setup;

    /**
     * @param string $key
     * @param string $label
     *
     * @return $this
     */
    public function addOwn(string $key, string $label): self
    {
        $this->checkDuplicate($key);

        $this->setup[$key] = [
            'type' => 'own',
            'key' => $key,
            'label' => $label,
        ];

        return $this;
    }

    /**
     * @param string $key
     * @param string $relation
     * @param string $related_key
     * @param string $label
     *
     * @return $this
     */
    public function addRelated(string $key, string $relation, string $related_key, string $label): self
    {
        $this->checkDuplicate($key);

        $this->setup[$key] = [
            'type' => 'relation',
            'key' => $key,
            'relation' => $relation,
            'related_key' => $related_key,
            'label' => $label,
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
        if (isset($this->setup[$key])) {
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
