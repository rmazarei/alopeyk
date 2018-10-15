<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use AloPeyk\Api\RESTful\Model\Address;
use AloPeyk\Api\RESTful\Model\Location;
use AloPeyk\Api\RESTful\Model\Order;
use AloPeykApiHandler;

class TestController extends Controller
{
    public function authenticate()
    {
        dd(AloPeykApiHandler::authenticate());
    }
    public function getLocation()
    {
        dd(Location::getAddress("35.732595", "51.413379"));
    }	
    public function locSuggestion()
    {
        dd(Location::getSuggestions("عشرتآباد", "35.701898,51.438627"));
    }	
    public function getPrice()
    {
        /*
         * Create Origin Address
         */
        $origin = new Address('origin', 'tehran', '35.723711', '51.410547');
        /*
         * Create First Destination
         */
        $firstDest = new Address('destination', 'tehran', '35.728457', '51.436969');

        /*
         * Create Second Destination
         */
        $secondDest = new Address('destination', 'tehran', '35.729379', '51.418151');

        /*
         * Create New Order
         */
        $order = new Order('motor_taxi', $origin, [$firstDest, $secondDest]);
        $order->setHasReturn(true);

        $apiResponse = $order->getPrice();

        dd($apiResponse);
    }	
	
	
	    public function createOrder()
    {
        /*
         * Create Origin: Behjat Abad
         */
        $origin = new Address('origin', 'tehran', '35.755460', '51.416874');
        $origin->setAddress("... Behjat Abad, Tehran");
        $origin->setDescription("Behjat Abad");                                            // optional
        $origin->setUnit("44");                                                            // optional
        $origin->setNumber("1");                                                           // optional
        $origin->setPersonFullname("Leonardo DiCaprio");                                   // optional
        $origin->setPersonPhone("09370000000");                                            // optional

        /*
         * Create First Destination: N Sohrevardi Ave
         */
        $firstDest = new Address('destination', 'tehran', '35.758495', '51.442550');
        $firstDest->setAddress("... N Sohrevardi Ave, Tehran");
        $firstDest->setDescription("N Sohrevardi Ave");                                    // optional
        $firstDest->setUnit("55");                                                         // optional
        $firstDest->setNumber("2");                                                        // optional
        $firstDest->setPersonFullname("Eddie Redmayne");                                   // optional
        $firstDest->setPersonPhone("09380000000");                                         // optional


        /*
         * Create Second Destination: Ahmad Qasir Bokharest St
         */
        $secondDest = new Address('destination', 'tehran', '35.895452', '51.589632');
        $secondDest->setAddress("... Ahmad Qasir Bokharest St, Tehran");
        $secondDest->setDescription("Ahmad Qasir Bokharest St");                            // optional
        $secondDest->setUnit("66");                                                         // optional
        $secondDest->setNumber("3");                                                        // optional
        $secondDest->setPersonFullname("Matt Damon");                                       // optional
        $secondDest->setPersonPhone("09390000000");                                         // optional

        $order = new Order('motor_taxi', $origin, [$firstDest, $secondDest]);
        $order->setHasReturn(true);

        $apiResponse = $order->create($order);
    
        dd($apiResponse);
    }

}
