<?php

include_once "Repository.php";
include_once "../models/User.php";

class UserRepository extends Repository
{

    public function post(User $user): void
    {
        $query = "INSERT INTO user(nameUser, emailUser, passwordUser) VALUES (?,?,?)";
        $smtm = $this->con->prepare($query);

        try {
            $nameUser = $user->getNameUser();
            $emailUser = $user->getEmailUser();
            $passwordUser = password_hash($user->getPasswordUser(), PASSWORD_DEFAULT);

            $smtm->bind_param("sss", $nameUser, $emailUser, $passwordUser);

            if (!$smtm->execute()) {
                throw new Exception("Error al crear el usuario", 400);
            }

            http_response_code(201);
            echo json_encode(["msg" => "El usuario se creo correctamente"]);

        } catch (Exception $exception) {
            http_response_code($exception->getCode());
            echo json_encode(["msg" => $exception->getMessage()]);

        } finally {
            $this->con->close();
        }
    }

    public function signIn(User $user): void
    {
        $query = "SELECT idUser, nameUser, passwordUser, emailUser FROM user WHERE nameUser = ?";
        $smtm = $this->con->prepare($query);

        try {
            $nameUser = $user->getNameUser();
            $passwordUser = $user->getPasswordUser();

            $smtm->bind_param("s", $nameUser);
            if (!$smtm->execute()) {
                throw new Exception("Error al iniciar Sesion el usuario", 400);
            }

            $result = $smtm->get_result();

            if ($result->num_rows == 0) {
                throw new Exception("Error Usuario o contraseña incorrecta", 404);
            }

            $user = $result->fetch_object();
            if (!(password_verify($passwordUser, $user->passwordUser))) {
                throw new Exception("Error Usuario o contraseña incorrecta", 404);
            }

            echo json_encode(["data" => ["idUser" => $user->idUser, "nameUser" => $user->nameUser, "emailUser" => $user->emailUser], "msg" => "Ha ingresado correctamente"]);
            http_response_code(200);

        } catch (Exception $exception) {
            http_response_code($exception->getCode());
            echo json_encode(["msg" => $exception->getMessage()]);

        } finally {
            $this->con->close();
        }
    }

}