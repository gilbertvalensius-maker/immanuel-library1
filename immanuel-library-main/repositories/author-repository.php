<?php

class AuthorRepository 
{
    private static string $dbFile = __DIR__ . '/../data/library.json';

    private static function readStorage(): array 
    {
        if (!file_exists(self::$dbFile)) return [];
        $raw = file_get_contents(self::$dbFile);
        return json_decode($raw, true) ?? [];
    }

    private static function writeStorage(array $data): void 
    {
        file_put_contents(self::$dbFile, json_encode($data, JSON_PRETTY_PRINT));
    }

    public static function getAll(): array 
    {
        $storage = self::readStorage();
        return $storage['authors'] ?? [];
    }

    public static function save(array $newAuthor): void 
    {
        $storage = self::readStorage();
        $storage['authors'][] = $newAuthor;
        self::writeStorage($storage);
    }
}
