<section class="container">
    <h2>Zjazdy</h2>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Data zjazdu</th>
                <th>Ilość godzin</th>
                <th>Akcja</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($this->data['meetings'] as $meeting): ?>
                <tr>
                    <td style="width: 10px;"><?php echo $i; ?></td>
                    <td><?php echo $meeting->date; ?></td>
                    <td><?php echo $meeting->hours; ?></td>
                    <td style="width: 100px;"><?php echo anchor('meetings/'. $meeting->id, 'Pokaż'); ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>