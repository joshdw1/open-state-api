<?php

namespace Openstate\Api;

class Legislator extends Api
{
    protected $state;

    /**
     * Fetches legislator data
     *
     * @param   string  $legId
     * @return  array
     **/
    public function get($legId)
    {
        return $this->request('legislators/'.$legId.'/');
    }

    /**
     * Finds all legislators for the current state
     *
     * @return array
     **/
    public function findAll($state)
    {
        return $this->request('legislators/', array('state' => $this->state));
    }

    /**
     * Finds using search terms: chamber, district, or party
     *
     * @return array
     **/
    public function findBy($params)
    {
        $searchParams = array('state' => $this->state);

        if (isset($params['chamber']) && $params['chamber']) {
            $searchParams['chamber'] = $params['chamber'];
        }

        if (isset($params['district']) && $params['district']) {
            $searchParams['district'] = $params['district'];
        }

        if (isset($params['party']) && $params['party']) {
            $searchParams['party'] = $params['party'];
        }

        return $this->request('legislators/', $searchParams);
    }

    /**
     * Set state to use with api calls
     *
     * @param   string  $state
     * @return  Bill
     **/
    public function state($state)
    {
        $this->state = $state;

        return $this;
    }    
}