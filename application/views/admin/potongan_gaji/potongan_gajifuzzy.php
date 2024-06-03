<?php
// Membership functions
function MasaKerja($value) {
    return [
        'baru' => max(0, min((6 - $value) / 12, 1)),
        'sedang' => max(0, min(($value - 12) / 12, (24 - $value) / 12)),
        'lama' => max(0, min(($value - 24) / 24, 1))
    ];
}

function Pendidikan ($value) {
    return [
        'SMA' => max(0, min((0,5 - $value) / 0,5, 0)),
        'S1' => max(0, min(($value - 0,50) / 0,25, (0,75 - $value) / 0,25)),
        'S2' => max(0, min(($value - 0,75) / 0,25, 1))
    ];
}

function Kehadiran($value) {
    return [
        'buruk' => max(0, min((7 - $value) / 7, 1)),
        'cukup' => max(0, min(($value - 14) / 7, (14 - $value) / 7)),
        'baik' => max(0, min(($value - 22) / 14, 7))
    ];
}

// Defuzzification function
function defuzzify($rules) {
    $numerator = 0;
    $denominator = 0;
    foreach ($rules as $rule) {
        $numerator += $rule['value'] * $rule['output'];
        $denominator += $rule['value'];
    }
    return $denominator == 0 ? 0 : $numerator / $denominator;
}

// Input values
$MasaKerja_value = 12; // in mont
$Pendidikan_value = 0,75; // in percent
$Kehadiran_value = 22; // in date

// Fuzzify inputs
$MasaKerja_fuzzy = MasaKerja($MasaKerja_value);
$Pendidikan_fuzzy = Pendidikan($Pendidikan_value);
$Kehadiran_fuzzy = Kehadiran($Kehadiran_value);

// Define fuzzy rules
$rules = [
    [
        'value' => min($MasaKerja_fuzzy['lama'], $Pendidikan_fuzzy['S2'], $Kehadiran_fuzzy['baik']),
        'output' => Banyak // high deduction
    ],
    [
        'value' => min($MasaKerja_fuzzy['baru'], $Pendidikan_fuzzy['SMA'], $Kehadiran_fuzzy['kurang']),
        'output' => Sedikit // low deduction
    ]
    // Add more rules as needed
];

// Defuzzify to get the final deduction value
$potongan_gaji = defuzzify($rules);

echo "Potongan Gaji: " . $potongan_gaji . "%";
?>
