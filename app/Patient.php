<?php
require_once __DIR__ . '/db.php';
class Patient {
    public const FIELDS = ['first_name','last_name','date_of_birth','gender','blood_type','phone','email','address','allergies','diagnosis','admission_date'];

    public static function all(string $q = ''): array {
        $s = Database::get()->prepare("SELECT * FROM patients WHERE CONCAT(first_name,' ',last_name) LIKE :q1 OR diagnosis LIKE :q2 ORDER BY id DESC");
        $s->execute([':q1' => "%$q%", ':q2' => "%$q%"]);
        return $s->fetchAll();
    }
    public static function find(int $id): ?array {
        $s = Database::get()->prepare("SELECT * FROM patients WHERE id = ?");
        $s->execute([$id]);
        return $s->fetch() ?: null;
    }
    public static function create(array $d): void {
        $cols = implode(',', self::FIELDS);
        $ph = implode(',', array_map(fn($f) => ":$f", self::FIELDS));
        Database::get()->prepare("INSERT INTO patients ($cols) VALUES ($ph)")->execute(self::bind($d));
    }
    public static function update(int $id, array $d): void {
        $set = implode(',', array_map(fn($f) => "$f = :$f", self::FIELDS));
        Database::get()->prepare("UPDATE patients SET $set WHERE id = :id")->execute(self::bind($d) + [':id' => $id]);
    }
    public static function delete(int $id): void {
        Database::get()->prepare("DELETE FROM patients WHERE id = ?")->execute([$id]);
    }
    private static function bind(array $d): array {
        $out = [];
        foreach (self::FIELDS as $f) { $v = trim($d[$f] ?? ''); $out[":$f"] = $v === '' ? null : $v; }
        return $out;
    }
    public static function validate(array $d): array {
        $e = [];
        if (trim($d['first_name'] ?? '') === '') $e[] = 'First name is required.';
        if (trim($d['last_name'] ?? '') === '') $e[] = 'Last name is required.';
        if (!strtotime($d['date_of_birth'] ?? '')) $e[] = 'A valid date of birth is required.';
        if (!in_array($d['gender'] ?? '', ['Male','Female','Other'])) $e[] = 'Select a gender.';
        if (($d['email'] ?? '') !== '' && !filter_var($d['email'], FILTER_VALIDATE_EMAIL)) $e[] = 'Email is invalid.';
        return $e;
    }
}
