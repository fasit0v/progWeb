<?php

include_once "../models/User.php";
include_once "../repositories/UserRepository.php";

class UserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function post(User $user): void
    {
        $this->userRepository->post($user);
    }

    public function get(User $user): void
    {
        $this->userRepository->get($user);
    }

    public function signIn(User $user): void
    {
        $this->userRepository->signIn($user);
    }


}