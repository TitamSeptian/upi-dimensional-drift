<?php
include 'connections.php';

/**
 * Get base url
 *
 * @param  String $option
 * @return string|null (the url)
 */
function base_url($option = null)
{
    $uri = urldecode(
        parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
    );
    $base =  sprintf(
        "%s://%s:%s",
        isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
        //SERVER PORT
        $_SERVER['SERVER_NAME'],
        $_SERVER['SERVER_PORT'],
    );
    if ($option == "full") {
        return $base . $uri;
    }
    return $base;
}

/**
 * get dir project
 *
 * @return string|null
 */
function dirFile()
{
    return __DIR__;
}

function registerAcc()
{

    $conn = connectMySQL();

    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['confirmPassword'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];

    $sql = "INSERT INTO users (email, password, first_name, last_name) VALUES ('$email', '$password', '$firstName', '$lastName')";


    //cek if email is exist
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    if ($user) {
        // email found
        echo "<script>alert('Email already registered! Try new one')</script>";
        return false;
    } else {

        // cek password confirm
        if ($password !== $password2) {
            echo "<script>
                    alert('Password Confirmation not match!');
                </script>";
            return false;
        } else {
            $conn->exec($sql);
            echo "<script>
                alert('Registration Successful!');
            </script>";
        }
    }
}

/**
 * get dir project
 * @param string $field
 * @return string|null
 */
function escape_mysql_identifier($field)
{
    return "`" . str_replace("`", "``", $field) . "`";
}

/**
 * insert sql function
 * @param string $table
 * @param array $data
 * @param boolean $is_esacpe
 * @return boolean
 */
function insert($table, $data, $is_esacpe = false)
{
    $pdo = connectMySQL();
    $keys = array_keys($data);
    $keys = array_map('escape_mysql_identifier', $keys);
    $fields = implode(",", $keys);
    $table = escape_mysql_identifier($table);
    $placeholders = str_repeat('?,', count($keys) - 1) . '?';
    $sql = "INSERT INTO $table ($fields) VALUES ($placeholders)";
    try {
        $pdo->beginTransaction();
        $pdo->prepare($sql)->execute(array_values($data));
        $pdo->commit();
        $lastId = $pdo->lastInsertId();
        return true;
    } catch (PDOException $exception) {
        var_dump($exception->getMessage());
        exit("error");
    }
}

/**
 * execute query sql function
 * @param string $table
 * @param array $data
 * @return arrayAssoc 
 */
function query($sql, $data = [])
{
    $pdo = connectMySQL();
    try {

        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $exception) {
        print_r($exception);
        exit('Failed to connect to database!');
    }
}

/**
 * update sql function
 * 
 * @param string $table
 * @param array $data
 * @param string $where
 * @param string $val
 * @return boolean
 * 
 */
function update($table, $dat, $where, $val)
{
    $pdo = connectMySQL();
    if ($dat !== null) {
        $data = array_values($dat);
    }
    array_push($data, $val);
    $cols = array_keys($dat);
    $mark = array();
    foreach ($cols as $col) {
        $mark[] = $col . "=?";
    }
    $im  = implode(', ', $mark);
    $ins = $pdo->prepare("UPDATE $table SET $im where $where=?");
    try {
        $ins->execute($data);
        return true;
    } catch (PDOException $exception) {
        var_dump($exception->getMessage());
        exit("error");
    }
}

/**
 * delete sql function
 * 
 * @param string $table
 * @param string $where
 * @param string $id
 */
function delete($table, $where, $id)
{
    $pdo = connectMySQL();
    $data = array(
        $id
    );
    $sel  = $pdo->prepare("DELETE FROM $table WHERE $where=?");
    try {
        $sel->execute($data);
        return true;
    } catch (PDOException $exception) {
        var_dump($exception->getMessage());
        return false;
    }
}

/**
 * get last id from table
 * @param string $table
 * @return arrayAssoc
 */
function getLastInsertId($table)
{
    $pdo = connectMySQL();
    $sql = "SELECT * FROM $table ORDER BY id DESC LIMIT 1";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['id'];
    } catch (PDOException $exception) {
        var_dump($exception->getMessage());
        exit("error");
    }
}


/**
 * get slug string
 * @param string $text
 * @return string
 */
function slugify($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, '-');

    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);

    // lowercase
    $text = strtolower($text);

    return $text;
}

/**
 * redirectTo
 * @param string $message
 * @param string $url
 * @return void
 */
function redirectTo($message, $url)
{
    $baseUrl = base_url();
    echo "<script>alert('{$message}'); window.location='{$baseUrl}{$url}'</script>";
}
