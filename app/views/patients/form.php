<div class="card">
    <h2 style="margin-top:0"><?= h($title) ?></h2>

<?php if ($errors): ?>
    <div class="err"><?php foreach ($errors as $e) echo '• '.h($e).'<br>'; ?></div><?php endif; ?>

<form method="post" action="index.php?r=<?= $action ?>">
<div class="grid">
<div>
    <label>First Name *</label><input name="first_name" value="<?= h($p['first_name'] ?? '') ?>"></div>
<div>
    <label>Last Name *</label><input name="last_name" value="<?= h($p['last_name'] ?? '') ?>"></div>
<div>
    <label>Date of Birth *</label><input type="date" name="date_of_birth" value="<?= h($p['date_of_birth'] ?? '') ?>"></div>
<div>
    <label>Gender *</label><select name="gender"><?php foreach (['Male','Female','Other'] as $g): ?><option <?= ($p['gender'] ?? '') === $g ? 'selected' : '' ?>><?= $g ?></option><?php endforeach; ?></select></div>
<div>
    <label>Blood Type</label><select name="blood_type"><option value="">—</option><?php foreach (['A+','A-','B+','B-','AB+','AB-','O+','O-'] as $b): ?><option <?= ($p['blood_type'] ?? '') === $b ? 'selected' : '' ?>><?= $b ?></option><?php endforeach; ?></select></div>
<div>
    <label>Phone</label><input name="phone" value="<?= h($p['phone'] ?? '') ?>"></div>
<div>
    <label>Email</label><input name="email" value="<?= h($p['email'] ?? '') ?>"></div>
<div>
    <label>Admission Date</label><input type="date" name="admission_date" value="<?= h($p['admission_date'] ?? '') ?>"></div>
</div>
<br>
<label>Address</label>
<input name="address" value="<?= h($p['address'] ?? '') ?>"><br><br>
<label>Allergies</label>
<textarea name="allergies" rows="2"><?= h($p['allergies'] ?? '') ?></textarea><br><br>
<label>Diagnosis</label>
<textarea name="diagnosis" rows="3"><?= h($p['diagnosis'] ?? '') ?></textarea><br><br>
<button class="btn">Save</button> <a class="btn gray" href="index.php">Cancel</a>
</form></div>
