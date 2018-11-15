<section class="container">
    <h2>Nauczyciele</h2>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nazwa nauczyciela</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($this->data['teachers'] as $teacher): ?>
                <tr>
                    <td style="width: 10px;"><?php echo $i; ?></td>
                    <td><?php echo $teacher->full_name; ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>