<table class="table table-hover">
    <?php foreach ($this->rows as $row): ?>
    <tr>
        <?php foreach ($row as $column): ?>
        <td><?= $column ?></td>
        <?php endforeach; ?>
    </tr>
    <?php endforeach; ?>
</table>