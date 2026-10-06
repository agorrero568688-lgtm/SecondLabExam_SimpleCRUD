<?php
require_once __DIR__ . '/Patient.php';
class PatientController {
    public function index() {
        $q = trim($_GET['q'] ?? '');
        view('patients/index', ['patients' => Patient::all($q), 'q' => $q]);
    }
    public function show() {
        view('patients/show', ['p' => $this->findOr404()]);
    }
    public function create() {
        view('patients/form', ['p' => [], 'errors' => [], 'action' => 'patients/store', 'title' => 'Add Patient']);
    }
    public function store() {
        $errors = Patient::validate($_POST);
        if ($errors) return view('patients/form', ['p' => $_POST, 'errors' => $errors, 'action' => 'patients/store', 'title' => 'Add Patient']);
        Patient::create($_POST);
        redirect('patients', 'Patient record created.');
    }
    public function edit() {
        $p = $this->findOr404();
        view('patients/form', ['p' => $p, 'errors' => [], 'action' => 'patients/update&id=' . $p['id'], 'title' => 'Edit Patient']);
    }
    public function update() {
        $p = $this->findOr404();
        $errors = Patient::validate($_POST);
        if ($errors) return view('patients/form', ['p' => $_POST, 'errors' => $errors, 'action' => 'patients/update&id=' . $p['id'], 'title' => 'Edit Patient']);
        Patient::update($p['id'], $_POST);
        redirect('patients', 'Patient record updated.');
    }
    public function destroy() {
        $p = $this->findOr404();
        Patient::delete($p['id']);
        redirect('patients', 'Patient record deleted.');
    }
    private function findOr404(): array {
        $p = Patient::find((int)($_GET['id'] ?? 0));
        if (!$p) { http_response_code(404); exit('Patient not found.'); }
        return $p;
    }
}
