<?php

namespace App\Support\Tables\Structure;

use LogicException;

class Actions
{
    private array $setup = [];

    /**
     * @param string $route
     *
     * @return $this
     */
    public function create(string $route): self
    {
        $this->checkDuplicate('create');

        $this->setup['create'] = [
            'route' => $route
        ];

        return $this;
    }

    /**
     * @param string $route
     *
     * @return $this
     */
    public function edit(string $route): self
    {
        $this->checkDuplicate('edit');

        $this->setup['edit'] = [
            'route' => $route
        ];

        return $this;
    }

    /**
     * @param string $route
     *
     * @return $this
     */
    public function delete(string $route): self
    {
        $this->checkDuplicate('delete');

        $this->setup['delete'] = [
            'route' => $route
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
     * @param $action
     *
     * @throws LogicException
     */
    private function checkDuplicate($action): void
    {
        if (isset($this->setup[$action])) {
            throw new LogicException('Duplication definition of action ' . strtoupper($action));
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
