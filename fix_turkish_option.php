<?php

$files = [
    'resources/views/backend/announcement/create.blade.php',
    'resources/views/backend/announcement/edit.blade.php',
    'resources/views/backend/events/create.blade.php',
    'resources/views/backend/events/edit.blade.php',
    'resources/views/backend/library/create.blade.php',
    'resources/views/backend/library/edit.blade.php',
    'resources/views/backend/news/create.blade.php',
    'resources/views/backend/news/edit.blade.php',
    'resources/views/backend/pages/edit.blade.php',
    'resources/views/backend/settings/general.blade.php',
];

$search = '<option value="ar" @if (request()->lang == \'ar\') selected @endif>Arabic</option>';
$replace = '<option value="ar" @if (request()->lang == \'ar\') selected @endif>Arabic</option>
                    <option value="tr" @if (request()->lang == \'tr\') selected @endif>Turkish</option>';

$count = 0;
foreach ($files as $file) {
    $path = __DIR__ . '/' . $file;
    if (!file_exists($path)) {
        echo "NOT FOUND: $file\n";
        continue;
    }
    $content = file_get_contents($path);
    if (strpos($content, 'Turkish') !== false) {
        echo "ALREADY HAS Turkish: $file\n";
        continue;
    }
    if (strpos($content, "value=\"ar\"") !== false) {
        $content = str_replace(
            "value=\"ar\" @if (request()->lang == 'ar') selected @endif>Arabic</option>",
            "value=\"ar\" @if (request()->lang == 'ar') selected @endif>Arabic</option>\n                    <option value=\"tr\" @if (request()->lang == 'tr') selected @endif>Turkish</option>",
            $content
        );
        file_put_contents($path, $content);
        $count++;
        echo "FIXED: $file\n";
    }
}

// Fix course language dropdowns (different format)
$courseFiles = [
    'resources/views/backend/courses/create.blade.php',
    'resources/views/backend/courses/edit.blade.php',
];

foreach ($courseFiles as $file) {
    $path = __DIR__ . '/' . $file;
    if (!file_exists($path)) {
        echo "NOT FOUND: $file\n";
        continue;
    }
    $content = file_get_contents($path);
    if (strpos($content, 'turkish') !== false) {
        echo "ALREADY HAS Turkish: $file\n";
        continue;
    }
    if (strpos($content, "value=\"arabic\">Arabic</option>") !== false) {
        $content = str_replace(
            "value=\"arabic\">Arabic</option>",
            "value=\"arabic\">Arabic</option>\n                            <option value=\"turkish\">Turkish</option>",
            $content
        );
        file_put_contents($path, $content);
        $count++;
        echo "FIXED: $file\n";
    }
}

// Fix employee/account radio buttons
$radioFiles = [
    'resources/views/backend/employee/create.blade.php',
    'resources/views/backend/employee/edit.blade.php',
    'resources/views/backend/account/tabs/edit.blade.php',
];

foreach ($radioFiles as $file) {
    $path = __DIR__ . '/' . $file;
    if (!file_exists($path)) {
        echo "NOT FOUND: $file\n";
        continue;
    }
    $content = file_get_contents($path);
    if (strpos($content, 'turkish') !== false) {
        echo "ALREADY HAS Turkish: $file\n";
        continue;
    }
    if (strpos($content, "value=\"arabic\"") !== false) {
        $content = str_replace(
            "> Arabic",
            "> Arabic\n                    <input type=\"radio\" name=\"fav_lang\" value=\"turkish\"> Turkish",
            $content
        );
        file_put_contents($path, $content);
        $count++;
        echo "FIXED: $file\n";
    }
}

// Fix assessment files
$assessFiles = [
    'resources/views/backend/assessment_accounts/create_assignment_course.blade.php',
    'resources/views/backend/assessment_accounts/create__invitation_assignment_course.blade.php',
];

foreach ($assessFiles as $file) {
    $path = __DIR__ . '/' . $file;
    if (!file_exists($path)) {
        echo "NOT FOUND: $file\n";
        continue;
    }
    $content = file_get_contents($path);
    if (strpos($content, 'turkish') !== false) {
        echo "ALREADY HAS Turkish: $file\n";
        continue;
    }
    if (strpos($content, "value=\"arabic\">Arabic</option>") !== false) {
        $content = str_replace(
            "value=\"arabic\">Arabic</option>",
            "value=\"arabic\">Arabic</option>\n                            <option value=\"turkish\">Turkish</option>",
            $content
        );
        file_put_contents($path, $content);
        $count++;
        echo "FIXED: $file\n";
    }
}

echo "\nDone! $count files fixed.\n";