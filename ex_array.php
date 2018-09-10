<?php
$users = [
    [
        'name' => 'mr Dung',
        'age' => 28,
        'bank' => 200,
    ],
    [
        'name' => 'Mr Duy',
        'bank' => 250,
        'age' => 35,
    ],
    [
        'name' => 'Mr Linh',
        'bank' => 300,
        'age' => 25,
    ],
    [
        'name' => 'Mrs Trang',
        'bank' => 250,
        'age' => 25,
    ],
    [
        'name' => 'mr Nam',
        'bank' => 350,
        'age' => 29,
    ]
];
echo "Search result";
$sumBank = 0;
foreach ($users as $key => $value) {
    $splitName = explode(" ", $value["name"]);
    if (strtolower($splitName[0]) == "mr" && $value["age"] >= 28) {
        echo $value["name"] . " - " . "Age: " . $value["age"]." - "."Money in bank account: ".$value["bank"]."$"."<br>";
        $sumBank = $sumBank + $value["bank"];
    }
}
echo "Tong tien trong bank cua cac Mr: " . $sumBank;

?>