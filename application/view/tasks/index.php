
<div class="container">
  <div class="">
      <div class="row">
       <div class="col-2">   
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal">Добавить задачу</button>
       </div> 
       <div class="col-10"><div class="notify text-success fw-bold fs-5" role="alert"><?php f($notify);?></div>   
      </div>    
      <table class="table table-striped">
          <thead>
        <tr>
          <th scope="col">№ <a class="btn" href="<?php echo URL; ?>tasks/sort/0">v</a></th>
          <th scope="col" id="name" >Имя <a href="<?php echo URL; ?>tasks/sort/1">^</a>--<a href="<?php echo URL; ?>tasks/sort/2">v</a></th>
          <th scope="col" id="email" >Email <a href="<?php echo URL; ?>tasks/sort/3">^</a>--<a href="<?php echo URL; ?>tasks/sort/4">v</a></th>
          <th scope="col" id="task" >Текст задачи <a href="<?php echo URL; ?>tasks/sort/5">^</a>--<a href="<?php echo URL; ?>tasks/sort/6">v</a></th>
          <th scope="col">Статус</th>
          <th scope="col">ред</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ( $tasks as $task) { ?>
                    <tr>
                        <td><?php f($task->id); ?></td>
                        <td><?php f($task->name); ?></td>
                        <td><?php f($task->email); ?></td>
                        <td><?php f($task->task); ?></td>
                        <td>
                            <?php if (isset($task->is_done) && $task->is_done) { ?>
                                <div class="badge rounded-pill bg-success">Выполнено</div>
                            <?php } if (isset($task->is_admin_update) && $task->is_admin_update) { ?>
                                <div class="badge rounded-pill bg-primary">Отред. админ.</div>
                            <?php } ?>
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="">
                              <?php if($logged) echo('<a class="btn btn-warning" href="'.URL.'tasks/edittask/'.htmlspecialchars($task->id, ENT_QUOTES, "UTF-8").'"role="button">Редактир.</a>'); ?>
                            </div>
                        </td>
                    </tr>
                <?php } ?>   
      </tbody>
      </table>
</div>
<nav aria-label="pagination">
  <ul class="pagination justify-content-center">
        <?php for ($page = 0; $page < $pages; $page++) { ?>
            <li class="page-item <?php if($saved_page == $page) echo('active') ?>"><a class="page-link " href="<?php echo URL . 'tasks/index/' . htmlspecialchars($page, ENT_QUOTES, 'UTF-8'); ?>"> <?php echo($page+1); ?></a></li>
            <?php } ?>
  </ul>
</nav>
        <!-- Modal -->
        <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Добавить задачу</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
               <form class="row g-3" action="<?php echo URL; ?>tasks/addtask" method="POST">
                  <div class="col-md-6">
                    <label class="form-label">Имя</label>
                    <input type="text" class="form-control" name="name" value="" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="" required />
                  </div>
                  <div class="col-12">
                    <label class="form-label">Текст задачи</label>
                    <input type="text" class="form-control" name="task" value="">
                  </div>
                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" name="is_done" type="checkbox" id="gridCheck">
                      <label class="form-check-label" for="gridCheck">
                        Выполнено
                      </label>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                <input type="submit" name="submit_add_task" value="Сохранить" class="btn btn-primary"/>
              </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /Modal -->
    <!--</div>-->
</div>
