<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Doctrine\ORM\Repository\RepositoryFactory;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $userpassword;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getUserpassword(): ?string
    {
        return $this->userpassword;
    }

    public function setUserpassword(string $userpassword): self
    {
        $this->userpassword = $userpassword;

        return $this;
    }

    /**
     * @param $requestContent
     * @return User
     */
    public static function create($requestContent): self
    {
        $data = json_decode($requestContent, true);
        $created = new self();
        if (isset($data["username"])) $created->setUsername($data["username"]);

        if (isset($data["userpassword"])) {
            $hashed_password = sha1($data["userpassword"]);
            $created->checkPassword($hashed_password);
            $created->setUserpassword($hashed_password);
        }

        return $created;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param $requestContent
     * @param User $updated
     * @return User
     */
    public static function update($requestContent, $updated): self
    {
        $data = json_decode($requestContent, true);
        if (isset($data["username"])) $updated->setUsername($data["username"]);

        if (isset($data["userpassword"])) {
            $hashed_password = sha1($data["userpassword"]);
            $updated->checkPassword($hashed_password);
            $updated->setUserpassword($hashed_password);
        }

        return $updated;
    }

    public function checkPassword($hashPassword)
    {
        $first5Chars = substr($hashPassword, 0, 5);
        $url = "https://api.pwnedpasswords.com/range/" . $first5Chars;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $response_data = curl_exec($curl);
        $response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $response_errors = curl_error($curl);
        curl_close($curl);

//        $response = array(
//            'data' => trim($response_data), true,
//            'code' => $response_code,
//            'errors' => $response_errors
//        );

        if ($response_code == 200) {
            $this->setDescription("Password was checked in haveibeenpwned.com");
        } else {
            $this->setDescription("Password was error checked in haveibeenpwned.com " + $response_code);
        }
    }

    /**
     * @param $requestContent
     * @param $errors
     * @return array
     */
    public static function passwordStrengthCheck($requestContent)
    {
        $pwd = "";
        $errors = "";
        $passwordStrength = false;

        $data = json_decode($requestContent, true);
        if (isset($data["userpassword"])) $pwd = $data["userpassword"];

        if (strlen($pwd) < 8) {
            $errors = "Password too short!";
        } else if (!preg_match("#[0-9]+#", $pwd)) {
            $errors = "Password must include at least one number!";
        } else if (!preg_match("#[a-zA-Z]+#", $pwd)) {
            $errors = "Password must include at least one letter!";
        } else {
            $passwordStrength = true;
        }

        return array(
            "password_strength" => $passwordStrength,
            "error" => $errors,
            "password" => $pwd
        );
    }
}
