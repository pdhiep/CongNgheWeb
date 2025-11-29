<?php
$file = 'Quiz.txt';
$lines = file($file, FILE_IGNORE_NEW_LINES);
$questions = [];

$i = 0;
$total = count($lines);
while ($i < $total) {
    if (trim($lines[$i]) === '') { $i++; continue; }

    $qtext = $lines[$i];
    $i++;

    $opts = [];
    while ($i < $total && !preg_match('/^ANSWER:\s*/i', trim($lines[$i]))) {
        if (trim($lines[$i]) !== '') {
            $opts[] = $lines[$i];
        }
        $i++;
    }

    $answerLine = ($i < $total) ? $lines[$i] : '';
    $i++;

    $ansPart = strtoupper(trim(preg_replace('/^ANSWER:\s*/i', '', $answerLine)));
    $corrects = array_filter(array_map('trim', explode(',', $ansPart)));

    $mapped = [];
    $letter = 'A';
    foreach ($opts as $o) {
        $mapped[$letter] = $o;
        $letter = chr(ord($letter) + 1);
    }

    $questions[] = [
        'q' => $qtext,
        'opts' => $mapped,
        'correct' => $corrects
    ];
}

$score = null;
if ($_POST) {
    $score = 0;
    foreach ($questions as $idx => $q) {
        $corrects = array_map('strtoupper', array_map('trim', $q['correct']));
        if (!isset($_POST['ans'][$idx])) continue;
        $sel = $_POST['ans'][$idx];
        if (is_array($sel)) {
            $selClean = array_map('strtoupper', array_map('trim', $sel));
            sort($selClean);
            sort($corrects);
            if ($selClean === $corrects) $score++;
        } else {
            $s = strtoupper(trim($sel));
            if (in_array($s, $corrects)) $score++;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài Thi Trắc Nghiệm</title>
    <style>.q{margin:20px 0;padding:15px;background:#f0f8ff;border-radius:8px;}</style>
</head>
<body>
    <h1>Bài Thi Trắc Nghiệm</h1>
    <form method="post">
        <?php foreach($questions as $i => $q): ?>
        <div class="q">
            <p><strong>Câu <?= $i+1 ?>:</strong> <?= htmlspecialchars($q['q']) ?></p>
            <?php
                $isMultiple = is_array($q['correct']) && count($q['correct']) > 1;
                foreach ($q['opts'] as $letter => $optText):
                    $name = $isMultiple ? "ans[{$i}][]" : "ans[{$i}]";
                    $display = preg_replace('/^[A-Z]\.?\s*/', '', $optText);
            ?>
            <label>
                <input type="<?= $isMultiple ? 'checkbox' : 'radio' ?>" name="<?= $name ?>" value="<?= $letter ?>" <?= $isMultiple ? '' : 'required' ?> >
                <?= htmlspecialchars($display) ?>
            </label><br>
            <?php endforeach; ?>
        </div>
        <?php endforeach; ?>
        <button type="submit">Nộp bài</button>
    </form>

    <?php if ($score !== null): ?>
        <h2 style="color:green;">Kết quả: <?= $score ?> / <?= count($questions) ?> câu đúng!</h2>
    <?php endif; ?>
</body>
</html>