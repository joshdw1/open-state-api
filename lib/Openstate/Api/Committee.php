<?php

namespace Openstate\Api;

class Committee extends Api
{
    protected $state;
    protected $chamber;

    /**
     * Fetches committee data
     *
     * @param   string  $committeeId
     * @return  array
     **/
    public function get($committeeId)
    {
        return $this->request('committees/'.$committeeId.'/');
    }

    /**
     * Finds all committees for the current state
     *
     * @return array
     **/
    public function findAll()
    {
        return $this->request('committees/', array('state' => $this->state, 'chamber' => $this->chamber));
    }

    /**
     * Set state to use with api calls
     *
     * @param   string  $state
     * @return  Committee
     **/
    public function state($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Set chamber to use with api calls
     *
     * @param   string  $state
     * @return  Committee
     **/
    public function chamber($chamber)
    {
        $this->chamber = $chamber;

        return $this;
    } 
}