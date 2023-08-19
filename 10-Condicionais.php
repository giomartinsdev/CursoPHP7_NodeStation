<?php
//esquema bancario, digite 1 para transacionar, 2 para depositar e 3 para sacar
$valorMenu = 4;
switch($valorMenu):
  case 1;
  echo "opção escolhida: transação";
  break;
  case 2;
  echo "opção escolhida: depositar";
  break;
  case 3;
  echo "opção escolhida: sacar";
  break;
  default;
  echo "opção invalida";
endswitch;