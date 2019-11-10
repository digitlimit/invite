<?php

namespace Digitlimit\Invite\Contracts;

use Illuminate\Support\Collection;

interface Invite
{
    /**
     * Perform Import users
     *
     * @param array $options
     * @return Invite
     */
    public function import(array $options=[]) : Invite;

}