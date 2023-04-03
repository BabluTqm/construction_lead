<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Project'), ['action' => 'edit', $project->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Project'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Projects'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Project'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="projects view content">
            <h3><?= h($project->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $project->has('user') ? $this->Html->link($project->user->id, ['controller' => 'Users', 'action' => 'view', $project->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Project Name') ?></th>
                    <td><?= h($project->project_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Project Address') ?></th>
                    <td><?= h($project->project_address) ?></td>
                </tr>
                <tr>
                    <th><?= __('State') ?></th>
                    <td><?= h($project->state) ?></td>
                </tr>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= h($project->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('Assigned Status') ?></th>
                    <td><?= h($project->assigned_status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Accept Status') ?></th>
                    <td><?= h($project->accept_status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($project->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pincode') ?></th>
                    <td><?= $this->Number->format($project->pincode) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created Date') ?></th>
                    <td><?= h($project->created_date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Assigned Users') ?></h4>
                <?php if (!empty($project->assigned_users)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Owner Id') ?></th>
                            <th><?= __('Project Id') ?></th>
                            <th><?= __('Assigned Userid') ?></th>
                            <th><?= __('Created Date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($project->assigned_users as $assignedUsers) : ?>
                        <tr>
                            <td><?= h($assignedUsers->id) ?></td>
                            <td><?= h($assignedUsers->user_owner_id) ?></td>
                            <td><?= h($assignedUsers->project_id) ?></td>
                            <td><?= h($assignedUsers->assigned_userid) ?></td>
                            <td><?= h($assignedUsers->created_date) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'AssignedUsers', 'action' => 'view', $assignedUsers->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'AssignedUsers', 'action' => 'edit', $assignedUsers->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'AssignedUsers', 'action' => 'delete', $assignedUsers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $assignedUsers->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Owner Services') ?></h4>
                <?php if (!empty($project->owner_services)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Project Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Service Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($project->owner_services as $ownerServices) : ?>
                        <tr>
                            <td><?= h($ownerServices->id) ?></td>
                            <td><?= h($ownerServices->project_id) ?></td>
                            <td><?= h($ownerServices->user_id) ?></td>
                            <td><?= h($ownerServices->service_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'OwnerServices', 'action' => 'view', $ownerServices->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'OwnerServices', 'action' => 'edit', $ownerServices->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'OwnerServices', 'action' => 'delete', $ownerServices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ownerServices->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
