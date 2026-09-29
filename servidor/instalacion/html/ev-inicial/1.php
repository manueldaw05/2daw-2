<?php
$name = "Laura";
$baseSalary = 1450;
$overtimeHours = 8;
$priceOvertimeHours = 18;

function salarioFinal ($name, $baseSalary, $overtimeHours, $priceOvertimeHours) {
    $retencion;
    $grossSalary;
    $finalSalary;

    if ($overtimeHours <= 5) {
        $grossSalary = $baseSalary + $overtimeHours * $priceOvertimeHours;
        
    } else {
        $grossSalary = $baseSalary + 5 * $priceOvertimeHours + ($overtimeHours - 5) * ($priceOvertimeHours * 1.5);
    }

    if ($grossSalary > 1500) {
        $retencion = $grossSalary * 0,12;
    } else {
        $retencion = $grossSalary * 0,08;
    }

    echo 'Trabajador: ' . $name . '<br>' .
    'Salario base: ' . $baseSalary . ' €<br>' .
    'Horas extra: ' . $overtimeHours . ' €<br>' .
    'Importe horas extra: ' . $priceOvertimeHours . ' €<br>' .
    'Salario bruto: ' . $grossSalary . ' €<br>' .
    'Retención: ' . $retencion . ' €<br>' .
    'Salario final: ' . $finalSalary . ' €<br>';
}