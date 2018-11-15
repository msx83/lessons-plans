<section class="container">
    <h2>Dzienny plan zajęć</h2>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Od</th>
                <th>Do</th>
                <th>Zajęcia</th>
                <th>Nauczyciel</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($this->data['lessons'] as $lesson): ?>
                <tr>
                    <td style="width: 10px;"><?php echo $i; ?></td>
                    <td><?php echo $lesson->start; ?></td>
                    <td><?php echo $lesson->end; ?></td>
                    <td><?php echo $lesson->subject; ?></td>
                    <td><?php echo $lesson->teacher; ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>