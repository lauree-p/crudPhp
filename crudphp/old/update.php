<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Crud-Update</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
        data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.js%22%3E%3C%2Fscript%3E" data-mce-resize="false"
        data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />

</head>

<body>

    <div class="container">
        <div class="row">
            <h3>Modifier un contact</h3>
        </div>
        <form method="post" action="update.php?id=<?php echo $id ;?>">
            <div class="control-group <?php echo!empty($nameError) ? 'error' : ''; ?>">
                <label class="control-label">Name</label>
                <div class="controls">
                    <input name="name" type="text" placeholder="Name" value="<?php echo!empty($name) ? $name : ''; ?>">
                    <?php if (!empty($nameError)): ?>
                    <span class="help-inline"><?php echo $nameError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group<?php echo!empty($firstnameError) ? 'error' : ''; ?>">
                <label class="control-label">firstname</label>
                <div class="controls">
                    <input type="text" name="firstname" value="<?php echo!empty($firstname) ? $firstname : ''; ?>">
                    <?php if (!empty($firstnameError)): ?>
                    <span class="help-inline"><?php echo $firstnameError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group<?php echo!empty($ageError) ? 'error' : ''; ?>">
                <label class="control-label">age</label>
                <div class="controls">
                    <input type="number" name="age" value="<?php echo!empty($age) ? $age : ''; ?>">
                    <?php if (!empty($ageError)): ?>
                    <span class="help-inline"><?php echo $ageError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo!empty($emailError) ? 'error' : ''; ?>">
                <label class="control-label">Email Address</label>
                <div class="controls">
                    <input name="email" type="text" placeholder="Email Address"
                        value="<?php echo!empty($email) ? $email : ''; ?>">
                    <?php if (!empty($emailError)): ?>
                    <span class="help-inline"><?php echo $emailError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo!empty($telError) ? 'error' : ''; ?>">
                <label class="control-label">Telephone</label>
                <div class="controls">
                    <input name="tel" type="text" placeholder="Telephone"
                        value="<?php echo!empty($tel) ? $tel : ''; ?>">
                    <?php if (!empty($telError)): ?>
                    <span class="help-inline"><?php echo $telError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group<?php echo!empty($paysError) ? 'error' : ''; ?>">
                <select name="pays">
                    <option value="paris">Paris</option>
                    <option value="londres">Londres</option>
                    <option value="amsterdam">Amsterdam</option>
                </select>
                <?php if (!empty($paysError)): ?>
                <span class="help-inline"><?php echo $paysError; ?></span>
                <?php endif; ?>
            </div>
            <div class="control-group<?php echo!empty($metierError) ? 'error' : ''; ?>">
                <label class="checkbox-inline">Metier</label>
                <div class="controls">
                    Dev : <input type="checkbox" name="metier" value="dev"
                        <?php if (isset($metier) && $metier == "dev") echo "checked"; ?>>
                    Integrateur <input type="checkbox" name="metier" value="integrateur"
                        <?php if (isset($metier) && $metier == "integrateur") echo "checked"; ?>>
                    Reseau <input type="checkbox" name="metier" value="reseau"
                        <?php if (isset($metier) && $metier == "reseau") echo "checked"; ?>>
                </div>
                <?php if (!empty($metierError)): ?>
                <span class="help-inline"><?php echo $metierError; ?></span>
                <?php endif; ?>
            </div>
            <div class="control-group  <?php echo!empty($urlError) ? 'error' : ''; ?>">
                <label class="control-label">Siteweb</label>
                <div class="controls">
                    <input type="text" name="url" value="<?php echo!empty($url) ? $url : ''; ?>">
                    <?php if (!empty($urlError)): ?>
                    <span class="help-inline"><?php echo $urlError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo!empty($commentError) ? 'error' : ''; ?>">
                <label class="control-label">Commentaire </label>
                <div class="controls">
                    <textarea rows="4" cols="30" name="comment"><?php if (isset($comment)) echo $comment; ?></textarea>
                    <?php if (!empty($commentError)): ?>
                    <span class="help-inline"><?php echo $commentError; ?></span>
                    <?php endif; ?>
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