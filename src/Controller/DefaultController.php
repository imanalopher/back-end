<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    public function index()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository(User::class)->getAll();


        return new JsonResponse(
            $users,
        200,
            array('Content-Type' => 'application/json', 'Access-Control-Allow-Origin' => '*')
        );
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function info($id)
    {
        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository(User::class)->get($id);
	
	return new JsonResponse(
            $user,
        200,
            array('Content-Type' => 'application/json', 'Access-Control-Allow-Origin' => '*')
        );
    }
}
