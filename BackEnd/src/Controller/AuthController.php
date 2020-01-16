<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends AbstractController
{
    /** @var UserRepository $userRepository */
    private $userRepository;

    /**
     * AuthController Constructor
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Register new user
     * @param Request $request
     *
     * @return Response
     */
    public function register(Request $request)
    {
        $user = json_decode($request->getContent(),true);

        $this->userRepository->createNewUser($user);        

        $response = new Response();
        $response->setContent("New user created");
        $response->headers->set('Access-Control-Allow-Origin','*');

        
        return $response;
    }

    /**
    * api route redirects
    * @return Response
    */
    public function api()
    {
        return new Response(sprintf("Logged in as %s", $this->getUser()->getUsername()));
    }
}
