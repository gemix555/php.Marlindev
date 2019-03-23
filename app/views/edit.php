<?php $this->layout('layout') ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Edit Task</h1>

            <form action="/tasks/<?php echo $task['id'] ;?>/update" method="post">
<!--                <input type="hidden" name="id" value="--><?php //echo $task['id'] ;?><!--">-->
                <div class="form-group">
                    <label for="title">Text</label>
                    <input type="text" name="title" class="form-control" id="title" value="<?php echo $task['title'] ?>">
                </div>
                <div class="form-group">
                    <label for="content">Description</label>
                    <textarea name="content" id="content" cols="30" rows="5"><?php echo $task['content'] ?></textarea>


                    <div class="form-group">
                        <button class="btn btn-warning" type="submit">Submit</button>
                    </div>
            </form>

            <a href="tasks.php" class="btn btn-success">Go back</a>
        </div>
    </div>
</div>
