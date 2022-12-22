<div class="uk-grid">
    <div class="uk-width-1-1">
        <?php echo JText::_('MY_APPLICATIONS_INTIAL_TEXT'); ?>
        </br>
        <hr>
        </br>
    </div>
</div>
<h3><?php echo JText::_('MY_APPLICATIONS'); ?></h3>

<table class="uk-table uk-table-responsive uk-table-striped">
    <thead>
    <tr>
        <th><?php echo JText::_('JOB'); ?></th>
        <th><?php echo JText::_('CLOSING_DATE'); ?></th>
        <th><?php echo JText::_('STATUS'); ?></th>
        <th><?php echo JText::_('LAST_UPDATE'); ?></th>
        <th></th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($this->my_applications as $application): ?>
        <tr>
            <td><?php echo $application->short_description; ?></td>
            <td><?php echo $application->closing_date; ?></td>
            <td><?php echo $application->status; ?></td>
            <td><?php echo $application->modification_date; ?></td>
            <td>
                <?php
                $today = date("Y-m-d");
                if (($application->status_id == '1') && ($today <= $application->closing_date)): ?>
                    <a href="https://services.icmab.es/recruitment/application?job_id=<?php echo $application->job_id; ?>"
                       uk-icon="icon: pencil"></a>
                <?php elseif (($application->status_id != '1') && ($today <= $application->closing_date)): ?>
                    <a href="https://services.icmab.es/recruitment/application?job_id=<?php echo $application->job_id; ?>"
                       uk-icon="icon: search"></a>
                <?php else: ?>
                    CLOSED
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>