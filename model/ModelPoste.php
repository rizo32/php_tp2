<?php

class ModelPoste extends Crud {

    protected $table = 'poste';
    protected $primaryKey = 'posteId';
    protected $fillable = ['posteId', 'posteNom', 'posteDescription', 'postePrivilegeId'];
}

?>