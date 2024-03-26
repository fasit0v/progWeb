<?php

include_once "../models/User.php";
include_once "../repositories/UserRepository.php";
include_once "../services/UserService.php";

class UserController
{
    private UserRepository $userRepository;
    private UserService $userService;
    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->userService = new UserService($this->userRepository);
    }

    public function post()
    {
        $datos = json_decode(file_get_contents("php://input"));

        $user = new User();
        $user->setNameUser($datos->nameUser);
        $user->setEmailUser($datos->emailUser);
        $user->setPasswordUser($datos->passwordUser);

        $this->userService->post($user);
    }

    public function get()
    {
        $idUser = $_GET["idUser"];

        $user = new User();
        $user->setIdUser($idUser);

        $this->userService->get($user);
    }

    public function signIn()
    {
        try {
            $datos = json_decode(file_get_contents("php://input"));
            if (!isset($datos->nameUser, $datos->passwordUser)) {
                throw new Exception("Error faltan crendenciales", 400);

            }

            $user = new User();
            $user->setNameUser($datos->nameUser);
            $user->setPasswordUser($datos->passwordUser);

            $this->userService->signIn($user);

        } catch (Exception $exception) {
            http_response_code($exception->getCode());
            echo json_encode(["msg" => $exception->getMessage()]);
        }
    }
}

$userController = new UserController();