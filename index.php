<?php
// Data array sederhana untuk contoh beberapa Surah dan Ayat
$quranData = [
    1 => [
        'name' => 'Al-Fatihah',
        'verses' => [
            1 => 'بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ',
            2 => 'الْحَمْدُ لِلَّهِ رَبِّ الْعَالَمِينَ',
            3 => 'الرَّحْمَٰنِ الرَّحِيمِ',
            4 => 'مَالِكِ يَوْمِ الدِّينِ',
            5 => 'إِيَّاكَ نَعْبُدُ وَإِيَّاكَ نَسْتَعِينُ',
            6 => 'اهْدِنَا الصِّرَاطَ الْمُسْتَقِيمَ',
            7 => 'صِرَاطَ الَّذِينَ أَنْعَمْتَ عَلَيْهِمْ غَيْرِ الْمَغْضُوبِ عَلَيْهِمْ وَلَا الضَّالِّينَ'
        ]
    ],
    112 => [
        'name' => 'Al-Ikhlas',
        'verses' => [
            1 => 'قُلْ هُوَ اللَّهُ أَحَدٌ',
            2 => 'اللَّهُ الصَّصَمَدُ',
            3 => 'لَمْ يَلِدْ وَلَمْ يُولَدْ',
            4 => 'وَلَمْ يَكُنْ لَهُ كُفُوًا أَحَدٌ'
        ]
    ]
];

$surah = $_GET['surah'] ?? '';
$ayat  = $_GET['ayat'] ?? '';
$result = null;
$error = "";

if ($surah !== '' && $ayat !== '') {
    if (isset($quranData[$surah]['verses'][$ayat])) {
        $result = [
            'surahName' => $quranData[$surah]['name'],
            'ayahNum' => $ayat,
            'text' => $quranData[$surah]['verses'][$ayat]
        ];
    } else {
        $error = "Data Surah atau Ayat tidak ditemukan (Coba Surah 1 Ayat 1-7 atau Surah 112 Ayat 1-4).";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Quran Sederhana Lokal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #253b1d;
            padding: 40px;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 400px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input, button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            box-sizing: border-box;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            background: #e8f5e9;
            border-radius: 5px;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
        .arabic {
            font-size: 24px;
            text-align: right;
            direction: rtl;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Cari Ayat Al-Qur'an (Lokal)</h2>

    <form method="GET">
        <input type="number" name="surah" placeholder="No. Surah (Contoh: 1 atau 112)" required>
        <input type="number" name="ayat" placeholder="No. Ayat (Contoh: 1)" required>
        <button type="submit">Cari Ayat</button>
    </form>

    <?php if ($error): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>

    <?php if ($result): ?>
        <div class="result">
            <p><strong>Surah:</strong> <?= $result['surahName'] ?></p>
            <p><strong>Ayat:</strong> <?= $result['ayahNum'] ?></p>
            <p><strong>Arab:</strong></p>
            <div class="arabic"><?= $result['text'] ?></div>
        </div>
    <?php endif; ?>
</div>

</body>
</html>