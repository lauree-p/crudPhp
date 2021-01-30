<?php 

class User { 

    private $name;
    private $firstname;
    private $birthDate; 
    private $tel; 
    private $email; 
    private $pays; 
    private $comment; 
    private $metier; 
    private $url;
    private $valid = true; 
    private $id;

    private  $nameError = ''; 
    private  $firstnameError=''; 
    private  $birthDateError=''; 
    private  $telError =''; 
    private  $emailError =''; 
    private  $paysError=''; 
    private  $commentError=''; 
    private  $metierError=''; 
    private  $urlError=''; 

    // Id
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    // Name
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        if (empty($name)) { 
            $this->nameError = 'Please enter Name'; 
            $this->valid = false; 
        } else if (!preg_match("/^[a-zA-Z ]*$/",$name)) { 
            $this->nameError = "Only letters and white space allowed";
            $this->valid = false;
        }
        $this->name = $name;
    }

    // Firstname
    public function getFirstname() {
        return $this->firstname;
    }

    public function setFirstname($firstname) {
        if(empty($firstname)) { 
            $this->firstnameError ='Please enter firstname';
            $this->valid = false; 
        } else if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) { 
            $this->firstnameError = "Only letters and white space allowed";
            $this->valid = false;
        }

        $this->firstname = $firstname;
    }

    // Email
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        if (empty($email)) { 
            $this->emailError = 'Please enter Email Address'; 
            $this->valid = false; 
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $this->emailError = 'Please enter a valid Email Address'; 
            $this->valid = false; 
        }
        echo "id : " . $this->id;
        $originalEmail = UserDAO::getFieldValue("email", $this->getId());
        if (UserDAO::exists("email", $email) && $originalEmail != $email) {
            echo "$originalEmail != $email";
            $this->emailError = 'Email adress is already use , sorry !'; 
            $this->valid = false;
        }

        $this->email = $email;
    }

    // birthDate
    public function getBirthDate() {
        return $this->birthDate;
    }

    public function setBirthDate($birthDate) {
        if (empty($birthDate)) { 
            $this->birthDateError = 'Please enter your birthDate';
            $this->valid = false; 
        }
        $this->birthDate = $birthDate;
    }

    // Tel
    public function getTel() {
        return $this->tel;
    }

    public function setTel($tel) {
        if (empty($tel)) {
            $this->telError = 'Please enter phone'; 
            $this->valid = false; 
        } else if(!preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#",$tel)) { 
            $this->telError = 'Please enter a valid phone'; 
            $this->valid = false;
        }
        $this->tel = $tel;
    }

    // Pays
    public function getPays() {
        return $this->pays;
    }

    public function setPays($pays) {
        if (!isset($pays)) { 
            $this->paysError = 'Please select a country'; 
            $this->valid = false; 
        }
        $this->pays = $pays;
    }

    // Comment
    public function getComment() {
        return $this->comment;
    }

    public function setComment($comment) {
        if(empty($comment)) { 
            $this->commentError ='Please enter a description'; 
            $this->valid= false; 
        }
        $this->comment = $comment;
    }

    // Metier
    public function getMetier() {
        return $this->metier;
    }

    public function setMetier($metier) {
        if (empty($metier)) {
            $this->metierError = 'Veuillez entrer votre métier';
            $this->valid = false;
        }
        $this->metier = $metier;
    }

    // Url
    public function getUrl() {
        return $this->url;
    }

    public function setUrl($url) {
        if (empty($url)) {
            $this->urlError = 'Veuillez entrer votre site web';
            $this->valid = false;
        } else if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url)) {
            $this->urlError = 'Enter a valid url';
            $this->valid = false;
        }
        $this->url = $url;
    }

    public function isValid() {
        return $this->valid;
    }

    public function getNameError() {
        return $this->nameError;
    }

    public function getFirstnameError() {
        return $this->firstnameError;
    }

    public function getBirthDateError() {
        return $this->birthDateError;
    }

    public function getTelError() {
        return $this->telError;
    }

    public function getEmailError() {
        return $this->emailError;
    }

    public function getPaysError() {
        return $this->paysError;
    }

    public function getCommentError() {
        return $this->commentError;
    }

    public function getMetierError() {
        return $this->metierError;
    }

    public function getUrlError() {
        return $this->urlError;
    }

    public function setParametersFromArray($data) {
        $this->valid = true;

        $this->nameError = '';
        $this->firstnameError='';
        $this->birthDateError='';
        $this->telError ='';
        $this->emailError ='';
        $this->paysError='';
        $this->commentError='';
        $this->metierError='';
        $this->urlError='';

        if (isset($data["id"])) {
            $this->id = $data["id"];
        }

        $this->setName($data["name"]);
        $this->setFirstname($data["firstname"]);
        $this->setBirthDate($data["birthDate"]);
        $this->setTel($data["tel"]);
        $this->setPays($data["pays"]);
        $this->setEmail($data["email"]);
        $this->setComment($data["comment"]);
        $this->setMetier($data["metier"]);
        $this->setUrl($data["url"]);

    }

    // validateParameters()

    // validateAllParameters()
}

?>