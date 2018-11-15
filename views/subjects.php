<section class="container">
    <h2>Tematy zajęć</h2>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Temat</th>
                <th>Nauczyciel</th>
                <th>Ilość godzin</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($this->data['subjects'] as $subject): ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $subject->subject_name; ?></td>
                    <td><?php echo $subject->teacher; ?></td>
                    <td><?php echo $subject->hours_qty; ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>