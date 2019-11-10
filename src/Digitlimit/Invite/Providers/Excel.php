<?php
namespace Digitlimit\Invite\Providers;

use Digitlimit\Invite\Contracts\Invite as InviteContract;
use Illuminate\Support\Collection;

class Excel extends AbstractProvider implements InviteContract
{
    /**
     * Perform Import users
     *
     * @param array $options
     * @return InviteContract
     */
    public function import(array $options=[]) : InviteContract
    {

    }
}