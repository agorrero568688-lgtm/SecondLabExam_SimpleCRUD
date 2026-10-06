<div class="card"><div class="top">
    
    <h2 style="margin:0"><?= h($p['first_name'].' '.$p['last_name']) ?></h2>
<div>
    <a class="btn blue" href="index.php?r=patients/edit&id=<?= $p['id'] ?>">Edit</a> 
    <a class="btn gray" href="index.php">Back</a>
</div>
</div>
<dl>
<?php foreach (['date_of_birth'=>'Date of Birth','gender'=>'Gender','blood_type'=>
'Blood Type','phone'=>'Phone','email'=>'Email','address'=>'Address','allergies'=>'Allergies','diagnosis'=>'Diagnosis','admission_date'=>
'Admission Date','created_at'=>'Record Created','updated_at'=>'Last Updated'] as $k=>$l): ?>
<dt>
    <?= $l ?>
</dt>
<dd style="margin:0"><?= h($p[$k]) ?: '—' ?></dd>
<?php endforeach; ?>
</dl>
</div>
