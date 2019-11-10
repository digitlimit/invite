<?php

namespace Digitlimit\Invite\Providers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

abstract class AbstractProvider
{
    /**
     * Complete API response
     * @var
     */
    protected $response;

    /**
     * Search results
     *
     * @var array
     */
    protected $results = [];

    /**
     * The HTTP request instance.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * The HTTP Client instance.
     *
     * @var \GuzzleHttp\Client
     */
    protected $httpClient;

    /**
     * The query string.
     *
     * @var string
     */
    protected $query;

    /**
     * Response output type
     * Output may be either of the following values:
     * json (recommended) indicates output in JavaScript Object Notation (JSON)
     * xml indicates output as XML
     *
     * @var string
     */
    protected $output = 'json';

    /**
     * The client ID.
     *
     * @var string
     */
    protected $client_id;

    /**
     * The custom parameters to be sent with the request.
     *
     * @var array
     */
    protected $parameters = [];

    /**
     * The custom Guzzle configuration options.
     *
     * @var array
     */
    protected $guzzle_options = [];

    /**
     * Create a new provider instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $client_id
     * @param  array  $guzzle
     * @return void
     */
    public function __construct(Request $request, $client_id, $guzzle = [])
    {
        $this->guzzle_options = $guzzle;
        $this->request = $request;
        $this->client_id = $client_id;
    }

}