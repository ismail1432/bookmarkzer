<?php

namespace App\Infrastructure\Transport;

interface SynchronousBusInterface
{
    public function handle(object $message);
}