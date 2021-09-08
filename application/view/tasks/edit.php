<div class="container col-md-6">
     <h5>Редактирование задачи</h5>
    <div class="card">
        <div class="card-body">
            <form class="row g-4" action="<?php echo URL; ?>tasks/updatetask" method="POST">
                <div class="col-md-12">
                    <label for="inputCity" class="form-label">Текст задачи</label>
                    <input type="text" class="form-control" name="task" value="<?php f($task->task); ?>">
                </div>
                <div class="col-md-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_done" <?php if($task->is_done) echo 'checked'; ?> >
                        <label class="form-check-label" for="gridCheck">
                        Выпонено
                        </label>
                    </div>
                </div>
                <input type="hidden" name="old_task" value="<?php f($task->task); ?>" />
                <input type="hidden" name="task_id" value="<?php f($task->id); ?>" />
                <input type="hidden" name="is_admin_update" value="<?php f($task->is_admin_update); ?>" />    
               
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                     <a href="<?php echo URL; ?>tasks"><button class="btn btn-secondary me-md-2" type="button">Отмена</button></a>
                    <input class="btn btn-success" type="submit" name="submit_update_task" value="Сохранить" />
                </div>
            </form>
        </div>
    </div>
  </div>
  