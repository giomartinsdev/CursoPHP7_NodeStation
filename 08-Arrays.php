<?php 
//array numerico
$carros = array("BMW","PORSCHE","FUSCA");
$carros[] = "FORDKA"; 
print_r($carros);

echo "<br><hr>";

$clientes = ["c1", "c2", "c3", "c4"];
$clientes[] = "c5";
print_r($clientes);
echo "<br>".$clientes[4];

echo "<br><hr>";
//count
echo "<h2>.lenght no php é count</h2>";
echo count($carros). "<br>";

//foreach
foreach($carros as $value){
  echo $value ."<br>";
}

echo "<br><hr>";

//array associativo
$altura_original = 1.68; 
$altura = number_format($altura_original, 2);

$pessoa = ["nome"=>"Giovanni", "idade"=> 18, "altura"=>$altura];
$pessoa["cidade"] = "RJ";
var_dump($pessoa);
echo "<br>". $pessoa['nome'];

echo "<br><hr>";

foreach($pessoa as $indice => $valor){
  echo $indice.": ".$valor."<br>";
}

echo "<br><hr>";

//arrays multidimensionais.
$times = [
    "cariocas"=>["Campeao"=>"VASCAO DA GAMA","Vice"=>"Fluminense","Terceiro lugar"=>"Botafogo"],
    "paulistas"=>["Campeao"=>"Palmeiras","Vice"=>"São Paulo","Caiu"=>"Santros"]
];

foreach ($times["cariocas"] as $index => $value) {
  echo $index.":".$value."<br>";
};

echo "<br>";

foreach ($times["paulistas"] as $index => $value) {
  echo $index.":".$value."<br>";
};