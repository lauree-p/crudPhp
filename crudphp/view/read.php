<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Crud</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row">
            <h3>Ajouter un contact</h3>
        </div>
        <form method="post" action="index.php?action=edit&id=<?=$user->getId()?>">
            <div class="control-group <?= $user->getName()?>">
                <label class="control-label">Name</label>
                <div class="controls">
                    <input name="name" type="text" placeholder="Name" value="<?= $user->getName()?>">
                    <?php if (!empty($user->getNameError())): ?>
                    <span class="help-inline"><?= $user->getNameError()?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group<?= $user->getFirstname()?>">
                <label class="control-label">firstname</label>
                <div class="controls">
                    <input type="text" name="firstname" value="<?= $user->getFirstname()?>">
                    <?php if(!empty($user->getFirstnameError())):?>
                    <span class="help-inline"><?= $user->getFirstnameError()?></span>
                    <?php endif;?>
                </div>
            </div>
            <div class="control-group<?= $user->getBirthDate()?>">
                <label class="control-label">birthDate</label>
                <div class="controls">
                    <input type="date" name="birthDate" value="<?= $user->getBirthDate()?>">
                    <?php if(!empty($user->getBirthDateError())):?>
                    <span class="help-inline"><?= $user->getBirthDateError()?></span>
                    <?php endif;?>
                </div>
            </div>
            <div class="control-group <?= $user->getEmail()?>">
                <label class="control-label">Email Address</label>
                <div class="controls">
                    <input name="email" type="text" placeholder="Email Address" value="<?= $user->getEmail()?>">
                    <?php if (!empty($user->getEmailError())): ?>
                    <span class="help-inline"><?= $user->getEmailError()?></span>
                    <?php endif;?>
                </div>
            </div>
            <div class="control-group <?= $user->getTel()?>">
                <label class="control-label">Telephone</label>
                <div class="controls">
                    <input name="tel" type="text" placeholder="Telephone" value="<?=  $user->getTel()?>">
                    <?php if (!empty($user->getTelError())): ?>
                    <span class="help-inline"><?= $user->getTelError()?></span>
                    <?php endif;?>
                </div>
            </div>
            <div class="control-group<?= $user->getPays()?>">
                <select name="pays">
                    <option value="paris">Paris</option>
                    <option value="londres">Londres</option>
                    <option value="amsterdam">Amsterdam</option>
                </select>
                <?php if (!empty($user->getPaysError())): ?>
                <span class="help-inline"><?= $user->getPaysError()?></span>
                <?php endif;?>
            </div>
            <div class="control-group<?= $user->getMetier()?>">
                <label class="checkbox-inline">Metier</label>
                <div class="controls">
                    Dev : <input type="checkbox" name="metier" value="dev"
                        <?php if ($user->getMetier() == "dev") echo "checked"; ?>>
                    Integrateur <input type="checkbox" name="metier" value="integrateur"
                        <?php if ($user->getMetier() == "integrateur") echo "checked"; ?>>
                    Reseau <input type="checkbox" name="metier" value="reseau"
                        <?php if ($user->getMetier() == "reseau") echo "checked"; ?>>
                </div>
                <?php if (!empty($user->getMetierError())): ?>
                <span class="help-inline"><?= $user->getMetierError()?></span>
                <?php endif;?>
            </div>
            <div class="control-group  <?= $user->getUrl()?>">
                <label class="control-label">Siteweb</label>
                <div class="controls">
                    <input type="text" name="url" value="<?= $user->getUrl()?>">
                    <?php if(!empty($user->getUrlError())):?>
                    <span class="help-inline"><?=$user->getUrlError()?></span>
                    <?php endif;?>
                </div>
            </div>
            <div class="control-group <?= $user->getComment()?>">
                <label class="control-label">Commentaire </label>
                <div class="controls">
                    <textarea rows="4" cols="30" name="comment"><?= $user->getComment()?></textarea>
                    <?php if(!empty($user->getCommentError())):?>
                    <span class="help-inline"><?= $user->getCommentError()?></span>
                    <?php endif;?>
                </div>
            </div>
            <div class="form-actions">
                <input type="submit" class="btn btn-success" name="submit" value="submit">
                <a class="btn" href="index.php">Retour</a>
            </div>
        </form>
    </div>
</body>

</html>