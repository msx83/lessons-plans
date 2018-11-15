<section class="container">
    <h2>Plan lekcji</h2>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Data zjazdu</th>
                <th>Od</th>
                <th>Do</th>
                <th>Temat zajęć</th>
                <th>Nauczyciel</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($this->data['lessons'] as $lesson): ?>
            <?php if($lesson->date <= date('Y-m-d')):?>
                <tr class="past">
            <?php else:?>
                <tr>
            <?php endif;?>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $lesson->date; ?></td>
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