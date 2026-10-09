<?php
require_once __DIR__ . '/../../repositories/author-repository.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../../pages/authors/index.php');
    exit;
}

$namaPenulis = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$bioPenulis  = filter_input(INPUT_POST, 'bio', FILTER_SANITIZE_SPECIAL_CHARS);

if (empty($namaPenulis)) {
    header('Location: ../../pages/authors/create.php?error=empty_name');
    exit;
}

AuthorRepository::save([
    'id'   => 'auth_' . time() . '_' . rand(100, 999),
    'name' => trim($namaPenulis),
    'bio'  => trim($bioPenulis ?? '')
]);

header('Location: ../../pages/authors/index.php?status=success');
exit;
