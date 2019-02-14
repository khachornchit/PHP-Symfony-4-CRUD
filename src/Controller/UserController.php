<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Controller\ApiController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UserController
 * @package App\Controller
 *
 * @Route("/api")
 */
class UserController extends ApiController
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @Route("/users", name="users")
     * @Method({"GET", "POST"})
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function users(Request $request)
    {
        $method = $_SERVER["REQUEST_METHOD"];

        switch ($method) {
            case "GET":
                return $this->respond(
                    ["users" => $this->userRepository->findAll()]
                );

            case "POST":
                try {
                    $created = User::create($request->getContent());
                    $this->userRepository->create($created);
                    return $this->respondCreated($created);
                } catch (exception $e) {
                    return $this->respondValidationError('POST /Users Error!');
                }

            default:
                return $this->respondValidationError("Not allow method " . $method);
        }
    }

    /**
     * @Route("/users/{id}", name="user_id")
     * @Method({"GET", "PUT", "DELETE"})
     *
     * @param Request $request
     * @param integer $id
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function user_id(Request $request, $id)
    {
        $method = $_SERVER["REQUEST_METHOD"];

        switch ($method) {
            case "GET":
                return $this->respond($this->userRepository->find($id));

            case "PUT":
                try {
                    $existingUser = $this->userRepository->find($id);
                    $updated = User::update($request->getContent(), $existingUser);
                    $this->userRepository->update($updated);
                    return $this->respond($updated);
                } catch (exception $e) {
                    return $this->respondValidationError('PUT /Users Error!');
                }

            case "DELETE":
                $user = $this->userRepository->find($id);
                return $this->respond($this->userRepository->delete($user));

            default:
                return $this->respondValidationError("Not allow method " . $method);
        }
    }
}
