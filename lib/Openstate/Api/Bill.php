<?php

namespace Openstate\Api;

class Bill extends Api
{
    protected $state;
    protected $session;

    /**
     * Finds all bills for the current state and session
     *
     * @return array
     **/
    public function findAll()
    {
        return $this->request('bills/', array('state' => $this->state, 'session' => $this->session));
    }

    /**
     * Finds all bills update since the given date
     *
     * @param  DateTime $after
     * @return array
     **/
    public function findUpdatedSince(\DateTime $after)
    {
        return $this->request(
                    'bills/', 
                    array(
                        'state'         => $this->state, 
                        'session'       => $this->session,
                        'updated_since' => $after->format('Y-m-d')
                    )
                );
    }

    /**
     * Fetches the data for a specifc bill
     *
     * @param   string  $bill
     * @return  Bill
     **/
    public function get($bill)
    {
        return $this->request('bills/'.$this->state.'/'.$this->session.'/'.$bill);
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

    /**
     * Set sesion to use with api calls
     *
     * @param   string  $session
     * @return  Bill
     **/
    public function session($session)
    {
        $this->session = $session;

        return $this;
    }
}