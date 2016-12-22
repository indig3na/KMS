<?php $this->layout('layoutsystem') ?>

<?php $this->start('main_content') ?>



<div class="panel panel-success">
    <div class="panel-heading">
        <h3>Laisser nous un message</h3>
    </div>
    <br>
    <br>
    <div class="container">
        <form id="main-contact-form" name="contact-form" method="post" action="<?= $this->url('contact_contact_post') ?>">
            <div class="form-group">
                <input type="hidden" name="name" class="form-control" placeholder="No" value="<?= $w_user['usr_lastname'] ?>">
            </div>
            <div class="form-group">
                <input type="hidden" name="email" class="form-control" placeholder="Email" value="<?= $w_user['usr_email'] ?>">
            </div>
            <div class="form-group">
                <input type="text" name="subject" class="form-control" placeholder="Sujet" required>
            </div>
            <div class="form-group">
                <input type="hidden" name="parentName" class="form-control" value="<?= $w_user['usr_lastname'] ?>" >
            </div>
            <div class="form-group">
                <textarea name="message" class="form-control" rows="8" placeholder="Message" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
    </div>
</div>


<?php $this->stop('main_content') ?>
