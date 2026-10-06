<div class="card">
  <div class="top">
    <form method="get" style="display:flex;gap:6px">
      <input type="hidden" name="r" value="patients">
      <input name="q" value="<?= h($q) ?>" placeholder="Search name or diagnosis">
      <button class="btn gray">Search</button>
    </form>

    <a class="btn" href="index.php?r=patients/create">+ Add Patient</a>

  </div>
  <div style="overflow-x:auto"><table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Age</th>
      <th>Gender</th>
      <th>Blood</th>
      <th>Diagnosis</th>
      <th>Actions</th>
    </tr>

    <?php foreach ($patients as $p): ?>
    <tr><td><?= $p['id'] ?></td>
    <td><?= h($p['first_name'].' '.$p['last_name']) ?></td>
      <td><?= (new DateTime($p['date_of_birth']))->diff(new DateTime())->y ?></td>
      <td><?= h($p['gender']) ?></td><td><?= h($p['blood_type']) ?></td><td><?= h($p['diagnosis']) ?></td>
      <td>
        <a class="btn gray" href="index.php?r=patients/show&id=<?= $p['id'] ?>">View</a>
        <a class="btn blue" href="index.php?r=patients/edit&id=<?= $p['id'] ?>">Edit</a>
        <form class="inline" method="post" action="index.php?r=patients/delete&id=<?= $p['id'] ?>" onsubmit="return confirm('Delete this record?')">
          <button class="btn red">Delete</button>
        </form>
      </td>
    </tr>
    <?php endforeach; if (!$patients): ?><tr><td colspan="7">No patient records found.</td></tr><?php endif; ?>
  </table>

</div>
</div>
