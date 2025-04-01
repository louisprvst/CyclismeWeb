<?php
class myAuthClass
{
    /**
     * Vérifie si l'utilisateur est authentifié via la session.
     *
     * @param array $current_session La session actuelle.
     * @return bool True si l'utilisateur est authentifié, sinon False.
     */
    public static function is_auth($current_session)
    {
        if (isset($current_session['login']) && $current_session['login'] === TRUE) {
            return true;
        }
        return false;
    }

    /**
     * Authentifie un utilisateur avec un nom d'utilisateur et un mot de passe.
     *
     * @param string $username Le nom d'utilisateur.
     * @param string $password Le mot de passe.
     * @return array|false Les informations de l'utilisateur si authentifié, sinon False.
     */
    public static function authenticate($username, $password)
    {
        // Utilise la connexion à la base de données initialisée dans init.conf.php
        global $bdd;

        $fields = array(
            'rowid',
            'username',
            'firstname',
            'lastname',
        );

        $sql = 'SELECT ' . implode(', ', $fields) . ' ';
        $sql .= 'FROM mp_users ';
        $sql .= 'WHERE username = :username AND password = :passhash';

        try {
            $statement = $bdd->prepare($sql);
            $statement->bindValue(':username', $username, PDO::PARAM_STR);
            $statement->bindValue(':passhash', md5($password), PDO::PARAM_STR);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                // Si l'utilisateur est authentifié, on stocke les informations dans la session
                $_SESSION['login'] = TRUE;
                $_SESSION['user'] = [
                    'id' => $result['rowid'],
                    'username' => $result['username'],
                    'firstname' => $result['firstname'],
                    'lastname' => $result['lastname'],
                ];
                return $result;
            }

            return false;
        } catch (PDOException $e) {
            error_log("Erreur lors de l'authentification : " . $e->getMessage());
            return false;
        }
    }
}