<?php
$senha = "123321";


//base64 criptografia e descriptografia
$senhaBase64 = base64_encode($senha);

echo "base64: $senhaBase64". "<br>";
echo "sua senha é: ". base64_decode($senhaBase64). "<br><hr>";

//md5 criptografia de mao unica
$senhaMd5 = md5($senha);
echo "MD5: $senhaMd5". "<br><hr>";

//sha1 criptografia de mao unica
$senhaSha1 = sha1($senha);
echo "Sha1: $senhaSha1". "<br><hr>";

//Password Hash do PHP, modo mais seguro.
$senhaPassHash = password_hash($senha, PASSWORD_DEFAULT);
echo "Password Hash: $senhaPassHash";


//como validar senha password hash no db

$senhaDb = '$2y$10$w4xakylQfgvRlXDDaRWqU.C8sdYOU93YBSPUsRnEMX1/Y7ItpC4Ni';
if (password_verify($senha, $senhaDb)) {
  echo "<hr>senha valida";
}else {
  echo "senha invalida";
}