<?php

namespace App\Repository\Interfaces;

interface ContactRepositoryInterface
{
    public function getAll();

    public function store(array $details);

    public function update(int $id, array $details);

    public function delete(int $id);

    public function existsEmail(string $email);
}
