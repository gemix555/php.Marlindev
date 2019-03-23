<?php $this->layout('layout') ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Create Task</h1>

            <form action="/tasks/store" method="post">
                <div class="form-group">
                    <label for="title">Text</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="">
                </div>
                <div class="form-group">
                    <label for="content">Description</label>
                    <textarea name="content" id="content" cols="30" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <button  class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>

            <a href="/tasks" class="btn btn-success">Go back</a>
        </div>
    </div>
</div>